<?php 
namespace App\View\Helper;

use Cake\View\Helper;
use Cake\View\View;
use Cake\ORM\TableRegistry; 

class UserplanHelper extends Helper
{

   
	public function getPlan($id){
		$users_paln=TableRegistry::get('users_paln');												
		$lplan=$users_paln->find()->where(['user_id' => $id])->where(['isDeleted' => 0])->where(['status' =>1])->toArray()[0];			
		$totalplan=$users_paln->find()->where(['user_id' => $id])->toArray();			
		$date1=date('Y-m-d');
		$date2=$lplan['up_end_date'];		
		$diff = abs(strtotime($date2) - strtotime($date1));			
		$days=floor($diff/3600/24);		
		
		$uppay=$lplan['up_pay'];
		$upname=trim(strtolower($lplan['up_name']));
		
		if(count($totalplan)==1 && $days <= 30){
			return true;			
		}else if($uppay==1 && $upname=='Premium' ){
			return true;			
		}else{
			return false;			
		}		
	}
}
?>