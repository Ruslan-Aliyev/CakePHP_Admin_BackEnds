<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		https://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	public $components = array( 
		//Enable DebugKit toolbar (when debug is set to >= 1) 
		'DebugKit.Toolbar' => array( 'panels' => array('ClearCache.ClearCache') ),
		'Session',
	);

	public function beforeFilter()
	{
		$params = $this->request->params;

		if($this->request->plugin == "administration")
		{
			return;
		}

		if ( isset($params['prefix']) && ($params['prefix'] == "admin") ) 
		{// If user try to access admin backend
			// if ( !($this->Session->check('Administrator.id') && $this->Session->check('Administrator.current')) ) 
			// { // and if current user isnt admin, redirect to home 
			// 	return $this->redirect('/');
			// }

			//if( ($this->Session->check('Administrator.id') && $this->Session->check('Administrator.current')) ) 
			//{ // and if current user is admin
				return $this->redirect( Router::url( array( // redirect to admin plugin
					'plugin'     => 'administration',
					'controller' => 'administrations',
					'action'     => 'index',
					'admin'      => true,
				), true));
			//}

			// For this check-if-is-admin, you also need to develop a module for users, then you can login as admin.

			// Start by importing `administrators.sql` into `cakephp2` DB, then cake-bake MVC files from there.

			// Better still, if current user isnt admin, you can redirect to admin/administration/administrations/login (not /index) . And then if user still dont login as admin, then redirect them to home.
		}
	}
}
