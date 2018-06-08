<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry; 

class UsersController extends AppController{
	
	public function initialize()
    {
        parent::initialize();
		$this->loadComponent('Flash'); // Include the FlashComponent		
		$this->Auth->allow(['login', 'logout', 'signup']);

    }
	
	public function login()
	{
		$this->viewBuilder()->layout('login');
		if ($this->request->is('post')) {
			// Auth component identify if sent user data belongs to a user
			$user = $this->Auth->identify();			
			if ($user) {								
				$this->Auth->setUser($user);
				if($user['user_type']==1):
					return $this->redirect('/dashboard');
				else:
					return $this->redirect('/dashboard');
				endif;
			}
			$this->Flash->error(__('Invalid username or password, try again.'));
		}
	}
	
	public function logout(){
		$this->Flash->success('You successfully have loged out');	
		return	$this->redirect($this->Auth->logout());
	}
	public function index()
	{		
		if($this->Auth->user()){			
			$users = $this->paginate($this->Users);
			//$this->set(compact('users'));
			$this->set('users',$this->Users->find('all'));		
		}else{
			return $this->redirect(['action' => 'login']);
		}
	}
	public function view($id)
	{
		$user = $this->Users->get($id);
		$this->set('user',$user);
		
	}
	public function signup()
	{
		$this->viewBuilder()->layout('login');
		$user = $this->Users->newEntity();		
		if ($this->request->is('ajax') && $this->request->is('post')) {            																				
			$user = $this->Users->newEntity($this->request->getData());											
			if (!$user->errors()) {				
				//$userdata=json_decode(json_encode($user));				
				$userdata=$this->request->getData();				
				echo json_encode(['status'=>'success','message' =>'success','data'=>$userdata]);
				exit;
			}else{
				$error_msg = [];
                foreach( $user->errors() as $errors){
                    if(is_array($errors)){
                        foreach($errors as $error){
                            $error_msg[]=   $error;
                        }
                    }else{
                        $error_msg[]=   $errors;
                    }
                }
				$message=implode('</br>',$error_msg);
				echo json_encode(['status'=>'error','message' =>$message,'data'=>'']);
				exit;
			}            
        }else{
			$plan=TableRegistry::get('plan')->find()->order(array('plan_id'=>'DESC'))->toArray();			 			 			 
			$this->set('plan',$plan);
			$this->set('user',$user);
		}		
	}
	public function signup_load()
	{
		$this->viewBuilder()->layout('login');
		$user = $this->Users->newEntity();
		if($this->request->is('post')) {
			$this->Users->patchEntity($user,$this->request->data);
			if($this->Users->save($user)){
            $this->Flash->success(__('Your account has been registered .'));
            return $this->redirect(['action' => 'login']);
			}
			$this->Flash->error(__('Unable to register your account.'));
		}
		$this->set('user',$user);
	}
	public function edit($id)
	{
		$user = $this->Users->get($id);
		if ($this->request->is(['post', 'put'])) {			
			$this->Users->patchEntity($user, $this->request->data);
			if ($this->Users->save($user)) {
				$this->Flash->success(__('Your profile data has been updated.'));
				return $this->redirect(['action' => 'index']);
			}
			$this->Flash->error(__('Unable to update your profile.'));
		}
	
		$this->set('user', $user);	
		
	}
	public function delete($id)
	{
		$this->request->allowMethod(['post', 'delete']);
		$user = $this->Users->get($id);
		if ($this->Users->delete($user)) {
			$this->Flash->success(__('The user with id: {0} has been deleted.', h($id)));
			return $this->redirect(['action' => 'index']);
		}		
		
	}
	public function profile(){
		$users=$this->Auth->user();		
		$id=$users['id'];
		$user = $this->Users->get($id);						
		if ($this->request->is(['post', 'put'])) {			
			$this->Users->patchEntity($user, $this->request->data);
			if ($this->Users->save($user)) {
				$this->Flash->success(__('Your profile data has been updated.'));
				return $this->redirect(['action' => 'profile']);
			}else{
				$error_msg = [];
                foreach( $user->errors() as $errors){
                    if(is_array($errors)){
                        foreach($errors as $error){
                            $error_msg[]=   $error;
                        }
                    }else{
                        $error_msg[]=   $errors;
                    }
                }
				$message=implode('</br>',$error_msg);				
				$this->Flash->error(__($message));
			}
			//$this->Flash->error(__('Unable to update your profile.'));
		}
		$this->set('user',$user);		
	}
}


?>