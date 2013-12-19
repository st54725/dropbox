<?php

require_once 'Zend/Controller/Action.php';
require_once 'Zend/Auth.php';
require_once 'Zend/Auth/Adapter/DbTable.php';
class IndexController extends Zend_Controller_Action
{
    public function indexAction()
    {
        $this->view->content = '<h1>Welcome to VVIkipedia!</h1>';
    }


    public function saveAction()
    {
        $name = $this->_getParam('username');
        $email = $this->_getParam('email');
        $pass = md5($this->_getParam('password'));
        $modelRegistration = new Registration();

        $modelRegistration->setUser($name,$email,$pass);
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
            $this->_redirect('/molodec');
        }else{
            $this->_redirect('/lohjebanij');
        }

    }

    public function processAction()
    {

        $registry = Zend_Registry::getInstance();
        $DB = $registry['DB'];

        $request = $this->getRequest();
        $data = array('first_name' => $request->getParam('first_name'),
                      'last_name' => $request->getParam('last_name'),
                      'user_name' => $request->getParam('user_name'),
                      'password' => md5($request->getParam('password'))
        );
        $DB->insert('user', $data);

        $this->view->assign('title','Registration Process');
        $this->view->assign('description','Registration succes');

    }

    public function delAction()
    {
        $registry = Zend_Registry::getInstance();
        $DB = $registry['DB'];

        $request = $this->getRequest();

        $DB->delete('user', 'id = '.$request->getParam('id'));

        $this->view->assign('title','Delete Data');
        $this->view->assign('description','Deleting succes');
        $this->view->assign('list',$request->getBaseURL()."/user/list");

    }
}

