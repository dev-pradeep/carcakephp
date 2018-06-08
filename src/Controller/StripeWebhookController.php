<?php
/**
 *      __  ___      ____  _     ___                           _                    __
 *     /  |/  /_  __/ / /_(_)___/ (_)___ ___  ___  ____  _____(_)___  ____   ____ _/ /
 *    / /|_/ / / / / / __/ / __  / / __ `__ \/ _ \/ __ \/ ___/ / __ \/ __ \ / __ `/ /
 *   / /  / / /_/ / / /_/ / /_/ / / / / / / /  __/ / / (__  ) / /_/ / / / // /_/ / /
 *  /_/  /_/\__,_/_/\__/_/\__,_/_/_/ /_/ /_/\___/_/ /_/____/_/\____/_/ /_(_)__,_/_/
 *
 *  @author Multidimension.al
 *  @copyright Copyright © 2016-2018 Multidimension.al - All Rights Reserved
 *  @license Proprietary and Confidential
 *
 *  NOTICE:  All information contained herein is, and remains the property of
 *  Multidimension.al and its suppliers, if any.  The intellectual and
 *  technical concepts contained herein are proprietary to Multidimension.al
 *  and its suppliers and may be covered by U.S. and Foreign Patents, patents in
 *  process, and are protected by trade secret or copyright law. Dissemination
 *  of this information or reproduction of this material is strictly forbidden
 *  unless prior written permission is obtained.
 */

namespace App\Controller;
use App\Controller\AppController;
use Cake\ORM\TableRegistry; 
/**
 * Vehicles Controller
 *
 * @property \App\Model\Table\VehiclesTable $Vehicles
 *
 * @method \App\Model\Entity\Vehicle[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class StripeWebhookController extends AppController
{
	public function initialize()
    {
        parent::initialize();
		$this->Auth->allow(['index']);		
		$this->loadComponent('Stripe');
    }
    public function index(){
		$input = @file_get_contents("php://input");
		$event_json = json_decode($input);				
        $type=$event_json->type;		
		if($type=='invoice.payment_succeeded'){						
			$data=$event_json->data->object;						
			//$planid=$data->lines->data[0]->plan->id;						
			//$customerid=$data->customer;
			$chargid=$data->charge;
			
			$customerid='cus_CYvRF2cGYjYrEN';
			$planid='standard';
			$userdata=TableRegistry::get('users')->find()->where(['stripe_id' => $customerid])->toArray()[0];			
			$userdata= (object) $userdata;
			if($userdata){
				$uid=$userdata->id;
				$plandetails=TableRegistry::get('plan')->find()->where(['plan_stripe_id' => $planid])->toArray();
				if($plandetails){
					$userplanname=$plandetails[0]->plan_name;						
					$plan_stripe_id=$plandetails[0]->plan_stripe_id;
				}else{
					$userplanname='Trial';
				}
				if($userplanname){													
					$charge=$this->Stripe->getStripeCharge('ch_1C9CQJF5lIAzJ4qayKu2MJ4h');
					$alldata=json_decode(json_encode($charge),true);
					//Userpaln					
					$Userspaln = TableRegistry::get('users_paln');					
					$userpaln['up_pay']= 0 ;
					$userpaln['isDeleted']= 1 ;					
					$userpaln['status']= 0 ;										
					$query= $Userspaln->query();
					$query->update()->set($userpaln)->where(['user_id' => $uid])->execute();
					
					$userplan = $Userspaln->newEntity();
					$userplan['up_name']=$userplanname;
					$userplan['up_start_date']=date('Y-m-d');
					$userplan['up_end_date']=date('Y-m-d', strtotime(date('Y-m-d').'+'.$plandetails[0]->paln_day.'day'));
					$userplan['up_select_id']=$plandetails[0]->plan_id;
					$userplan['user_id']=$uid;
					$userplan['active_plan']=$plandetails[0]->plan_id;
					$userplan['up_pay']=1;
					$userplan['isDeleted']=0;
					$userplan['status']=1;
					$userplan = (object) $userplan;
					
					if($Userspaln->save($userplan)){	
						$Uplanid=$userplan->user_plan_id;	
						
						$payments = TableRegistry::get('payments');
						$pay = $payments->newEntity();
						
						$pay['user_paln_id']=$Uplanid;
						$pay['txn_id']=$alldata['id'];
						$pay['payment_gross']=$alldata['amount'];							
						$pay['payer_email']=(isset($alldata['source']['name']) ? $alldata['source']['name'] : '');
						$pay['receiver_email']='';
						$pay['payment_date']=date('Y-m-d',$alldata['created']);
						$pay['currency_code']=$alldata['currency'];							
						$pay['payment_status']=$alldata['status'];							
						$pay['isDeleted']=0;							
						$pay = (object) $pay;						
						if($payments->save($pay)){
							$jsondata = TableRegistry::get('jsondata');
							$rpay = $jsondata->newEntity();
							$rpay->json_data=json_encode($event_json);						
							$jsondata->save($rpay);
							echo "success";					
						}						
					}						
				}
			}
		}	
	}
}
