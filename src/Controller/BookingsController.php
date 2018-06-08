<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry; 

class BookingsController extends AppController{
	
	public function initialize()
    {
        parent::initialize();
		$this->loadComponent('Flash'); // Include the FlashComponent		
		$this->Auth->allow(['login', 'logout', 'signup']);

    }
	public function index(){       
        return $this->render('index');
    }
}


?>