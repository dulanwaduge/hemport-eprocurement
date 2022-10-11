<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Mailer\Mailer;
use Cake\Routing\Router;

/**
 * Product Controller
 *
 * @property \App\Model\Table\ProductTable $Product
 * @method \App\Model\Entity\Product[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProductController extends AppController
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
        if($type!= 'Seller'){
            return $this->redirect(['controller' => 'error', 'action' => 'error400']);
        }

        $uid = $this->request->getSession()->read('Auth.id');
        $seller = $this->loadModel('Seller')->find('all',['conditions'=>['users_id'=>$uid]])->first();
        $sid = $seller->id;
        $product = $this->Product->find('all',['conditions'=>['seller_id'=>$sid]])->all()->toList();
        $this->set(compact('product', 'type'));
    }

    public function index2(){

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
            $query = $this->Product->find()
                ->where([
                    'OR' =>
                        [['name like' => '%'.$key.'%'], ['availability like' => '%'.$key.'%']],
                ]);
        } else {
            $query = $this->Product;
        }

        $this->set('product', $this->paginate($query,['limit'=>5000]));

        $this->set(compact('query', 'type'));
        //search function end

//        $product = $this->paginate($this->Product);
//
//        $this->set(compact('product'));

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

       $product = $this->Product->get($id, [
            'contain' => [],
        ]);

        if(isset($product))
        {
            $user_id = $product->seller_id;
            $availability = $product->availability;

            $this->set('availability', $availability);
        } else {
            return $this->Flash->error(__('This Product is not available at the moment. Please try again later.'));
        }

        $seller = $this->loadModel('Seller')->find('all', ['conditions' => ['id' => $user_id]])->all()->toList();

        $this->set(compact('product','seller'));

        $sellerAr = $this->loadModel('Seller')->find('all', ['conditions' => ['id' => $user_id]])->first();
        if(isset($sellerAr))
        {
            $sellerEmail = $sellerAr['emailaddress'];
            $sellerid = $sellerAr['id'];
        } else {
            return $this->Flash->error(__('The Seller\'s shop is not available at the moment. Please try again later.'));
        }

        // sending message to recipient
        if ($this->request->is(['patch', 'post', 'put'])) {
            $orderbtn = $this->request->getData('orderconfirm');
            $emailbtn = $this->request->getData('emailbtn');

            //if 'order item' button is pressed
            if($orderbtn !== null) {
                $amount = intval($this->request->getData('amount'));

                if($product->availability == "Yes") {
                    if (is_numeric($amount) && $amount > 0 && $amount == round($amount, 0)) {
                        if ($amount <= $product->amount) {
                            return $this->redirect(['controller' => 'stripes', 'action' => 'confirmation', $product->price, $product->id, $sellerid, $amount]);
                        }
                        $this->Flash->error(__('Please enter a purchase amount that is below the amount displayed.'));
                    }
                    $this->Flash->error(__('Please enter only numbers in the amount field.'));
                } else {
                    $this->Flash->error(__('Item is not available at this time.'));
                }
            }

            //if 'email' button is pressed
            if($emailbtn !== null) {
                $email = $this->request->getData('email');
                $name = $this->request->getData('name');
                $message = $this->request->getData('message');

                //$userTable = TableRegistry::get('Users');
                if ($email == NULL) {
                    $this->Flash->error(__('Please insert your email'));
                } else if ($name == NULL) {
                    $this->Flash->error(__('Please insert your name'));
                } else if ($message == NULL) {
                    $this->Flash->error(__('Please insert your message'));
                } else {
                    if (isset($sellerAr)) {
                        $mailer = new Mailer('default');
                        //$mailer->setTransport('gmail');
                        $mailer
                            ->setFrom(['do-not-reply@hemport.com' => 'Hemport Team'])
                            ->setTo($sellerEmail)
                            ->setEmailFormat('html')
                            ->setSubject('Hemport Product Enquiry')
                            ->deliver('Hello!<br/>A User is making an enquiry about your product "' . $product->name . '"  on Hemport.<br/>
                                   <br/> ' . 'My name is ' . $name . ' <br/> ' .
                                ' <br/> ' . 'You can reply me via Email with ' . $email . ' <br/> ' .
                                ' <br/> ' . $message . ' <br/> '
                            );
                        $this->Flash->success('Message has been sent to the Seller. Please give the Seller some time to get back to your enquiry.');
                    } else {
                        $this->Flash->error(__('Email could not be sent. Please try again.'));
                    }
                }
            }
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
        if($type!= 'Seller'){
            return $this->redirect(['controller' => 'error', 'action' => 'error400']);
        }

        $this->viewBuilder()->disableAutoLayout();

        $uid = $this->request->getSession()->read('Auth.id');

        $seller = $this->loadModel('Seller')->find('all',['conditions'=>['users_id'=>$uid]])->all()->toList();

        $count=0;

        foreach ($seller as $s):
            if($s['address']!=null){
                $count++;
            }
            if($s['BusinessName']!=null){
                $count++;
            }
            if($s['phone']!=null){
                $count++;
            }
            if($s['emailaddress']!=null){
                $count++;
            }
            if($s['bsb']!=null){
                $count++;
            }
            if($s['accountno']!=null){
                $count++;
            }

            endforeach;

        if($count!=6){
            $this->redirect(['controller' => 'seller', 'action' => 'edit']);
            $this->Flash->error(__('Please fill in your Profile details, and then you can list items.'));

        }
        else {
            $product = $this->Product->newEmptyEntity();
            if ($this->request->is('post')) {
                $product = $this->Product->patchEntity($product, $this->request->getData());

                //upload the file to the webroot
                if (!$product->getErrors()) {

                    $image = $this->request->getData('image_file');


                    $name = $image->getClientFilename();

                    $targetPath = WWW_ROOT . 'img' . DS . $name;

                    if ($name) {
                        $image->moveTo($targetPath);

                        $product->image = $name;
                    }

                    //upload second image

                    $image2 = $this->request->getData('image_file2');


                    $name = $image2->getClientFilename();

                    $targetPath = WWW_ROOT . 'img' . DS . $name;

                    if ($name) {
                        $image2->moveTo($targetPath);

                        $product->image_2 = $name;
                    }

                    //upload third image

                    $image3 = $this->request->getData('image_file3');


                    $name = $image3->getClientFilename();

                    $targetPath = WWW_ROOT . 'img' . DS . $name;

                    if ($name) {
                        $image3->moveTo($targetPath);

                        $product->image_3 = $name;
                    }

                    //upload fourth image

                    $image4 = $this->request->getData('image_file4');

                    $name = $image4->getClientFilename();

                    $targetPath = WWW_ROOT . 'img' . DS . $name;

                    if ($name) {
                        $image4->moveTo($targetPath);

                        $product->image_4 = $name;
                    }

                }

                $uid = $this->request->getSession()->read('Auth.id');

                $se=$this->loadModel('Seller')->find('all',['conditions'=>['users_id'=>$uid]])->all()->first();

                $sid=$se->id;


                $product->seller_id = $sid;




                if ($this->Product->save($product)) {
                    $this->Flash->success(__('The product has been saved.'));

                    $this->redirect(['controller' => 'product', 'action' => 'index']);
                }
                $this->Flash->error(__('The product could not be saved. Please, try again.'));
            }
            $this->set(compact('product', 'type'));
        }
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
        if($type!= 'Seller'){
            return $this->redirect(['controller' => 'error', 'action' => 'error400']);
        }

        $this->viewBuilder()->disableAutoLayout();

        if(!$id){
            $uid = $this->request->getSession()->read('Auth.id');
            $product=$this->Product-> find('all',['conditions'=>['users_id'=>$uid]])->first();
        }
        else {
            $product = $this->Product->get($id, [
                'contain' => [],
            ]);

        }
        if ($this->request->is(['patch', 'post', 'put'])) {
            $product= $this->Product->patchEntity($product, $this->request->getData());
            if(!$product->getErrors()){

                $image= $this->request->getData('image_file');


                $name = $image->getClientFilename();

                $targetPath=WWW_ROOT.'img'.DS.$name;

                if($name) {
                    $image->moveTo($targetPath);

                    $product ->image = $name;
                }


                //upload second image

                $image2= $this->request->getData('image_file2');


                $name = $image2->getClientFilename();

                $targetPath=WWW_ROOT.'img'.DS.$name;

                if($name) {
                    $image2->moveTo($targetPath);

                    $product ->image_2 = $name;
                }

                //upload third image

                $image3= $this->request->getData('image_file3');


                $name = $image3->getClientFilename();

                $targetPath=WWW_ROOT.'img'.DS.$name;

                if($name) {
                    $image3->moveTo($targetPath);

                    $product ->image_3 = $name;
                }

                //upload fourth image

                $image4= $this->request->getData('image_file4');

                $name = $image4->getClientFilename();

                $targetPath=WWW_ROOT.'img'.DS.$name;

                if($name) {
                    $image4->moveTo($targetPath);

                    $product ->image_4 = $name;
                }

            }
            if ($this->Product->save($product)) {
                $this->Flash->success(__('The seller has been saved.'));

                return $this->redirect(['controller' => 'product', 'action' => 'index']);

            }
            $this->Flash->error(__('The seller could not be saved. Please, try again.'));
        }
        $this->set(compact('product', 'type'));
    }

    public function editasadmin($id = null){

        $type = $this->request->getSession()->read('Auth.type');
        if($type!= 'Admin'){
            return $this->redirect(['controller' => 'error', 'action' => 'error400']);
        }

        $this->viewBuilder()->disableAutoLayout();

        if(!$id){
            $uid = $this->request->getSession()->read('Auth.id');
            $product=$this->Product-> find('all',['conditions'=>['users_id'=>$uid]])->first();
        }
        else {
            $product = $this->Product->get($id, [
                'contain' => [],
            ]);

        }
        if ($this->request->is(['patch', 'post', 'put'])) {
            $product= $this->Product->patchEntity($product, $this->request->getData());
            if(!$product->getErrors()){

                $image= $this->request->getData('image_file');


                $name = $image->getClientFilename();

                $targetPath=WWW_ROOT.'img'.DS.$name;

                if($name) {
                    $image->moveTo($targetPath);

                    $product ->image = $name;
                }


                //upload second image

                $image2= $this->request->getData('image_file2');


                $name = $image2->getClientFilename();

                $targetPath=WWW_ROOT.'img'.DS.$name;

                if($name) {
                    $image2->moveTo($targetPath);

                    $product ->image_2 = $name;
                }

                //upload third image

                $image3= $this->request->getData('image_file3');


                $name = $image3->getClientFilename();

                $targetPath=WWW_ROOT.'img'.DS.$name;

                if($name) {
                    $image3->moveTo($targetPath);

                    $product ->image_3 = $name;
                }

                //upload fourth image

                $image4= $this->request->getData('image_file4');

                $name = $image4->getClientFilename();

                $targetPath=WWW_ROOT.'img'.DS.$name;

                if($name) {
                    $image4->moveTo($targetPath);

                    $product ->image_4 = $name;
                }

            }
            if ($this->Product->save($product)) {
                $this->Flash->success(__('The seller has been saved.'));

                return $this->redirect(['controller' => 'product', 'action' => 'index']);

            }
            $this->Flash->error(__('The seller could not be saved. Please, try again.'));
        }
        $this->set(compact('product', 'type'));

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
        $product = $this->Product->get($id);
        if ($this->Product->delete($product)) {
            $this->Flash->success(__('The product has been deleted.'));
        } else {
            $this->Flash->error(__('The product could not be deleted. Please, try again.'));
        }

        return $this->redirect(['controller' => 'users', 'action' => 'index']);
    }
}
