<?php

require_once 'Zend/Controller/Action.php';
require_once 'Zend/Auth.php';
require_once 'Zend/Auth/Adapter/DbTable.php';
class IndexController extends Zend_Controller_Action
{
    public function indexAction()
    {
        $request = $this->getRequest();
        $auth		= Zend_Auth::getInstance();
        if($auth->hasIdentity()){
            $this->_redirect('/upload');
        }
    }


    public function saveAction()
    {
        $name = $this->_getParam('username');
        $email = $this->_getParam('email');
        $pass = md5($this->_getParam('password'));
        $modelRegistration = new Registration();

        $modelRegistration->setUser($name,$email,$pass);
        return json_encode('true');
    }

    public function authAction(){
        $request 	= $this->getRequest();
        $registry 	= Zend_Registry::getInstance();
        $auth		= Zend_Auth::getInstance();
        $DB = $registry['db'];

        $authAdapter = new Zend_Auth_Adapter_DbTable($DB);
        $authAdapter->setTableName('users')
            ->setIdentityColumn('username')
            ->setCredentialColumn('password');

        // Set the input credential values
        $uname = $request->getParam('username');
        $paswd = $request->getParam('password');
        $authAdapter->setIdentity($uname);
        $authAdapter->setCredential(md5($paswd));

        // Perform the authentication query, saving the result
        $result = $auth->authenticate($authAdapter);

        if($result->isValid()){
            //print_r($result);
            $data = $authAdapter->getResultRowObject(null,'password');
            $auth->getStorage()->write($data);
            return json_encode(true);
        }else{
            return json_encode(false);
        }

    }
}

