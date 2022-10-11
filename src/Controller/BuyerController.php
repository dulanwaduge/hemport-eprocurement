<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Buyer Controller
 *
 * @property \App\Model\Table\BuyerTable $Buyer
 * @method \App\Model\Entity\Buyer[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BuyerController extends AppController
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
        if($type!= 'Buyer'){
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
        $buyer = $this->paginate($this->Buyer);

        $this->set(compact('buyer'));
    }

    /**
     * View method
     *
     * @param string|null $id Buyer id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $buyer = $this->Buyer->get($id, [
            'contain' => ['Users', 'Orderplaced'],
        ]);

        $this->set(compact('buyer'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $buyer = $this->Buyer->newEmptyEntity();
        if ($this->request->is('post')) {
            $buyer = $this->Buyer->patchEntity($buyer, $this->request->getData());
            if ($this->Buyer->save($buyer)) {
                $this->Flash->success(__('The buyer has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The buyer could not be saved. Please, try again.'));
        }
        $users = $this->Buyer->Users->find('list', ['limit' => 200])->all();
        $this->set(compact('buyer', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Buyer id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $type = $this->request->getSession()->read('Auth.type');

        if($type!= 'Buyer'){
            return $this->redirect(['controller' => 'error', 'action' => 'error400']);
        }

        if(!$id){
            $uid = $this->request->getSession()->read('Auth.id');
            $buyer=$this->Buyer-> find('all',['conditions'=>['users_id'=>$uid]])->first();
        }
        else {
            $buyer = $this->Buyer->get($id, [
                'contain' => [],
            ]);

        }
        if ($this->request->is(['patch', 'post', 'put'])) {
            $buyer = $this->Buyer->patchEntity($buyer, $this->request->getData());
            if ($this->Buyer->save($buyer)) {
                $this->Flash->success(__('Your profile has been saved.'));

                return $this->redirect(['controller' => 'buyer', 'action' => 'edit']);

            }
            $this->Flash->error(__('Your profile could not be saved. Please, try again.'));
        }
        $users = $this->Buyer->Users->find('list', ['limit' => 200])->all();
        $this->set(compact('buyer', 'users', 'type'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Buyer id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $buyer = $this->Buyer->get($id);
        if ($this->Buyer->delete($buyer)) {
            $this->Flash->success(__('The buyer has been deleted.'));
        } else {
            $this->Flash->error(__('The buyer could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}
