<?php

/**
 * Файл формирования маршрутов. Происходит инициализация объекта маршрутизации и задание правил маршрутизации
 *
 */

$router = new Zend_Controller_Router_Rewrite();

$router->addRoute('articles',
     new Zend_Controller_Router_Route('articles/:articleId', array('controller' => 'articles', 'action' => 'view'))
);

$router->addRoute('pages',
     new Zend_Controller_Router_Route('pages/:pageId', array('controller' => 'index', 'action' => 'page'))
);

