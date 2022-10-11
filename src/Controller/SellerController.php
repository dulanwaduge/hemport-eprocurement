<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Utility\Security;

/**
 * Seller Controller
 *
 * @property \App\Model\Table\SellerTable $Seller
 * @method \App\Model\Entity\Seller[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SellerController extends AppController
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
        $type = $this->request->getSession()->read('Auth.type');
        if($type!= 'Seller'){
            return $this->redirect(['controller' => 'error', 'action' => 'error400']);
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
        $this->paginate = [
            'contain' => ['Users'],
        ];
        $seller = $this->paginate($this->Seller);

        $this->set(compact('seller'));
    }

    /**
     * View method
     *
     * @param string|null $id Seller id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $seller = $this->Seller->get($id, [
            'contain' => ['Users', 'Product'],
        ]);

        $this->set(compact('seller'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $seller = $this->Seller->newEmptyEntity();
        if ($this->request->is('post')) {
            $seller = $this->Seller->patchEntity($seller, $this->request->getData());
            if ($this->Seller->save($seller)) {
                $this->Flash->success(__('The seller has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The seller could not be saved. Please, try again.'));
        }
        $users = $this->Seller->Users->find('list', ['limit' => 200])->all();
        $this->set(compact('seller', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Seller id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        if(!$id){
            $uid = $this->request->getSession()->read('Auth.id');
            $seller=$this->Seller-> find('all',['conditions'=>['users_id'=>$uid]])->first();
        }
        else {
            $seller = $this->Seller->get($id, [
                'contain' => [],
            ]);
            $this->Flash->error(__('You are not logged in.'));
        }
        if ($this->request->is(['patch', 'post', 'put'])) {

            $seller = $this->Seller->patchEntity($seller, $this->request->getData());

            //$key = XlHTzWEL3WTgQ7zR0Z81TSFP011lT2aR;
//            $encBSB = Security::encrypt((string)$seller->BSB, Security::getSalt());
//            $seller->BSB = (int)$encBSB;
//
//            $encAccNo = Security::encrypt((string)$seller->AccountNo, Security::getSalt());
//            $seller->AccountNo = (int)$encAccNo;

            if ($this->Seller->save($seller)) {
                $this->Flash->success(__('The seller has been saved.'));

                return $this->redirect(['controller' => 'Seller', 'action' => 'edit']);

            }
            $this->Flash->error(__('The seller could not be saved. Please, try again.'));
        }
        $users = $this->Seller->Users->find('list', ['limit' => 200])->all();
        $type = $this->request->getSession()->read('Auth.type');
        $this->set(compact('seller', 'users', 'type'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Seller id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $seller = $this->Seller->get($id);
        if ($this->Seller->delete($seller)) {
            $this->Flash->success(__('The seller has been deleted.'));
        } else {
            $this->Flash->error(__('The seller could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
