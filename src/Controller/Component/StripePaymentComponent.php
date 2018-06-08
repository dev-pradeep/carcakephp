<?php
namespace App\Controller\Component;
use Cake\Controller\Component;
use Cake\ORM\TableRegistry; 

class StripePaymentComponent extends Component{
	/* public $subscriptions=TableRegistry::get('subscriptions');
	public $plan=TableRegistry::get('plan');
	public $refund_payment=TableRegistry::get('refund_payment');
	public $payments=TableRegistry::get('payments'); */
	function __construct() {		
		\Stripe\Stripe::setApiKey('sk_test_rk8I1nZqCK25EencVlMmggpo');        				
    }	
	public function stripeGetPlan(){
		$paln=\Stripe\Plan::all(array("limit" =>100));
		$alldata=json_decode(json_encode($paln),true)['data'];
		foreach($alldata as $pldata){			
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
			}else{
				$planEnt =$plan->newEntity();				
				$palnpath=$plan->patchEntity($planEnt,$pdata);				
				$Uplanid=$plan->save($palnpath);				
			}
		}
		if($Uplanid){
			return json_encode(['status'=>'success','message' =>"Users update success.",'data'=>''], 200);	
		}else{
			return json_encode(['status'=>'error','message' =>"Users update success.",'data'=>''], 200);
		}
	}
	public function createCustomer(){		
		try {
			$token = $_POST['stripeToken'];
			$amount = $_POST['amount'];
			if($token){
				$charge = \Stripe\Charge::create(array(
				  "amount" => $amount,
				  "currency" => "usd",
				  "description" => "Example charge",
				  "source" => $token,
				));				
				return json_encode(['status'=>'success','message' =>'your payment was successful!','data'=>$charge], 200);							
			}else{
				return json_encode(['status'=>'error','message' =>'Oops there is something error with your input','data'=>''], 200);								
			}		
		} catch(\Stripe\Error\Card $e) {
			return json_encode(['status'=>'error','message' =>'Card declined','data'=>''], 200);			
		} catch (\Stripe\Error\InvalidRequest $e) {
			return json_encode(['status'=>'error','message' =>"Invalid parameters were supplied to Stripe's API",'data'=>''], 200);
		} catch (\Stripe\Error\Authentication $e) {			
			return json_encode(['status'=>'error','message' =>"Authentication with Stripe's API failed",'data'=>''], 200);
		} catch (\Stripe\Error\ApiConnection $e) {
			return json_encode(['status'=>'error','message' =>'Network communication with Stripe failed','data'=>''], 200);
		} catch (\Stripe\Error\Base $e) {
			return json_encode(['status'=>'error','message' =>'Display a very generic error to the user','data'=>''], 200);
		} catch (Exception $e) {			
			return json_encode(['status'=>'error','message' =>'Something else happened, completely unrelated to Stripe','data'=>''], 200);
		}
	}
}
?>