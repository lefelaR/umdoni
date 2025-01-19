<?php
namespace Components;

class Context{

    public  $root = '';
    public  $host =  '';
    public  $siteroot = '';
    public  $dir = '';

    public $bIsLive = false;

    public $isLoggedIn = false;


    public function __construct(){
        
        
       
        if($_SERVER['SERVER_NAME'] != "localhost"){
            $this->bIsLive = true;
        }

      session_start(); 
        $this->root     = $_SERVER['HTTP_HOST'];
        $this->host     =  $this->bIsLive ? 'https://'.$this->root : 'http://'.$this->root; 
        $this->siteroot =  $this->bIsLive ? $this->host.'/' :   $this->host.'/umdoni/';
        $this->dir      =  $this->bIsLive ? $this->root .'/' : $this->root .'/umdoni/';
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
