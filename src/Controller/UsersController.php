<?php
declare(strict_types=1);

namespace App\Controller;

use Authentication\PasswordHasher\DefaultPasswordHasher;
use Cake\Mailer\Mailer;
use Cake\ORM\TableRegistry;
use Cake\Routing\Router;
use Cake\Utility\Security;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    /**
     * @var \Cake\Datasource\RepositoryInterface|null
     */

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */

    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        $this->viewBuilder()->setLayout('hemporthome');

        // for all controllers in our application, make index and view
        // actions public, skipping the authentication check

        /*
        $session = $this->request->getSession();
        if ($session->check('Auth.id')) {
            $userid = $session->read('Auth.id');

            $this->redirect(array('controller' => 'home', 'action' => 'index'));
        } else {
            $this->redirect('/');
        }
        */
        $this->Authentication->addUnauthenticatedActions(['login', 'add', 'register', 'forgotpassword', 'resetpassword']);
    }

    public function index()
    {
        $this->viewBuilder()->disableAutoLayout();

        $type = $this->request->getSession()->read('Auth.type');
        if($type!= 'Admin'){
            return $this->redirect(['controller' => 'error', 'action' => 'error400']);
        }

        $uid = $this->request->getSession()->read('Auth.id');
        //debug($uid);

        $user = $this->Users->find('all', [
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
//        if($key)
//        {
//            $query = $this->Users->find('all', ['maxLimit' => 500, 'limit'=>1000])
//                ->where(['username LIKE' => '%'.$key.'%']);
//        } else {
//            $query = $this->Users;
//        }
        //for different columns, but doesn't work
        if($key)
        {
            $query = $this->Users->find()
                ->where([
                    'OR' =>
                        [['username like' => '%'.$key.'%'], ['type like' => '%'.$key.'%']],
                ]);
        } else {
            $query = $this->Users;
        }

        $this->set('users', $this->paginate($query,['limit'=>5000]));

        $this->set(compact('query', 'type'));
        //search function end

//        $users = $this->paginate($this->Users);

//        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->viewBuilder()->disableAutoLayout();

        $type = $this->request->getSession()->read('Auth.type');
        if($type!= 'Admin'){
            return $this->redirect(['controller' => 'error', 'action' => 'error400']);
        }


        $userview = $this->Users->get($id, [
            'contain' => ['Farmer', 'Manufactures'],
        ]);

        $uid = $this->request->getSession()->read('Auth.id');
        //debug($uid);

        $user = $this->Users->find('all', [
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




        $seller = $this->loadModel('Seller')->find('all', [
            'conditions' => ['users_id' => $id],
            'limit' => 1
        ])->first();


        $buyer = $this->loadModel('Buyer')->find('all', [
            'conditions' => ['users_id' => $id],
            'limit' => 1
        ])->first();

        $builder = $this->loadModel('Builder')->find('all', [
            'conditions' => ['user_id' => $id],
            'limit' => 1
        ])->first();

        $product = $this->loadModel('Product')->find('all',['conditions'=>['seller_id'=>$id]])->all()->toList();


        $projects = $this->loadModel('Projects')->find('all',['conditions'=>['builder_id'=>$id]])->all()->toList();


        $this->set(compact('user','seller','buyer','builder','projects','product','userview'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->viewBuilder()->disableAutoLayout();

        $type = $this->request->getSession()->read('Auth.type');
        if($type!= 'Admin'){
            return $this->redirect(['controller' => 'error', 'action' => 'error400']);
        }

        $uid = $this->request->getSession()->read('Auth.id');
        //debug($uid);

        $user = $this->Users->find('all', [
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
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user', 'type'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        //$this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['controller' => 'users', 'action' => 'index']);
    }

    public function login()
    {
        $this->viewBuilder()->disableAutoLayout();
        //$this->viewBuilder()->setLayout('login');

        $this->request->allowMethod(['get', 'post']);
        $result = $this->Authentication->getResult();

        // regardless of POST or GET, redirect if user is logged in

        if ($result->isValid()) {

            // redirect to /articles after login success
            $redirect = $this->request->getQuery('redirect', [
                'controller' => 'home',
                'action' => 'index',
            ]);

            return $this->redirect($redirect);
        } // display error if user submitted and authentication failed
        if($this->request->is('post')){
            //debug($result);
            //exit;
            $this->Flash->error(__('Invalid username or password'));
        }
    }


    public function logout()
    {
        $result = $this->Authentication->getResult();
        // regardless of POST or GET, redirect if user is logged in
        if ($result->isValid()) {
            $this->Authentication->logout();

            $this->Flash->error(__('You have logged out.'));

            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }
    }

    public function register()
    {
        $this->viewBuilder()->setLayout('register');
        $this->loadModel('Seller');
        $this->loadModel('Buyer');
        $this->loadModel('Builder');

        $user = $this->Users->newEmptyEntity();

        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());

            //this is for showing which user is going to be created  after clicking on submit btn for confirmation, sadly doesn't work
//            $usertype = $this->request->getData('type');
//            $this->set('usertype', $usertype);

            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                $this->Authentication->setIdentity($user);

                $uid = $this->request->getSession()->read('Auth.id');
                $type = $this->request->getSession()->read('Auth.type');

                if ($type == 'Seller') {
                    $seller = $this->Seller->newEmptyEntity();
                    $seller->users_id = $uid;
                    if ($this->Seller->save($seller)) {

                        $this->redirect(['controller' => 'seller', 'action' => 'edit', $seller->id]);
                        return $this->Flash->success(__('Please fill in your profile details.'));
                    } else {
                        $this->Flash->error(__('your settings were not saved.'));
                    }
                }
                else if($type == 'Buyer'){
                    $buyer = $this->Buyer->newEmptyEntity();
                    $buyer->users_id = $uid;
                    if ($this->Buyer->save($buyer)) {

                        $this->redirect(['controller' => 'buyer', 'action' => 'edit', $buyer->id]);
                        return $this->Flash->success(__('Please fill in your profile details.'));
                    } else {
                        $this->Flash->error(__('your settings were not saved.'));
                    }

                }
                else if($type == 'Builder'){
                    $builder = $this->Builder->newEmptyEntity();
                    $builder->user_id = $uid;
                    if ($this->Builder->save($builder)) {

                        $this->redirect(['controller' => 'builder', 'action' => 'edit', $builder->id]);
                        return $this->Flash->success(__('Please fill in your profile details.'));
                    } else {
                        $this->Flash->error(__('your settings were not saved.'));
                    }

                }

            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }


//  For local machine and Gmail
//    public function forgotpassword()
//    {
//        if ($this->request->is('post')) {
//            $username = $this->request->getData('username');
//            $token = Security::hash(Security::randomBytes(25));
//            $resetpwURL = Router::url(['controller' => 'users', 'action' => 'resetpassword']);
//
//            //$userTable = TableRegistry::get('Users');
//            if ($username == NULL) {
//                $this->Flash->error(__('Please insert your username'));
//            }
//            if	($user = $this->Users->find('all')->where(['username'=>$username])->first()) {
//                $user->token = $token;
//                if ($this->Users->save($user)){
//                    $mailer = new Mailer('default');
//                    $mailer->setTransport('gmail');
//                    $mailer->setFrom(['noreply@hemport.com' => 'Hemport Team'])
//                        ->setTo($username)
//                        ->setEmailFormat('html')
//                        ->setSubject('Forgot Password Request')
//                        ->deliver('Hello<br/>Please click link below to reset your password<br/><br/><a href="localhost/'.$resetpwURL.'/'.$token.'">Reset Password</a>');
//                }
//                $this->Flash->success('Reset password link has been sent to your email ('.$username.'), please check your email');
//            }
//            if	($total = $this->Users->find('all')->where(['username'=>$username])->count()==0) {
//                $this->Flash->error(__('Email is not registered in system'));
//            }
//        }
//    }

//  for Cpanel
    public function forgotpassword()
    {
        if ($this->request->is('post')) {
            $username = $this->request->getData('username');
            $token = Security::hash(Security::randomBytes(25));
            $resetpwURL = Router::url(['controller' => 'users', 'action' => 'resetpassword', '_full' => true]);
//            $domainROOT = "https://dev.u21s2117.monash-ie.me";
            $fullresetpwURL = $resetpwURL.'/'.$token;

            //$userTable = TableRegistry::get('Users');
            if ($username == NULL) {
                $this->Flash->error(__('Please insert your username'));
            }
            if	($user = $this->Users->find('all')->where(['username'=>$username])->first()) {
                $user->token = $token;
                if ($this->Users->save($user)){
                    $mailer = new Mailer('default');
                    //$mailer->setTransport('gmail');
                    $mailer
                        ->setFrom(['do-not-reply@hemport.com' => 'Hemport Team'])
                        ->setTo($username)
                        ->setEmailFormat('html')
                        ->setSubject('Forgot Password Request')
                        ->deliver('Hi
                                    <br/>Please click link below to reset your password
                                    <br/><a href="'.h($fullresetpwURL).'">Reset Password</a>
                                    <br/><br/> or
                                    <br/><br/> copy the link below to your web browser:
                                    <br/> '.$fullresetpwURL.'
                                    <br/><br/> Thank you,
                                    <br/><br/> Hemport Team
                                    <br/><br/> <b>*This is an automated email, do not reply*</b>'

                        );
                }
                $this->Flash->success('Reset password link has been sent to your email ('.$username.'), please check your email');
            }
            if	($total = $this->Users->find('all')->where(['username'=>$username])->count()==0) {
                $this->Flash->error(__('Email is not registered in system'));
            }
        }
    }

    public function resetpassword($token)
    {
        if($this->request->is('post')){
            //no need to has since cakephp 4 has a virtual function that hashes it for you when password is changed
            //$hasher = new DefaultPasswordHasher();
            //$newPass = $hasher->hash($this->request->getData('password'));

            //$userTable = TableRegistry::get('Users');
            $user = $this->Users->find('all')->where(['token'=>$token])->first();

            $user->password = $this->request->getData('password');

            if ($this->Users->save($user)) {
                $this->Flash->success('Password successfully reset. Please login using your new password');
                return $this->redirect(['action'=>'login']);
            }
            $this->Flash->error(__('Password could not be saved. Please, try again.'));
        }
    }
    public function deleteseller()
    {
        //$this->request->allowMethod(['post', 'delete']);


        $uid = $this->request->getSession()->read('Auth.id');

        $this->Authentication->logout();

        $user = $this->Users->get($uid);

        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action'=>'login']);

    }


}

