<?php

/**
 * IndexController
 *
 * Главный контроллер сайта
 *
 * @author Александр Махомет aka San для http://zendframework.ru
 */
class RegistrationController extends Zend_Controller_Action
{

    /**
     * Отображает главную страницу
     */
    public function indexAction()
    {
        //$this->view->content = '<h1>I LOVE ZEND FRAMEWORK!</h1>';
    }

    /**
     * Страница из меню
     */
    public function saveAction()
    {
        // Получение параметра пришедшего от пользователя
        $name = $this->_getParam('name');
        $realname = $this->_getParam('realname');
        $email = $this->_getParam('email');
        $pass = $this->_getParam('pass');
        // Создание объекта модели, благодаря autoload нам нет необходимости подключать класс через require
        $modelRegistration = new Registration();

        // Выполнения метода модели по получению информации о статье
        $modelRegistration->setUser($realname,$email,$pass,$name);

        //var_dump($articleId);die;
        //return $articleId;
        //$this->view->content = $articleId;
    }

}