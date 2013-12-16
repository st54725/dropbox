<?php


class DownloadController extends Zend_Controller_Action
{
    /**
     * Список статей
     */
    public function indexAction() 
    {
        $modelDownload = new Download();
        echo $modelDownload->vivod();

    }
    public function uploadAction()
    {
        $filename = $this->_getParam('filename');
        $size = $this->_getParam('size');
        $modelDownload = new Download();
        $modelDownload->setDownload($filename,$size);
    }

    /**
     * Выбранная статья
     */    
    public function viewAction() 
    {
        // Получение параметра пришедшего от пользователя
        $articleId = $this->_getParam('articleId');

        // Создание объекта модели, благодаря autoload нам нет необходимости подключать класс через require
        $modelArticles = new Articles();

        // Выполнения метода модели по получению информации о статье
        $article = $modelArticles->getArticles($articleId);
        
        // Определение переменных для вида
        $this->view->article = $article;
    }
}
