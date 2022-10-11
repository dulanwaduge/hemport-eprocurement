<?php
declare(strict_types=1);

namespace App\Controller;

use App\Model\Table\DemandTable;
use App\Model\Table\UsersTable;
use Cake\Mailer\Mailer;
use Cake\Routing\Router;

/**
 * Product Controller
 *
 * @property \App\Model\Table\QuotationTable $Quotation
 * @method \App\Model\Entity\Quotation[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class QuotationController extends AppController
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
    public function index($id = '')
    {
        $this->viewBuilder()->disableAutoLayout();
        $type = $this->request->getSession()->read('Auth.type');
        $uid = $this->request->getSession()->read('Auth.id');
        if($type == 'Buyer'){
            if ($id) {
                $quotation = $this->Quotation->find('all', ['conditions' => ['buyer_id' => $uid, ['demand_id' => $id]]])->all()->toList();
            } else {
                $quotation = $this->Quotation->find('all', ['conditions' => ['buyer_id' => $uid]])->all()->toList();
            }
        } else if ($type == 'Seller') {
            $quotation = $this->Quotation->find('all', ['conditions' => ['seller_id' => $uid]])->all()->toList();
        } else if ($type == 'Admin') {
            $quotation = $this->Quotation->find('all')->all()->toList();
        }

        $this->set(compact('quotation', 'type'));
    }

    public function select($id) {
        $quotation = $this->Quotation->find('all',['conditions'=>['id'=>$id]])->first();
        if ($this->request->is(['patch', 'post', 'put', 'delete'])) {
            $q= $this->Quotation->patchEntity($quotation, ['status' => 1]);
            if ($this->Quotation->save($q)) {
                //Update demand status
                $demand_model = new DemandTable();
                $demand_info = $demand_model->find('all', ['conditions' => ['id'=> $quotation['demand_id']]])->first();
                $demand_info->is_receive = 1;
                $demand_model->save($demand_info);

                //find seller and buyer email
                $seller_email = $quotation['email'];

                $user_model = new UsersTable();
                $buyer_info = $user_model->find('all', ['conditions' => ['id' => $quotation['buyer_id']]])->first();
                $buyer_email = $buyer_info['username'];

                //send buyer email
                $mailer = new Mailer('default');
                $buyer_title = 'Quotation Accepted'; //email title
                $buyer_content = 'You just accepted a new quotation. For detail information please visit Hemport Website'; //email content
                $buyer_email = $buyer_email; //email address
                $mailer->setFrom(['jshe0036@student.monash.edu' => 'My Site'])
                    ->setTo($buyer_email)
                    ->setSubject($buyer_title)
                    ->deliver($buyer_content);
                //send seller email
                $seller_title = 'Quotation Accepted'; //email title
                $seller_content = 'Your Quotation just got accepted by the client. Please visit Hemport website for detail information'; //email content
                $seller_email = $seller_email; //email address
                $mailer->setFrom(['jshe0036@student.monash.edu' => 'My Site'])
                    ->setTo($seller_email)
                    ->setSubject($seller_title)
                    ->deliver($seller_content);

                $this->Flash->success(__('The quotation has been selected.'));
                return $this->redirect(['controller' => 'quotation', 'action' => 'index', $quotation['demand_id']]);
            } else {
                $this->Flash->error(__('The quotation could not be selected. Please, try again.'));
            }
        }
        $this->set(compact('quotation'));
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
        if($type== 'Buyer'){
            return $this->redirect(['controller' => 'error', 'action' => 'error400']);
        }

        $this->viewBuilder()->disableAutoLayout();

        if(!$id){
            $quotation = $this->Quotation->find('all',['conditions'=>['id'=>$id]])->first();
        } else {
            $quotation = $this->Quotation->get($id, [
                'contain' => [],
            ]);

        }
        if ($this->request->is(['patch', 'post', 'put'])) {
            $q= $this->Quotation->patchEntity($quotation, $this->request->getData());
            if ($this->Quotation->save($q)) {
                $this->Flash->success(__('The quotation has been saved.'));
                return $this->redirect(['controller' => 'quotation', 'action' => 'index']);
            } else {
                $this->Flash->error(__('The quotation could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('quotation', 'type'));
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
        $quotation = $this->Quotation->get($id);
        if ($this->Quotation->delete($quotation)) {
            $this->Flash->success(__('The quotation has been deleted.'));
        } else {
            $this->Flash->error(__('The quotation could not be deleted. Please, try again.'));
        }

        return $this->redirect(['controller' => 'quotation', 'action' => 'index']);
    }
}
