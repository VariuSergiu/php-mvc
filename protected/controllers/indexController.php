<?php

class IndexController extends AppController
{

    
    public function  index()
    {

        //set a template var
        $this->registry->template->welcome = 'Welcome to My MVC Application';

        //load the index template
        $this->registry->template->show('index');
    }
    
    public function create()
    {
        include 'protected/models/Index.php';
        //set a template var
        $this->registry->template->var = Index::getVar(2);

        $this->registry->template->show('create');
        
    }


}


?>