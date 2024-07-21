<?php
namespace Components;

class Context{

    public  $root = '';
    public  $host =  '';
    public  $siteroot = '';
    public  $dir = '';
    public $isLoggedIn = false;


    public function __construct(){
      session_start(); 
        $this->root     = $_SERVER['HTTP_HOST'];
        $this->host     = 'https://'.$this->root;
        $this->siteroot = $this->host.'/';
        $this->dir      = $this->root .'/';
        $this->checkAuth();
        return;
    }


    public function setLoggedIn($isLoggedIn)
    {
        return $this->isLoggedIn = $isLoggedIn;
    }


   public function checkAuth()
    {
        if(isset($_SESSION['profile']) && !empty($_SESSION['profile']))
        {
            $this->setLoggedIn(true);
        }
        else{
            $this->setLoggedIn(false);
        }
    }


}
