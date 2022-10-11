<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Orderplaced Controller
 *
 * @property \App\Model\Table\OrderplacedTable $Orderplaced
 * @method \App\Model\Entity\Orderplaced[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OrderplacedController extends AppController
{
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        // Configure the login action to not require authentication, preventing
        //$this->viewBuilder()->setLayout('dashboard');
        $this->viewBuilder()->disableAutoLayout();

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

        $uid = $this->request->getSession()->read('Auth.id');
        $type = $this->request->getSession()->read('Auth.type');

        $seller = $this->loadModel('Seller')->find('all',['conditions'=>['users_id'=>$uid]])->first();


        $product = $this->loadModel('Seller')->find('all',['conditions'=>['users_id'=>$uid]])->all()->toList();



        $this->loadModel('Buyer');
        $this->loadModel('Seller');
        $this->loadModel('Product');
        $this->loadModel('Users');

        $uid = $this->request->getSession()->read('Auth.id');
        if(isset($uid)) {
            $user = $this->Users->find('all', ['conditions' => ['id' => $uid]])->first();

            //for buyers/sellers viewing order history in profile
            $buyer = $this->Buyer->find('all', [
                'conditions' => ['users_id' => $uid],
                'limit' => 1
            ])->first();

            $orderplacedfound = $this->Orderplaced->find('all', ['conditions' => ['buyer_id' => $buyer['id']]]);

            $count = $orderplacedfound->count();
            $orderplaced = $this->paginate($orderplacedfound);

            $this->set(compact('orderplaced', 'type'));
            $this->set('usertype', $user['type']);

            $seller = $this->Seller->find('all', [
                'limit' => $count
            ])->all()->toList();
        }
    }

    public function index2()
    {
        $this->loadModel('Buyer');
        $this->loadModel('Seller');
        $this->loadModel('Product');
        $this->loadModel('Users');

        $uid = $this->request->getSession()->read('Auth.id');
        $type = $this->request->getSession()->read('Auth.type');
        $user = $this->Users->find('all',['conditions'=>['id'=>$uid]])->first();

        $seller = $this->Seller->find('all', [
            'conditions' => ['Seller.users_id' => $uid],
            'limit' => 1
        ])->first();

        $orderplacedfound = $this->Orderplaced->find('all', ['conditions' => ['seller_id' => $seller['id']]]);

        $buyer = $this->Buyer->find('all', [
            'conditions' => ['Buyer.users_id' => $uid],
            'limit' => 1
        ])->first();

        $count = $orderplacedfound->count();
        $orderplaced = $this->paginate($orderplacedfound);

        $this->set(compact('orderplaced', 'type'));
        $this->set('usertype', $user['type']);

        $seller = $this->Seller->find('all', [
            'limit' => $count
        ])->all()->toList();
    }
    public function index3(){

        $this->viewBuilder()->disableAutoLayout();
        $type = $this->request->getSession()->read('Auth.type');
        if($type!= 'Admin'){
            return $this->redirect(['controller' => 'error', 'action' => 'error400']);
        }

        $uid = $this->request->getSession()->read('Auth.id');
        //debug($uid);

        $user = $this->loadModel('Users')->find('all', [
            'conditions' => ['Users.id' => $uid],
            'limit' => 1
        ])->first();

        $username = $user['username'];
        $welcomeMsg = "Welcome back, " . $username;

        if($username !== "") {
            //to display on website
            $this->set('username', $username);
            $this->set('welcomeMsg', $welcomeMsg);
        }

        //search function start
        $key = $this->request->getQuery('key');
        if($key)
        {
            $query = $this->Orderplaced->find()
                ->where([
                    'OR' =>
                        [['bname like' => '%'.$key.'%'], ['sname like' => '%'.$key.'%']],
                ]);
        } else {
            $query = $this->Orderplaced;
        }

        $this->set('orderplaced', $this->paginate($query,['limit'=>5000]));

        $this->set(compact('query', 'type'));
        //search function end

//            $orderplaced = $this->paginate($this->Orderplaced);
//
//            $this->set(compact('orderplaced'));
    }

    /**
     * View method
     *
     * @param string|null $id Orderplaced id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $orderplaced = $this->Orderplaced->get($id, [
            'contain' => ['Buyer'],
        ]);

        $this->set(compact('orderplaced'));


    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $orderplaced = $this->Orderplaced->newEmptyEntity();
        if ($this->request->is('post')) {
            $orderplaced = $this->Orderplaced->patchEntity($orderplaced, $this->request->getData());
            if ($this->Orderplaced->save($orderplaced)) {
                $this->Flash->success(__('The orderplaced has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The orderplaced could not be saved. Please, try again.'));
        }
        $buyer = $this->Orderplaced->Buyer->find('list', ['limit' => 200])->all();
        $this->set(compact('orderplaced', 'buyer'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Orderplaced id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $orderplaced = $this->Orderplaced->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $orderplaced = $this->Orderplaced->patchEntity($orderplaced, $this->request->getData());
            if ($this->Orderplaced->save($orderplaced)) {
                $this->Flash->success(__('The orderplaced has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The orderplaced could not be saved. Please, try again.'));
        }
        $buyer = $this->Orderplaced->Buyer->find('list', ['limit' => 200])->all();
        $this->set(compact('orderplaced', 'buyer'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Orderplaced id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $orderplaced = $this->Orderplaced->get($id);
        if ($this->Orderplaced->delete($orderplaced)) {
            $this->Flash->success(__('The orderplaced has been deleted.'));
        } else {
            $this->Flash->error(__('The orderplaced could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
