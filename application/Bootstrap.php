<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    protected function _initAutoload(){
        $modelLoader = new Zend_Application_Module_Autoloader(array(
                    'namespace' => '',
                    'basePath' => APPLICATION_PATH
        ));
        return $modelLoader;
    }

    protected function __initRoutes(){
        $router = Zend_Controller_Front::getInstance()->getRouter();

        $router->addRoute('inserttoken',
         new Zend_Controller_Router_Route('inserttoken', array( 
                                                    'controller' => 'payment',
                                                    'action' => 'insert')));
    }
}