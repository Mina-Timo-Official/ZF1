<?php

class AuthController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
        echo "mon";
    }
    // Auth/login
    public function loginAction()
    {
        // if user is oready login
        if(Zend_Auth::getInstance()->hasIdentity()){
            $this->redirect('Auth');
        }
        echo "login";
        $request = $this->getRequest();
        $form = new Form_LoginForm();
        // $this->view->form = new Form_LoginForm();
        if($request->isPost()){
            if($form->isValid($this->_request->getPost())){

                $authAdapter = $this->getAuthAdapter();
                // echo $authAdapter;
        
                $username = $form->getValue('username');
                $password = $form->getValue('password');
                echo $username;
                echo $password;
        
                $authAdapter->setIdentity($username)
                            ->setCredential($password);
        
                $auth = Zend_Auth::getInstance();
                $res = $auth->authenticate($authAdapter);
                echo $res;
        
                if($res->isValid()){
                    // echo "saa7 ";

                    $identity = $authAdapter->getResultRowObject();
                    echo $identity;
                    
                    $authStorage = $auth->getStorage();
                    $authStorage->write($identity);
                    // echo $res;
                    // echo "--";
                    // echo $authStorage;
                    // echo "True ";

                    $this->redirect('Auth');
                }else {
                    $this->view->errMsg = "User Name or password invaild";
                    echo "false";
                }
            }
        }
        $this->view->form = $form;
    }
    // Auth/logouty
    public function logoutAction(){
        Zend_Auth::getInstance()->clearIdentity();
        $this->redirect('index');
    }

    private function getAuthAdapter(){
        $authAdapter = new Zend_Auth_Adapter_DbTable(Zend_Db_Table::getDefaultAdapter());
        $authAdapter->setTableName('users')
                    ->setIdentityColumn('username')
                    ->setCredentialColumn('password');
                    // ->setCredentialTreatment(); // 3shan al hash ll pass

        return $authAdapter;

    }
}
