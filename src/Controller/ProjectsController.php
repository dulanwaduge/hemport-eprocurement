<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Projects Controller
 *
 * @property \App\Model\Table\ProjectsTable $Projects
 * @method \App\Model\Entity\Project[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProjectsController extends AppController
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
        $type = $this->request->getSession()->read('Auth.type');
        if($type!= 'Builder'){
            return $this->redirect(['controller' => 'error', 'action' => 'error400']);
        }

        $uid = $this->request->getSession()->read('Auth.id');
        $projects = $this->Projects->find('all',['conditions'=>['builder_id'=>$uid]])->all()->toList();
        $this->set(compact('projects', 'type'));

    }

    public function index2(){
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
            $query = $this->Projects->find()
                ->where(['cname LIKE' => '%'.$key.'%']);
        } else {
            $query = $this->Projects;
        }

        $this->set('projects', $this->paginate($query,['limit'=>5000]));

        $this->set(compact('query', 'type'));
        //search function end

//        $projects = $this->paginate($this->Projects);
//
//        $this->set(compact('projects'));

    }

    /**
     * View method
     *
     * @param string|null $id Project id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $type = $this->request->getSession()->read('Auth.type');
        if($type!= 'Builder'){
            return $this->redirect(['controller' => 'error', 'action' => 'error400']);
        }

        $project = $this->Projects->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('project', 'type'));
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

        $this->viewBuilder()->disableAutoLayout();
        $count=0;
        $uid = $this->request->getSession()->read('Auth.id');
        $builder = $this->loadModel('Builder')->find('all',['conditions'=>['user_id'=>$uid]])->all()->toList();

        foreach ($builder as $b):
            if($b['name']!=null){
                $count++;
            }
            if($b['phone']!=null){
                $count++;
            }
            if($b['email']!=null){
                $count++;
            }
            if($b['address']!=null){
                $count++;
            }
            if($b['description']!=null){
                $count++;
            }
            if($b['city']!=null){
                $count++;
            }
            if($b['state']!=null){
                $count++;
            }
            if($b['postcode']!=null){
                $count++;
            }

        endforeach;

        if($count!=8){
            $this->redirect(['controller' => 'builder', 'action' => 'edit']);
            $this->Flash->error(__('You must complete your profile before you list a project'));

        }

        $projects = $this->Projects->newEmptyEntity();

        if ($this->request->is('post')) {
            $projects = $this->Projects->patchEntity($projects, $this->request->getData());

            //upload the file to the webroot
            if(!$projects->getErrors()){
                //upload first image
                $image1= $this->request->getData('image_file1');


                $name = $image1->getClientFilename();

                $targetPath=WWW_ROOT.'img'.DS.$name;

                if($name) {
                    $image1->moveTo($targetPath);

                    $projects ->image_1 = $name;
                }

                //upload second image

                $image2= $this->request->getData('image_file2');


                $name = $image2->getClientFilename();

                $targetPath=WWW_ROOT.'img'.DS.$name;

                if($name) {
                    $image2->moveTo($targetPath);

                    $projects ->image_2 = $name;
                }

                //upload third image

                $image3= $this->request->getData('image_file3');


                $name = $image3->getClientFilename();

                $targetPath=WWW_ROOT.'img'.DS.$name;

                if($name) {
                    $image3->moveTo($targetPath);

                    $projects ->image_3 = $name;
                }

                //upload fourth image

                $image4= $this->request->getData('image_file4');

                $name = $image4->getClientFilename();

                $targetPath=WWW_ROOT.'img'.DS.$name;

                if($name) {
                    $image4->moveTo($targetPath);

                    $projects ->image_4 = $name;
                }

            }

            $uid = $this->request->getSession()->read('Auth.id');
            $projects->builder_id = $uid;


            if ($this->Projects->save($projects)) {
                $this->Flash->success(__('The projects has been saved.'));

                $this->redirect(['controller' => 'projects', 'action' => 'index']);
            }
            $this->Flash->error(__('The projects could not be saved. Please, try again.'));
        }
        $this->set(compact('projects', 'type'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Project id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function editasadmin($id = null)
    {
        $type = $this->request->getSession()->read('Auth.type');
        if($type!= 'Admin'){
            return $this->redirect(['controller' => 'error', 'action' => 'error400']);
        }
        $projects = $this->Projects->get($id, [
            'contain' => [],
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $projects = $this->Projects->patchEntity($projects, $this->request->getData());
            //upload the file to the webroot
            if(!$projects->getErrors()){
                //upload first image
                $image1= $this->request->getData('image_file1');


                $name = $image1->getClientFilename();

                $targetPath=WWW_ROOT.'img'.DS.$name;

                if($name) {
                    $image1->moveTo($targetPath);

                    $projects ->image_1 = $name;
                }

                //upload second image

                $image2= $this->request->getData('image_file2');


                $name = $image2->getClientFilename();

                $targetPath=WWW_ROOT.'img'.DS.$name;

                if($name) {
                    $image2->moveTo($targetPath);

                    $projects ->image_2 = $name;
                }

                //upload third image

                $image3= $this->request->getData('image_file3');


                $name = $image3->getClientFilename();

                $targetPath=WWW_ROOT.'img'.DS.$name;

                if($name) {
                    $image3->moveTo($targetPath);

                    $projects ->image_3 = $name;
                }

                //upload fourth image

                $image4= $this->request->getData('image_file4');

                $name = $image4->getClientFilename();

                $targetPath=WWW_ROOT.'img'.DS.$name;

                if($name) {
                    $image4->moveTo($targetPath);

                    $projects ->image_4 = $name;
                }

            }

            $uid = $this->request->getSession()->read('Auth.id');
            $projects->builder_id = $uid;

            if ($this->Projects->save($projects)) {
                $this->Flash->success(__('The project has been saved.'));

                return $this->redirect(['action' => 'index2']);
            }
            $this->Flash->error(__('The project could not be saved. Please, try again.'));
        }
        $this->set(compact('projects', 'type'));

    }
    public function edit($id = null)
    {
        $type = $this->request->getSession()->read('Auth.type');
        if($type!= 'Builder'){
            return $this->redirect(['controller' => 'error', 'action' => 'error400']);
        }

        $projects = $this->Projects->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $projects = $this->Projects->patchEntity($projects, $this->request->getData());
            //upload the file to the webroot
            if(!$projects->getErrors()){
                //upload first image
                $image1= $this->request->getData('image_file1');


                $name = $image1->getClientFilename();

                $targetPath=WWW_ROOT.'img'.DS.$name;

                if($name) {
                    $image1->moveTo($targetPath);

                    $projects ->image_1 = $name;
                }

                //upload second image

                $image2= $this->request->getData('image_file2');


                $name = $image2->getClientFilename();

                $targetPath=WWW_ROOT.'img'.DS.$name;

                if($name) {
                    $image2->moveTo($targetPath);

                    $projects ->image_2 = $name;
                }

                //upload third image

                $image3= $this->request->getData('image_file3');


                $name = $image3->getClientFilename();

                $targetPath=WWW_ROOT.'img'.DS.$name;

                if($name) {
                    $image3->moveTo($targetPath);

                    $projects ->image_3 = $name;
                }

                //upload fourth image

                $image4= $this->request->getData('image_file4');

                $name = $image4->getClientFilename();

                $targetPath=WWW_ROOT.'img'.DS.$name;

                if($name) {
                    $image4->moveTo($targetPath);

                    $projects ->image_4 = $name;
                }

            }

            $uid = $this->request->getSession()->read('Auth.id');
            $projects->builder_id = $uid;

            if ($this->Projects->save($projects)) {
                $this->Flash->success(__('The project has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The project could not be saved. Please, try again.'));
        }
        $this->set(compact('projects'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Project id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $projects = $this->Projects->get($id);
        if ($this->Projects->delete($projects)) {
            $this->Flash->success(__('The project has been deleted.'));
        } else {
            $this->Flash->error(__('The project could not be deleted. Please, try again.'));
        }

        return $this->redirect(['controller' => 'users', 'action' => 'index']);
    }
}
