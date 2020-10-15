<?php

class Form_LoginForm extends Zend_Form
{ // create form login aro7 anadi 3leha fe action
    public function __construct($option = null){
     parent::__construct($option);
    // public function __init(){
     $this->setName('login');

     $username = new Zend_Form_Element_Text('username');
     $username->setLabel('username: 7mada')->setRequired();

     
     $password = new Zend_Form_Element_Password('password');
     $password->setLabel('password: mohsen')->setRequired(true);

     $login = new Zend_Form_Element_Submit('login');
     $login->setLabel('Login');


     $this->addElements(array($username, $password, $login));
     $this->setMethod('post');
     $this->setAction(Zend_Controller_Front::getInstance()->getBaseUrl(). '/Auth/login');

    }
}