<?php

namespace App\Controller;

use Cake\ORM\TableLocator;

class HomeController extends AppController
{
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        /*
        $session = $this->request->getSession();
        if ($session->check('Auth.id')) {
            $userid = $session->read('Auth.id');

            $this->redirect(array('controller' => 'home', 'action' => 'index'));
        } else {
            $this->redirect('/');
        }
        */

        $this->Authentication->addUnauthenticatedActions(['discoverproject', 'sustainability', 'shop', 'productpage', 'findprofessionals']);

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

            if(isset($user)) {
                $welcomeMsg = "Welcome back, " . $user['username'];
                //debug($welcomeMsg);

                if ($welcomeMsg !== "") {
                    //to display on website
                    $this->set('welcomeMsg', $welcomeMsg);
                }
            }
        }

    }

    public function index()
    {
        $this->viewBuilder()->setLayout('hemporthome');
        $this->loadModel('Product');
        $this -> loadModel('Admins');
        $this ->loadModel('Builder');
        $this ->loadModel('Demand');
        $product = $this->Product->find('all')->limit(4)->all()->toList();
        $builder= $this -> Builder -> find('all')->limit(4)->all()->toList();
        $admin1   = $this->Admins->find('all',['conditions'=>['id'=>1]])->all()->first();
        $admin2   = $this->Admins->find('all',['conditions'=>['id'=>9]])->all()->first();
        $projects   = $this->Demand->find('all')->limit(4)->all()->toList();

        // $uid = $this->request->getSession()->read('Auth.id');
        // if(isset($uid))
        //     $this->set('uid', $uid);
        // debug($uid);

        $this->set(compact('product','admin1','admin2','builder', 'projects'));
    }

    public function sustainability()
    {
        $this->viewBuilder()->setLayout('hemportsustainability');
    }

    public function shop()
    {
        $this->viewBuilder()->setLayout('hemportshop');
        $this->loadModel('Product');

        $key = $this->request->getQuery('key');
        if($key)
        {
            $pn = $this->Product->find('all', ['maxLimit' => 10, 'limit'=>100])
                ->where(['name like' => '%'.$key.'%'])->all();
            $product = $pn->toList();
        } else {
            $pn = $this->Product->find('all')->all();
            $product = $pn->toList();
        }

        $this->set(compact('product','pn'));
    }

    public function productpage()
    {
        $this->viewBuilder()->setLayout('hemportshop');

    }

    public function findprofessionals()
    {
        $this->viewBuilder()->setLayout('hemportprofessionals');

        $this->loadModel('Builder');
        $key = $this->request->getQuery('key');
        if($key)
        {
            $query = $this->Builder->find('all')
                ->where(['name like' => '%'.$key.'%']);
        } else {
            $query = $this->Builder->find('all');
        }

        $this->set('builders', $this->paginate($query));
        //$this->set('searchcount', $count);
        //$builder = $this->paginate($query);
        $this->set(compact('query'));
    }

    public function discoverproject() {
        $this->viewBuilder()->setLayout('hemportdiscoverproject');

        $this->loadModel('Demand');
        $query = $this->Demand->find('all', ['conditions' => ['is_receive' => 0]]);
        $this->set('demand', $this->paginate($query, ['limit'=>5000]));
    }

    public function discoverprojectdetail($id) {
        $this->viewBuilder()->setLayout('hemportdiscoverprojectdetail');

        $this->loadModel('Demand');
//        $query = $this->Demand->find('all');
        $query = $this->Demand-> find('all',['conditions'=>['id'=>$id]])->first();
        $this->set('demand', $query);
    }

    public function quotation($id) {
        $this->viewBuilder()->setLayout('hemportquotation');
        if ($this->request->is('post')) {
            $this->loadModel('Quotation');
            $quotation = $this->Quotation->newEmptyEntity();
            $quotation = $this->Quotation->patchEntity($quotation, $this->request->getData());
            //Setting Value
            $quotation["create_time"] = date("Y-m-d H:i:s");
            $quotation["demand_id"] = $id;
            $quotation["seller_id"] = $this->request->getSession()->read("Auth.id");
            //Check buyer_id
            $this->loadModel('Demand');
            $demand_info = $this->Demand-> find('all',['conditions'=>['id'=>$id]])->first();


            $quotation["buyer_id"] = $demand_info['buyer_id'];
            if ($this->Quotation->save($quotation)) {
                //Look for quotation_number
                $quotation_number = $demand_info['quotation_number'] + 1;
                $demand_info->quotation_number = $quotation_number;
                $this->Demand->save($demand_info);

                $this->Flash->success(__('The quotation has been saved.'));

                return $this->redirect(['controller' => 'Quotation', 'action' => 'index']);
            }
            $this->Flash->error(__('The quotation could not be saved. Please, try again.'));
        } else {
            $type = $this->request->getSession()->read('Auth.type');
            if($type!= 'Seller'){
                return $this->redirect(['controller' => 'error', 'action' => 'error400']);
            }
        }
    }
}
