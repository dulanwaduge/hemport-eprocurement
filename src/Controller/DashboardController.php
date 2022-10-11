<?php

namespace src\templates\Dashboard;

namespace App\Controller;


class DashboardController extends AppController
{
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        // Configure the login action to not require authentication, preventing
        //$this->viewBuilder()->setLayout('dashboard');
        $this->viewBuilder()->disableAutoLayout();

        //$this->Authentication->addUnauthenticatedActions(['index2']);
    }

    //This index is for patients
    public function index()
    {


        $session = $this->request->getSession();
        if ($session->check('Auth.id')) {
            $userid = $session->read('Auth.id');

            //$patient = $this->Patients->find('all', [
            //    'conditions' => ['user_id' => $userid]
            //]);
            //$paitent_details=$this->Patient_details->find('all',['conditions'=>['user_id'=>$userid]])->all()->toList();
            // debug($patient["DOB"]);
            // $this->set('$patient_details',$patient_details);

            //get patient info
            /*
            $patient = $this->Patients->find('all', [
                'conditions' => ['buyer.user_id' => $userid],
                'limit' => 1
            ])->first();
             $heightQuery = $patient['height'];
           $fullNameQuery = $patient['firstname'] . " " . $patient['lastname'];
           $pregnantDateQuery = $patient['pregnancystartdate'];

           $this->set('patient', $patient);
           $this->set('pHeight', $heightQuery);
           $this->set('pFName', $fullNameQuery);
           $this->set('pPregnantDate', $pregnantDateQuery);
           //debug($patient);

           //get patient details info
           $pdQuery = $this->PatientDetails->find('all', [
               'conditions' => ['PatientDetails.user_id' => $userid]
           ])->toList();
           $this->set('pdQuery', $pdQuery);
              */

            /*
            //This is the same code found in Dashboard\index line 445
            //set weight array per month for weight history graph
            $weightAr = array_fill(0, 12, 0);
            //debug("size start is " . sizeof($weightAr));
            if(isset($pdQuery)){
                $length = sizeof($pdQuery);

                if($length!=0)
                {
                    for($x =0; $x < $length; $x++)
                    {
                        $wDate = $pdQuery[$x]["created"];
                        //debug($wDate);
                        if(isset($wDate)) {
                            $wMonth = $wDate->month - 1;
                            //debug($wMonth);

                            $weightAr[$wMonth] += $pdQuery[$x]["weight"];
                            //debug($weightAr[$wMonth]);
                            //debug("size end is " . sizeof($weightAr));
                        }

                    }
                }

                //check total value of each month
                //$counter = 0;
                //foreach ($weightAr as $eWeight)
                //{
                //    $counter++;
                //    debug("Month ".$counter." :".$eWeight);
                //}
            }
                       */

        }
    }
    public function index2()
    {
    }
    public function index3()
    {
    }

}
