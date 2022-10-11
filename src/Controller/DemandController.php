<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Mailer\Mailer;
use Cake\Routing\Router;

/**
 * Product Controller
 *
 * @property \App\Model\Table\DemandTable $Demand
 * @method \App\Model\Entity\Demand[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DemandController extends AppController
{
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        // Configure the login action to not require authentication, preventing
        //$this->viewBuilder()->setLayout('dashboard');
        $this->viewBuilder()->setLayout('hemportshop');

        //get user name start
        $this->loadModel('Users');
        $result = $this->Authentication->getResult();

        if ($result->isValid())
        {
            //$uid = $this->Auth->user('id');
            $uid = $this->request->getSession()->read('Auth.id');
            //debug($uid);

            $user = $this->Users->find('all', [
                'conditions' => ['Users.id' => $uid],
                'limit' => 1
            ])->first();

            $username = $user['username'];
            $welcomeMsg = "Welcome back, " . $username;
            //debug($username);

            if($username !== "") {
                //to display on website
                $this->set('username', $username);
                $this->set('welcomeMsg', $welcomeMsg);
            }

        } else {
            return $this->redirect(['controller' => 'users', 'action'=>'login']);
        }


        //get user name end

        //$this->Authentication->addUnauthenticatedActions(['index2']);
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->viewBuilder()->disableAutoLayout();
        $type = $this->request->getSession()->read('Auth.type');
        if($type == 'Buyer'){
//            return $this->redirect(['controller' => 'error', 'action' => 'error400']);
            $uid = $this->request->getSession()->read('Auth.id');
//            $buyer = $this->loadModel('Buyer')->find('all',['conditions'=>['users_id'=>$uid]])->first();
//
//            $sid = $buyer->id;
            $demand = $this->Demand->find('all',['conditions'=>['buyer_id'=>$uid]])->all()->toList();
        } else if ($type == 'Seller' || $type == 'Admin') {
            $demand = $this->Demand->find('all')->all()->toList();
        }


        $this->set(compact('demand', 'type'));
    }

    public function quotation($demand_id = '') {
        $this->viewBuilder()->disableAutoLayout();
        $type = $this->request->getSession()->read('Auth.type');
        $uid = $this->request->getSession()->read('Auth.id');
        if($type == 'Seller'){
            return $this->redirect(['controller' => 'error', 'action' => 'error400']);
        }
        if (!$demand_id) {
            return $this->redirect(['controller' => 'error', 'action' => 'error400']);
        }
        $this->loadModel('Quotation');
        if ($type == 'Admin') {
            $quotation = $this->Quotation->find('all')->all()->toList();
        } else {
            $quotation = $this->Quotation->find('all',['conditions' => ['buyer_id' => $uid]])->all()->toList();
        }
        $this->set(compact('quotation', 'type'));
    }

    /**
     * View method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->viewBuilder()->disableAutoLayout();
        $uid = $this->request->getSession()->read('Auth.id');
        $buyer = $this->loadModel('Buyer')->find('all',['conditions'=>['users_id'=>$uid]])->first();
        $demand = $this->Demand->get($id, [
            'contain' => [],
        ]);

        if(!isset($demand) || empty($demand))
        {
            return $this->Flash->error(__('This demand is not available at the moment. Please try again later.'));
        } else {
            $type = $this->request->getSession()->read('Auth.type');
            $this->set(compact('demand','type'));
        }
    }

    public function pay(){
        $this->viewBuilder()->disableAutoLayout();
        $type = $this->request->getSession()->read('Auth.type');
        if($type == 'Buyer'){
            $uid = $this->request->getSession()->read('Auth.id');
            $demand = $this->Demand->find('all',['conditions'=>['buyer_id'=>$uid]])->all()->toList();
        } else if ($type == 'Seller' || $type == 'Admin') {
            $demand = $this->Demand->find('all')->all()->toList();
        }
        $this->set(compact('demand', 'type'));
        $uid = $this->request->getSession()->read('Auth.id');
        $this->loadModel("Orders");

        $order = $this->Orders->find()->where(['user_id'=>$uid])->first();
        if(empty($order)){//go to pay
            //add order
            $data = [
                'order_no'=>date("YmdHis").rand(1000,9999),
                'total'=>1,
                'user_id'=>$uid,
                'create_time'=>date("Y-m-d H:i:s"),
                'pay_time'=>date("Y-m-d H:i:s"),
                'pay_status'=>"0",
            ];

            $order = $this->Orders->newEmptyEntity();
            $order = $this->Orders->patchEntity($order, $data);
            $this->Orders->save($order);
        }
        if($order->pay_status!=1){
            return $this->redirect(['controller' => 'stripes', 'action' => 'stripe',$order->order_no]);
        }else{

        }
    }
    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $type = $this->request->getSession()->read('Auth.type');
        if($type!= 'Buyer'){
            return $this->redirect(['controller' => 'error', 'action' => 'error400']);
        }

        $this->viewBuilder()->disableAutoLayout();

        $uid = $this->request->getSession()->read('Auth.id');
        $this->loadModel("Orders");
        $this->pay();

        $buyer = $this->loadModel('Buyer')->find('all',['conditions'=>['users_id'=>$uid]])->first();
        $demand = $this->Demand->newEmptyEntity();
        if ($this->request->is('post')) {
            $demand = $this->Demand->patchEntity($demand, $this->request->getData());
            //upload the file to the webroot
            if (!$demand->getErrors()) {

                $image = $this->request->getData('image_file');

                $name = $image->getClientFilename();

                $targetPath = WWW_ROOT . 'img' . DS . $name;

                if ($name) {
                    $image->moveTo($targetPath);

                    $demand->image1 = $name;
                }
            }
            $demand->buyer_id = $uid;

            if ($this->Demand->save($demand)) {
                $this->Flash->success(__('The demand has been saved.'));

                $this->redirect(['controller' => 'demand', 'action' => 'index']);
            } else {
                $this->Flash->error(__('The demand could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('demand', 'type'));

    }

    /**
     * Edit method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $type = $this->request->getSession()->read('Auth.type');
        if($type!= 'Buyer' && $type != 'Admin'){
            return $this->redirect(['controller' => 'error', 'action' => 'error400']);
        }

        $this->viewBuilder()->disableAutoLayout();

        if(!$id){
            $uid = $this->request->getSession()->read('Auth.id');
            $demand = $this->Demand-> find('all',['conditions'=>['buyer_id'=>$uid]])->first();
        } else {
            $demand = $this->Demand->get($id, [
                'contain' => [],
            ]);

        }
        if ($this->request->is(['patch', 'post', 'put'])) {
            $product= $this->Demand->patchEntity($demand, $this->request->getData());
            if(!$product->getErrors()){

                $image= $this->request->getData('image_file');


                $name = $image->getClientFilename();

                $targetPath=WWW_ROOT.'img'.DS.$name;

                if($name) {
                    $image->moveTo($targetPath);

                    $demand->image1 = $name;
                }

            }
            if ($this->Demand->save($demand)) {
                $this->Flash->success(__('The demand has been saved.'));
                return $this->redirect(['controller' => 'demand', 'action' => 'index']);
            } else {
                $this->Flash->error(__('The demand could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('demand', 'type'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->viewBuilder()->disableAutoLayout();

        $this->request->allowMethod(['post', 'delete']);
        $demand = $this->Demand->get($id);
        if ($this->Demand->delete($demand)) {
            $this->Flash->success(__('The demand has been deleted.'));
        } else {
            $this->Flash->error(__('The demand could not be deleted. Please, try again.'));
        }

        return $this->redirect(['controller' => 'demand', 'action' => 'index']);
    }
}
