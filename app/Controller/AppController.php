<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

  	public  function csv($fileName) {
    	require_once('../Model/csv.lib.php');
    	$csv = new parseCSV();
    	$csv->auto('../Csv/'.$fileName.'.csv');
    	return $csv;
  	}

 	public $components = array(
        'Session',
        'Auth'
       
    );
	
    public function beforeFilter() {
        $this->Auth->allow('index', 'view');
        $this->set('logged_in', $this->_loggedIn());
        $this->set('users_username', $this->_usersUsername());
    }


    function _loggedIn() {
    	$logged_in = FALSE;
    	if($this->Auth->user()){
    		$logged_in = TRUE;
    	}
    	return $logged_in;
    }

    // lay gia tri user hien tai
    function _usersUsername() {
    	$users_username = NULL;
    	if($this->Auth->user()) {
    		$users_username = $this->Auth->user('username');
    	}
    	return $users_username;
    }
    
}
