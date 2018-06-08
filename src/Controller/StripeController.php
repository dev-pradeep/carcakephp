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
class StripeController extends AppController
{
	public function initialize()
    {
        parent::initialize();
		$this->Auth->allow(['payment','listCustomers']);
		//$this->loadComponent('StripePayment');
		$this->loadComponent('Stripe');
    }
    public function stripePlan(){		
		if($this->Stripe->listPlans()){
			$response=$this->Stripe->listPlans()['response']['data'];
			foreach($response as $pldata){			
				if($pldata['interval']=='year'){
					$planday=365;
				}else if($pldata['interval']=='month'){
					$planday=$pldata['interval_count'] * 30;
				}else{
					$planday=0;
				}
				
				$pdata['plan_name']=$pldata['name'];
				$pdata['plan_stripe_id']=$pldata['id'];
				$pdata['amount']=$pldata['amount'] / 100;						
				$pdata['paln_day']=$planday;									
				
				$plan=TableRegistry::get('plan');										
				$lplan=$plan->find()->where(['plan_stripe_id' => $pldata['id']])->order(array('plan_id'=>'DESC'))->toArray();							
				if($lplan){							
					 $query= $plan->query();
					 $Uplanid=$query->update()->set($pdata)->where(['plan_stripe_id' => $pldata['id']])->execute();
					 $Uplanid=true;
				}else{
					$planEnt =$plan->newEntity();				
					$palnpath=$plan->patchEntity($planEnt,$pdata);				
					$plan->save($palnpath);				
					$Uplanid=true;
				}
			}
			if($Uplanid){
				echo json_encode(['status'=>'success','message' =>"plan update success.",'data'=>''], 200);
				exit;	
			}else{
				echo  json_encode(['status'=>'error','message' =>"unable to update plan.",'data'=>''], 200);				
			}
		}else{
			echo  json_encode(['status'=>'error','message' =>"unable to update plan.",'data'=>''], 200);			
		}
		
	}
	public function payment(){		
		if ($this->request->is(['post'])) {						
			
			$udata=$this->request->data();
			$user_object=json_decode($udata['userData']);
			$userdata = json_decode(json_encode($user_object), true);				
			
			//Customer create
			$cdata['email']=$userdata['email'];			
			$customer=$this->Stripe->createCustomer($cdata)['response']; // Api calling

			$users = TableRegistry::get('users');
			$nuser = $users->newEntity();
			$nuser->name = $userdata['name'];
			$nuser->email =$userdata['email'];
			$nuser->password = $userdata['password'];			
			$nuser->stripe_id=$customer['id'];			
			if ($users->save($nuser)) {				
				$user_id = $nuser->id; 
				
				//Subscribe				
				$customerid=$customer['id'];				
				$palnid['plan']=$udata['user_plan'];		
				
				$sstomer=$this->Stripe->createSubscription($customerid,$palnid)['response']; // Api calling
			
				$subscriptions= TableRegistry::get('subscriptions');
				$sdata= $subscriptions->newEntity();				
				
				$sdata['user_id']=$user_id;
				$sdata['name']=$sstomer['plan']['name'];
				$sdata['stripe_id']=$sstomer['id'];
				$sdata['stripe_plan']=$sstomer['plan']['name'];
				$sdata['quantity']=1;				
				$sdata['created_at']=date('Y-m-d H:i:s',$sstomer['created']);
				$sdata['updated_at']= date('Y-m-d H:i:s',$sstomer['created']);
				$sdata = (object) $sdata;
				
				$subscriptions->save($sdata);
				$subscripationid = $sdata->id;
				
				//UserPaln
				$users_paln= TableRegistry::get('users_paln');
				$pdata= $users_paln->newEntity();				
				
				$pdata['up_name']=$sstomer['plan']['name'];
				$pdata['up_start_date']=date('Y-m-d',$sstomer['current_period_start']);
				$pdata['up_end_date']=date('Y-m-d',$sstomer['current_period_end']);		
				$pdata['active_plan']=$udata['plan_id'];				
				$pdata['user_id']=$user_id;				
				$pdata['up_pay']=0;									
				$pdata['isDeleted']=0;					
				$pdata['status']=1;				
				$pdata['created_at']=date('Y-m-d H:i:s',$sstomer['created']);
				$pdata['updated_at']= date('Y-m-d H:i:s',$sstomer['created']);				
				$pdata = (object) $pdata;
				
				$users_paln->save($pdata);
				$pdataid = $pdata->id;				
				
				$user = $this->Auth->identify();									
				$this->Auth->setUser($user);
				
				$this->Flash->success(__('your payment was successful!'));				
				return $this->redirect('/users/login');
			 } 
		}else{
			 $plan=TableRegistry::get('plan')->find()->order(array('plan_id'=>'DESC'))->toArray();			 			 			 
			 $this->set('plan',$plan);
			 $this->render('/Stripe/stripe');			 
		}
	}
	public function listCustomers(){
		$response=$this->Stripe->listCustomers()['response']['data'];		
		foreach($response as $pldata){			
			$emailid=$pldata['email'];
			$cid=$pldata['id'];			
			if($emailid=='m@kk.com'){
				$response=$this->Stripe->deleteCustomer($cid)['response'];				
			}
		}		
	}
}
