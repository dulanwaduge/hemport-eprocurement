<?php

namespace App\Controller;
use Stripe;

class StripesController extends AppController
{
    public function stripe($id)
    {
        $this->loadModel("Orders");
        $order = $this->Orders->find()->where(['order_no'=>$id])->first();
        if(empty($order)){
            //$this->Flash->error(__('Order not exits'));
            return $this->redirect(['controller' => 'demand', 'action' => 'add']);
        }
        $total = $order->total;
        if($order->pay_status=="1"){
            //$this->Flash->error(__('Payment done successfully'));
            return $this->redirect(['controller' => 'demand', 'action' => 'add']);
        }

        $this->set("title", "Stripe Payment Gateway Integration");
        $this->set(compact('total',"id"));
    }

    public function payment($id)
    {
        $this->loadModel("Orders");
        $order = $this->Orders->find()->where(['order_no'=>$id])->first();
        $total = $order->total;
        Stripe\Stripe::setApiKey(STRIPE_SECRET);
        $stripe = Stripe\Charge::create ([
            "amount" => $total * 100,
            "currency" => "usd",
            "source" => $_REQUEST["stripeToken"],
            "description" => "Payment succeed,Order no:".$id
        ]);
        if(!empty($stripe) &&$stripe->status=="succeeded"){
        $data = [
            'pay_time'=>date("Y-m-d H:i:s"),
            'pay_status'=>"1"
        ];
        $order = $this->Orders->patchEntity($order, $data);
        $this->Orders->save($order);
            // after successfull payment, you can store payment related information into your database
            $this->Flash->success(__('Payment done successfully'));

            return $this->redirect(['controller' => 'demand', 'action' => 'add']);
        }
        return $this->redirect([ 'action' => 'stripe',$id]);
    }
}
