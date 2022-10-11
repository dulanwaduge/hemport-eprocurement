<?php

namespace App\Controller;
use Cake\Mailer\Mailer;
use Cake\Routing\Router;
use Cake\Utility\Security;
use Stripe;
/**
 * Orderplaced Controller
 *
 * @property \App\Model\Table\OrderplacedTable $Orderplaced
 * @method \App\Model\Entity\Orderplaced[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
/**
 * Buyer Controller
 *
 * @property \App\Model\Table\BuyerTable $Buyer
 */
/**
 * Seller Controller
 *
 * @property \App\Model\Table\SellerTable $Seller
 */
/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */

class StripesController extends AppController
{
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);

        $this->Authentication->addUnauthenticatedActions(['stripe', 'payment', 'confirmation', 'paymentsuccess']);

        $this->viewBuilder()->setLayout('hemportshop');
    }

    public function stripe($price = null, $productid = null, $sellerid = null, $amount = null, $address = null,$name = null, $email = null, $phone = null, $state = null, $postcode = null)
    {

        $this->set("title", "Stripe Payment Gateway Integration");

        $this->loadModel('Users');
        $this->loadModel('Buyer');
        $this->loadModel('Seller');

        if($productid != null || $price != null || $sellerid != null || $amount != null || $address != null || $name != null || $email != null || $phone != null || $state != null || $postcode != null) {
            $this->set('price', $price);
            $this->set('productid', $productid);
            $this->set('sellerid', $sellerid);

            $this->set('amount', $amount);
//            $this->set('amount', $this->request->getData("amount"));

            $this->set('address', $address);
            $this->set('state', $state);
            $this->set('postcode', $postcode);
            $this->set('name', $name);
            $this->set('email', $email);
            $this->set('phone', $phone);

            //validation: if seller does not have BSB and account no, purchase cannot be made on product
            //Products seller_id as actually set to Sellers->users_id (needs to be changed to Sellers->id to avoid confusion, do take note)
            $seller = $this->Seller->find('all',['conditions'=>['id'=>$sellerid]])->first();
            if(isset($seller)) {
                $sellerBSB = $seller['bsb'];
                $sellerAccno = $seller['accountno'];
                $sellerEmail = $seller['email'];
                if (!isset($sellerBSB) || $sellerBSB == 0 || !isset($sellerAccno) || $sellerAccno == 0 || isset($sellerEmail)) {
                    $this->Flash->error(__('Note: The seller is not selling at this current time.'));
                    return $this->redirect(['controller' => 'product', 'action' => 'view', $productid]);
                }
            }

            //validation: only buyer and non registered user can purchase products
            $uid = $this->request->getSession()->read('Auth.id');
            if(isset($uid)) {
                $user = $this->Users->find('all',['conditions'=>['id'=>$uid]])->first();
                if ($user['type'] != 'Buyer'){
                    $this->Flash->error(__('Note: Purchase denied. You cannot purchase a product from an account that is not a Buyer.'));
                    return $this->redirect(['controller' => 'product', 'action' => 'view', $productid]);
                }
            }

            //tip for unregistered user: advice to create account for easy order tracking
            if(!isset($uid)) {
                $loginURL = Router::url(['controller' => 'users', 'action' => 'login', '_full' => true]);
                $message = 'Note: It is advised to register as a buyer before making purchases. <br> Log in or Register using this link: ';
                $this->Flash->msgwithurl($message, array(
                    'key' => 'positive',
                    'params' => array(
                        'link_text' => 'Click here',
                        'link_url' => $loginURL),
                    'escape' => false,
                ));
            }

        } else {
            $this->Flash->error(__('Order details could not be retrieved. Please try again.'));
            if($productid != null ) {
                $this->redirect(['controller' => 'product', 'action' => 'view', $productid]);
            }
            $this->redirect(['controller' => 'home', 'action' => 'shop']);
        }
    }

    public function payment($price = null, $productid = null, $sellerid = null, $amount = null, $address = null, $name = null, $email = null, $phone = null, $state = null, $postcode = null)
    {
        require_once VENDOR_PATH. '/stripe/stripe-php/init.php';

        $this->loadModel('Orderplaced');
        $this->loadModel('Buyer');
        $this->loadModel('Seller');
        $this->loadModel('Product');

        $this->set('price', $price);

        $description = "Product ID: ". $productid . " | Seller ID: ". $sellerid;
        $uid = $this->request->getSession()->read('Auth.id');
        if(isset($uid)) {
            $buyer = $this->Buyer->find('all',['conditions'=>['users_id'=>$uid]])->first();
            $buyerid = $buyer->id;
        } else {
            $buyerid = "Buyer is not a registered User";
        }
        $description = $description . " | Buyer ID: ". $buyerid . " | Buyer address: ". $address . " | Buyer state: ". $state . " | Buyer postcode: ". $postcode. " | Buyer email: ". $email. " | Buyer name: ". $name. " | Buyer phone: ". $phone;

        $seller = $this->Seller->find('all',['conditions'=>['id'=>$sellerid]])->first();
        if(isset($seller))
        {
            //use seller id to find seller row
            //decrypt bsb and accno (opt)
            //add to descriptions
            //$key = XlHTzWEL3WTgQ7zR0Z81TSFP011lT2aR;
//            $decrypBSB = Security::decrypt($buyer['BSB'], Security::getSalt());
//            $decrypAccNo = Security::decrypt($buyer['AccountNo'], Security::getSalt());
//            $description = $description . " | Seller BSB: ". $decrypBSB . " | Seller Account No: ". $decrypAccNo;

            $sellerEmail = $seller['emailaddress'];
            $sellerName = $seller['BusinessName'];
            $sellerId = $seller['id'];

            $description = $description . " | Seller BSB: ". $seller['bsb'] . " | Seller Account No: ". $seller['accountno'];
        }

        Stripe\Stripe::setApiKey(STRIPE_SECRET);
        $stripe = Stripe\Charge::create ([
            "amount" => $price * 100,
            "currency" => "aud",
            "source" => $_REQUEST["stripeToken"],
            "description" => $description
        ]);
        // after successfull payment, you can store payment related information into your database

        $this->Flash->success(__('Payment done successfully'));

        $orderplaced = $this->Orderplaced->newEmptyEntity();
        $orderplaced->price = floatval($price);
        $orderplaced->buyeraddress = $address;
        $orderplaced->buyerstate = $state;
        $orderplaced->buyerpostcode = $postcode;
        $orderplaced->buyeremail = $email;
        $orderplaced->amount = intval($amount);
        $orderplaced->bname = $name;
        $orderplaced->sname = $sellerName;

        if(isset($productid)) {
            $orderplaced->product_id = intval($productid);
        }

        if(isset($buyerid)) {
            $orderplaced->buyer_id = intval($buyerid);
        }

        if(isset($sellerId)) {
            $orderplaced->seller_id = intval($sellerId);
        }

        if (isset($orderplaced)) {
            if ($this->Orderplaced->save($orderplaced)) {
                $product = $this->Product->find('all', ['conditions' => ['id' => $productid]])->first();
                if (isset($product)) {
                    $product->amount = (int)$product['amount'] - $amount;
                    $this->Product->save($product);
                }

                $orderid = $orderplaced['id'];
                if ($orderid != null) {
                    if (isset($buyerid)) {
                        $this->Flash->success(__('Your Order has been saved to your account.'));
                    }
                    $this->Flash->success(__('Your Order ID is: ' . $orderplaced['id'] . ". " . 'IMPORTANT: Please do not lose this number. Save this number to track your order.'));

                    $productURL = Router::url(['controller' => 'product', 'action' => 'view', $productid, '_full' => true]);

                    //send to buyer
                    $mailer = new Mailer('default');
                    //$mailer->setTransport('gmail');
                    $mailer
                        ->setFrom(['do-not-reply@hemport.com' => 'Hemport Team'])
                        ->setTo($email)
                        ->setEmailFormat('html')
                        ->setSubject('Hemport Purchase')
                        ->deliver(' Hi, ' . $name . '.
                                   <br/><br/> You have purchased the item <em>' . $product->name . '</em> on Hemport.
                                   <br/><br/> The Order Number <em>' . $orderid . '</em> has been added to your Orders.
                                   <br/><br/> Product price: <em>$' . $product->price . '</em>
                                   <br/> Quantity purchased:  <em>' . $amount . '</em>
                                   <br/> Total cost: <em>$' . $price . '</em>
                                   <br/> Product link: <a href="' . h($productURL) . '">Click here</a>
                                   <br/><br/> <b> Details of Seller -</b>
                                   <br/> Shop name: <em>' . $sellerName . '</em>
                                   <br/> Email: <em>' . $seller['emailaddress'] . '</em>
                                   <br/> Phone: <em>' . $seller['phone'] . '</em>
                                   <br/><br/> Product will be sent to your address at: <em>' . $address . ', ' . $state . ' ' . $postcode . '</em>
                                   <br/> If you do not hear from <em>' . $sellerName . '</em> within 5 business days, please contact the Shop directly via Email: <em>' . $sellerEmail . '</em> .
                                   <br/><br/> Thank you,<b/>
                                   <br/><br/> Hemport Team <b/>
                                   <br/><br/> <b>*This is an automated email, do not reply*</b> <br/>'
                        );

                    //send to seller
                    $mailer
                        ->setFrom(['do-not-reply@hemport.com' => 'Hemport Team'])
                        ->setTo($sellerEmail)
                        ->setEmailFormat('html')
                        ->setSubject('Hemport Purchase')
                        ->deliver(' Hi, ' . $sellerName . '.
                                   <br/><br/> Your listed item <em>' . $product->name . '</em>, has been purchased on Hemport.
                                   <br/><br/> The Order Number <em>' . $orderid . '</em> has been added to your Order history.
                                   <br/><br/> Product price: <em>$' . $product->price . '</em>
                                   <br/> Quantity purchased:  <em>' . $amount . '</em>
                                   <br/> Total cost: <em>$' . $price . '</em>
                                   <br/> Product link: <a href="' . h($productURL) . '">Click here</a>
                                   <br/><br/> <b> Details of Buyer -</b>
                                   <br/> Name: <em>' . $name . '</em>
                                   <br/> Address: <em>' . $address . '</em>
                                   <br/> State: <em>' . $state . '</em>
                                   <br/> Postcode: <em>' . $postcode . '</em>
                                   <br/> Phone number: <em>' . $phone . '</em>
                                   <br/> Email: <em>' . $email . '</em>
                                   <br/><br/> Please send <em>' . $amount . ' ' . $product->name . '</em> to the listed address, or contact the Customer directly through the information provided above.
                                   <br/><br/> Thank you,<b/>
                                   <br/><br/> Hemport Team <b/>
                                   <br/><br/> <b>*This is an automated email, do not reply*</b> <br/>'
                        );

                    return $this->redirect(['action' => 'paymentsuccess', $productid, $orderid]);
                }
            }
            $this->Flash->error(__('The Order could not be saved. Please, try again or contact sales support if payment has been made.'));
            return $this->redirect(['action' => 'stripe']);
        }
        //$buyer = $this->Orderplaced->Buyer->find('list', ['limit' => 200])->all();
        //$this->set(compact('orderplaced', 'buyer'));

    }

    public function paymentsuccess($productid = null, $orderid = null){

        if($productid != null)
            $this->set('productid', $productid);

        // sending message to recipient
        if ($this->request->is('post'))
        {
            $email = $this->request->getData('email');

            //$userTable = TableRegistry::get('Users');
            if ($email == NULL) {
                $this->Flash->error(__('Please insert your email'));
            }

            $productURL = Router::url(['controller' => 'product', 'action' => 'view', $productid, '_full' => true]);

            if ($orderid != null) {

                $order = $this->loadModel('Orderplaced')->find('all', [
                    'conditions' => ['id' => $orderid],
                    'limit' => 1
                ])->first();
                if (isset($order)) {
                    $amount = $order['amount'];
                    $created = $order['created'];
                    $sellerName = $order['sname'];
                    $buyerName = $order['bname'];
                    $price = $order['price'];
                    $address = $order['buyeraddress'];
                    $state = $order['buyerstate'];
                    $postcode = $order['buyerpostcode'];

                    $product = $this->loadModel('Product')->find('all', [
                        'conditions' => ['id' => $productid],
                        'limit' => 1
                    ])->first();

                    $seller = $this->loadModel('Seller')->find('all', [
                        'conditions' => ['id' => $order['seller_id']],
                        'limit' => 1
                    ])->first();
                }
//                debug($order);debug($product);debug($seller);

                $mailer = new Mailer('default');
                //$mailer->setTransport('gmail');
                $mailer
                    ->setFrom(['do-not-reply@hemport.com' => 'Hemport Team'])
                    ->setTo($email)
                    ->setEmailFormat('html')
                    ->setSubject('Hemport Purchase')
                    ->deliver(' Hi, ' . $buyerName . '.
                                   <br/><br/> You have purchased the item <em>' . $product->name . '</em> on Hemport.
                                   <br/><br/> Your Order Number is <em>' . $orderid . '</em>.
                                   <br/><br/> Product price: <em>$' . $product->price . '</em>
                                   <br/> Quantity purchased: <em>' . $amount . '</em>
                                   <br/> Total cost: <em>$' . $price . '</em>
                                   <br/> Product link: <a href="' . h($productURL) . '">Click here</a>
                                   <br/><br/> <b> Details of Seller -</b>
                                   <br/> Shop name: <em>' . $sellerName . '</em>
                                   <br/> Email: <em>' . $seller['emailaddress'] . '</em>
                                   <br/> Phone: <em>' . $seller['phone'] . '</em>
                                   <br/> Product will be sent to your address at: <em>' . $address . ', ' . $state . ' ' . $postcode . '</em>
                                   <br/><br/> If you do not hear from <em>' . $sellerName . '</em> within 5 business days, please contact the Shop directly via Email: <em>' . $seller['emailaddress'] . '</em> .
                                   <br/><br/> Thank you,
                                   <br/><br/> Hemport Team
                                   <br/><br/> <b>*This is an automated email, do not reply*</b> <br/>'
                    );
                $this->Flash->success('Message has been sent to (' . $email . ').');
            } else {
                $this->Flash->error(__('Email could not be sent. Please try again.'));
            }
        }
    }

    public function confirmation($price = null, $productid = null, $sellerid = null, $amount = null){

        if($productid != null || $price != null || $sellerid != null || $amount != null) {
            $this->set('price', $price);
            $this->set('productid', $productid);
            $this->set('sellerid', $sellerid);
            $this->set('amount', $amount);
        } else {
            $this->Flash->error(__('Order details could not be retrieved. Please try again.'));
            if($productid != null ) {
                $this->redirect(['controller' => 'product', 'action' => 'view', $productid]);
            }
            $this->redirect(['controller' => 'home', 'action' => 'shop']);
        }

        $product = $this->loadModel('Product')->find('all', [
            'conditions' => ['id' => $productid],
            'limit' => 1
        ])->first();

        $uid = $this->request->getSession()->read('Auth.id');

        if(isset($uid)) {
            $buyer = $this->loadModel('Buyer')->find('all', [
                'conditions' => ['users_id' => $uid],
                'limit' => 1
            ])->first();
        }

        if(isset($buyer)) {
            $this->set(compact('product', 'amount', 'buyer'));
        } else {
            if(isset($product)) {
                $this->set(compact('product', 'amount'));
            } else {
                return $this->Flash->error(__('Warning: The product cannot be found. We apologise for the inconvenience. Please try again later.'));
            }
        }

        if ($this->request->is(['patch', 'post', 'put'])) {

            $proceedbtn = $this->request->getData('proceedbtn');

            if ($proceedbtn !== null) {

                if(isset($buyer) && $buyer->fname != null && $buyer->lname != null && $buyer->address != null  && $buyer->email != null && $buyer->phone != null && $buyer->state != null && $buyer->postcode != null )
                {
                    $address = $buyer['address'];
                    $name = $buyer['fname'] . ", " . $buyer['lname'];
                    $email = $buyer['email'];
                    $phone = $buyer['phone'];
                    $state = $buyer['state'];
                    $postcode = $buyer['postcode'];
                } else {
                    $address = $this->request->getData('address');
                    $name = $this->request->getData('name');
                    $email = $this->request->getData('email');
                    $phone = $this->request->getData('phone');
                    $state = $this->request->getData('state');
                    $postcode = $this->request->getData('postcode');
                }

                if(!preg_match( '/^[\.a-zA-Z0-9, ]*$/', $address ))
                {
                    return $this->Flash->error(__('Note: Your address can only consist of letters from a-z, digits from 0-9, commas and spaces. Example: "Unit 2, 2 straya st" *Do not include slashes.'));
                }

                if(!preg_match( '/^[a-zA-Z\s]+$/', $name ))
                {
                    return $this->Flash->error(__('Note: Your name can only consist of letters from a-z.'));
                }

                if(strlen($postcode) > 64)
                {
                    return $this->Flash->error(__('Note: Your name cannot consist of more than 64 characters.'));
                }

                if(!(preg_match( '/^[0-9]+$/', $postcode ) && strlen($postcode) == 4))
                {
                    return $this->Flash->error(__('Note: You need to enter a valid 4 digit postcode.'));
                }

                if(!(preg_match( '/^[0-9]+$/', $phone ) && strlen($phone) == 10))
                {
                    return $this->Flash->error(__('Note: You need to enter a valid 10 digit phone number.'));
                }

                $productmaxquantity = $product["amount"];
                $amountToOrder = $this->request->getData('amount');
//                debug($productmaxquantity);
//                debug($amountToOrder);

                if($amountToOrder > $productmaxquantity){
                    return $this->Flash->error(__('Note: Maximum quantity of item in shop is ' . $productmaxquantity . '. Please enter an equal or lower number.'));
                }

                if($address != null && $name != null && $email != null && $phone != null) {
                    return $this->redirect(
                        ['controller' => 'stripes', 'action' => 'stripe', ($product->price * $amountToOrder), $product->id, $sellerid, $amountToOrder, $address, $name, $email, $phone, $state, $postcode]
                    );
                } else {
                    $this->Flash->error(__('Note: All fields need to be filled.'));
                }
            }
        }
    }
}
