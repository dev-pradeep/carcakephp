<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\Core\Configure;
use Cake\ORM\TableRegistry; 
/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
		Configure::write('sk_key', 'sk_test_kGZja2BNwvgZprSTbIs8RxAn');
		Configure::write('pk_key', 'pk_test_fWgdy4MKAEqo3x6iBjyghqXM');
        /*
         * Enable the following components for recommended CakePHP security settings.
         * see https://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        //$this->loadComponent('Security');
        //$this->loadComponent('Csrf');

        $this->loadComponent('Auth', [
            'authenticate' => [
                'Form' => [
                    'fields' => [
                        'username' => 'email',
                        'password' => 'password'
                    ]
                ]
            ],
            'loginAction' => [
                'controller' => 'Users',
                'action' => 'login'
            ],
			'loginRedirect' => array(
                'controller' => 'users',
                'action' => 'index'
            ),
            // If unauthorized, return them to page they were just on
            'unauthorizedRedirect' => $this->referer()
        ]);

        // Allow the display action so our PagesController
        // continues to work. Also enable the read only actions.
        $this->Auth->allow(['display', 'view', 'index']);
    }


	public function isAuthorized($user)
	{
		$this->Flash->error('You aren\'t allowed');
		return false;
	}
	
	public function beforeFilter(Event $event)
	{
		$this->Auth->allow(['index', 'view', 'display']);		
		$users=$this->Auth->user();		
		$this->set('current_user',$users);
		$this->set('logout',$users);		
		
	}
    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return void
     */
	 
    public function beforeRender(Event $event)
    {
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }
    }
}


?>