<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry; 

class RecentMessageController extends AppController{
	
	public function initialize()
    {
        parent::initialize();
		$this->loadComponent('Flash'); // Include the FlashComponent		
		$this->Auth->allow(['login', 'logout', 'signup']);

    }
	public function index(){
       /*  $this->paginate = [
            'contain' => ['Users', 'Vehicles', 'Drivers']
        ];
        $reservations = $this->paginate($this->Reservations); */
        return $this->render('index');
    }
}


?>