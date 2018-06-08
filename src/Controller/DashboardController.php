<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry; 

use Multidimensional\TuroScrape\TuroScrape;
use Multidimensional\TuroScrape\Receipt;
use Multidimensional\TuroScrape\Dashboard;
use Multidimensional\TuroScrape\Users;
use Multidimensional\TuroScrape\Reservation;

class DashboardController extends AppController{	
	
	public function index(){       
		return $this->render('dashboard');		
		
		$Receipt=new Receipt();
		$Dashboard=new Dashboard();
		$user = new Users();
		$Reservation = new Reservation();
		
		
		$turo = new TuroScrape([
		   'email' => 'ajpmakk@gmail.com',
		   'password' => 'm@kk@123'
		]);

		$turo->setEmail('ajpmakk@gmail.com');
		$turo->setPassword('m@kk@123');

		
		$turo->login();
		$turo->checkLogin();
		
		$data = $user->getUserProfile(4047480);
		//$Reservations = $Reservation->getReservation(2622508);
		echo "<pre>";
		print_r($data);
		exit;
		
    }
}


?>