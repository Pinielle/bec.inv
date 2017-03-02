<?php
/**
 * Created by PhpStorm.
 * User: ihor
 * Date: 09.02.17
 * Time: 17:27
 */

    class User {

        protected $permission = array(

            'user_controller' => array('view_action')
        );

        function login($login){

        }

        function checkPermission($permission){
            if (isset($permission['SU'])){
                return true;
            }
            return false;
        }

        function logOut(){

        }
    }
    class Admin extends User {

        /*protected $permission = array(

            'user_controller' => array('view_action','create_action','change_action','delete_action','print_action')
        );*/
        public function __construct()
        {
            $this->permission['user_controller']=array_merge($this->permission['user_controller'],
                array('create_action','change_action','delete_action','print_action'));
        }

    }

    $user = new User();
    $admin = new Admin();
    var_dump($user,$admin);
