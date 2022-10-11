<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Mailer\Mailer;
use Cake\Routing\Router;
use Cake\Utility\Security;

/**
 * Builder Controller
 *
 * @property \App\Model\Table\BuilderTable $Builder
 * @method \App\Model\Entity\Builder[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BuilderController extends AppController
{
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        // Configure the login action to not require authentication, preventing
        $this->viewBuilder()->setLayout('hemportprofessionals');

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

        $this->Authentication->addUnauthenticatedActions(['edit']);

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
        $builder = $this->paginate($this->Builder);
        debug($builder);

        $this->set(compact('builder'));
    }
    /**
     * View new
     *
     * @param string|null $id Builder id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function viewprofile($id = null){
        $builder = $this->Builder->get($id, [
            'contain' => ['Users'],
        ]);

        if(isset($builder)) {
            $user_id = $builder->user_id;
            $projects = $this->loadModel('Projects')->find('all', ['conditions' => ['builder_id' => $user_id]])->all()->toList();

            $this->viewBuilder()->setLayout('viewprofile');
            $this->set(compact('builder', 'projects'));

            // sending message to builder
            if ($this->request->is('post')) {
                $name = $this->request->getData('name');
                $email = $this->request->getData('email');
                $message = $this->request->getData('message');

                //$userTable = TableRegistry::get('Users');
                if ($email == NULL) {
                    $this->Flash->error(__('Please insert your email'));
                } else if ($name == NULL) {
                    $this->Flash->error(__('Please insert your name'));
                } else if ($message == NULL) {
                    $this->Flash->error(__('Please insert your message'));
                } else {

                    $builderemail = $builder->email;
                    $buildername = $builder->name;

                    if (isset($builderemail) && $builderemail != null && $buildername!= null ) {
                        $mailer = new Mailer('default');
                        //$mailer->setTransport('gmail');
                        $mailer
                            ->setFrom([$email => 'Hemport Customer: ' . $name])
                            ->setTo($builderemail)
                            ->setEmailFormat('html')
                            ->setSubject('Hemport User Enquiry')
                            ->deliver('Hello,
                                   <br/><br/>I am contacting you from Hemport.
                                   <br/><br/> ' . $message . '
                                   <br/><br/> From: <br/> <em>' . $name . '</em>'
                            );
                        $this->Flash->success('Message has been sent to (' . $buildername . ').');
                    } else {
                        $this->Flash->error(__('Builder has not set up his profile yet. Please try again at a later time.'));
                    }
                }
            }
        } else {
            return $this->Flash->error(__('Builder details cannot be found.'));
        }
    }

    /**
     * View method
     *
     * @param string|null $id Builder id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $builder = $this->Builder->get($id, [
            'contain' => ['Users'],
        ]);

        if(isset($builder)) {
            $user_id = $builder->user_id;
            $projects = $this->loadModel('Projects')->find('all', ['conditions' => ['builder_id' => $user_id]])->all()->toList();

            $this->set(compact('builder', 'projects'));

            // sending message to builder
            if ($this->request->is('post')) {
                $name = $this->request->getData('name');
                $email = $this->request->getData('email');
                $message = $this->request->getData('message');

                //$userTable = TableRegistry::get('Users');
                if ($email == NULL) {
                    $this->Flash->error(__('Please insert your email'));
                } else if ($name == NULL) {
                    $this->Flash->error(__('Please insert your name'));
                } else if ($message == NULL) {
                    $this->Flash->error(__('Please insert your message'));
                } else {

                    $builderemail = $builder->email;
                    $buildername = $builder->name;

                    if (isset($builderemail) && $builderemail != null && $buildername!= null ) {
                        $mailer = new Mailer('default');
                        //$mailer->setTransport('gmail');
                        $mailer
                            ->setFrom([$email => 'Hemport Customer: ' . $name])
                            ->setTo($builderemail)
                            ->setEmailFormat('html')
                            ->setSubject('Hemport User Enquiry')
                            ->deliver('Hello,
                                   <br/><br/>I am contacting you from Hemport.
                                   <br/><br/> ' . $message . '
                                   <br/><br/> From: <br/> <em>' . $name . '</em>'
                            );
                        $this->Flash->success('Message has been sent to (' . $buildername . ').');
                    } else {
                        $this->Flash->error(__('Builder has not set up his profile yet. Please try again at a later time.'));
                    }
                }
            }
        } else {
            return $this->Flash->error(__('Builder details cannot be found.'));
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
        if($type!= 'Builder'){
            return $this->redirect(['controller' => 'error', 'action' => 'error400']);
        }

        $builder = $this->Builder->newEmptyEntity();
        if ($this->request->is('post')) {
            $builder = $this->Builder->patchEntity($builder, $this->request->getData());
            if(!$builder->getErrors()){

                $image= $this->request->getData('avatar');


                $name = $image->getClientFilename();

                $targetPath=WWW_ROOT.'img'.DS.$name;

                if($name) {
                    $image->moveTo($targetPath);

                    $builder ->avatar = $name;
                }

            }
            if ($this->Builder->save($builder)) {
                $this->Flash->success(__('The builder has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The builder could not be saved. Please, try again.'));
        }
        $users = $this->Builder->Users->find('list', ['limit' => 200])->all();
        $this->set(compact('builder', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Builder id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $type = $this->request->getSession()->read('Auth.type');
        if($type!= 'Builder'){
            return $this->redirect(['controller' => 'error', 'action' => 'error400']);
        }

        $this->viewBuilder()->disableAutoLayout();

        if(!$id){
            $uid = $this->request->getSession()->read('Auth.id');
            $builder=$this->Builder-> find('all',['conditions'=>['user_id'=>$uid]])->first();
        }
        else {
            $builder = $this->Builder->get($id, [
                'contain' => [],
            ]);

        }
        if ($this->request->is(['patch', 'post', 'put'])) {
            $builder = $this->Builder->patchEntity($builder, $this->request->getData());
            if(!$builder->getErrors()){

                $image= $this->request->getData('image_file');

                $name = $image->getClientFilename();

                $targetPath=WWW_ROOT.'img'.DS.$name;
                if($name) {
                    $image->moveTo($targetPath);

                    $builder ->avatar = $name;
                }

            }
            if ($this->Builder->save($builder)) {
                $this->Flash->success(__('The builder has been saved.'));

                return $this->redirect(['controller' => 'builder', 'action' => 'edit']);

            }
            $this->Flash->error(__('The builder could not be saved. Please, try again.'));
        }
        $users = $this->Builder->Users->find('list', ['limit' => 200])->all();
        $this->set(compact('builder', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Builder id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $builder = $this->Builder->get($id);
        if ($this->Builder->delete($builder)) {
            $this->Flash->success(__('The builder has been deleted.'));
        } else {
            $this->Flash->error(__('The builder could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
