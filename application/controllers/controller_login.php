<?php
/**
 * Created by PhpStorm.
 * User: ihor
 * Date: 13.02.17
 * Time: 12:27
 */
class Controller_Login extends Controller
{
    public function indexAction()
    {
        $viewModel = Runner::getInstance('View');
        if(Runner::isPost()) {
            $postData = Runner::getPost();
        }

        if(isset($postData['register'])) {
            echo 1;
        }

        $viewModel->renderTemplate('header');
        if(Runner::getInstance('Session')->getLoggedIn())
        {
            $viewModel->renderTemplate('inventory');
        } else {
            $viewModel->renderTemplate('login');
        }
        $viewModel->renderTemplate('footer');
    }

    public function postAction()
    {
        $this->loginAction($this->getPostData('uname'), $this->getPostData('psw'));

    }

    public function loginAction($userName, $password)
    {
        if (!$userName or !$password) {
            Runner::coreException('Invalid user name or password');
        }

        /** TODO: in this case we need database connection for checkin is customer registered and active */
        /** TODO: after that we set it as logged in; */
        $customerId = 1;
        $this->setUserLoggedIn($customerId);

    }

    private function setUserLoggedIn($customerId)
    {
        Runner::getInstance('Session')->startNewUserSession($customerId);
    }

    public function registerAction()
    {
        $viewModel = Runner::getInstance('View');
        $viewModel->renderTemplate('header');
        if(Runner::getInstance('Session')->getLoggedIn())
        {
            $viewModel->renderTemplate('inventory');
        } else {
            $viewModel->renderTemplate('register');
        }
        $viewModel->renderTemplate('footer');
    }

    public function registerPostAction()
    {
        // $connectorInstance = Runner::getInstance('Connector');
        $errors = array();


       if(Runner::isPost()) {
           $postData  = Runner::getPost();
           $email     = $postData['email'];
           $firstName = $postData['firstname'];
           $lastName  = $postData['lastname'];
           $password  = $postData['password'];

           if(!$email) {
               $errors[] = 'Email is a required field';
           }
            if(!$password) {
                $errors[] = 'Password is a required field';
            }

            if ($errors) {
                $this->errorAction($errors, 'register');
            }
       }
    }

    public function errorAction($errors = '', $template = '', $type = 'alert')
    {
        Runner::errorPage($errors, $template, $type);
    }

}