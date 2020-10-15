<?php

class PaymentController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

    public function listAction(){
        // Model/DbTable/Payments
        $payments = new Model_DbTable_Payments(); 
        $this->view->albums = $payments->fetchAll();
        // $p = $payments->fetchAll();
        // var_dump($p[0]);

        // $view = new Zend_View();
        $this->view->str = "Timon";
        $arr = [ 'mina', "adc"];
        // var_dump($arr);
        $this->view->assign('str1', "timon");
        // $view->assign($arr);

    }


    public function insertAction($token_id, $card_id){
        // $token_Model = new Model_DbTable_Tokens();
        // $data = array(
        //     'token_id'=> $token_id,
        //     'card_id'=> $card_id
        // );

        // $success = $token_Model->insert($data);
        // echo $success;
        echo "hna";
    }
}
