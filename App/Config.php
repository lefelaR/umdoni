<?php
namespace App;
/**
 * Application configuration
 *
 * PHP version 5.4
 */


class Config
{
    public $bIsLive = false;

    public function __construct()
    {
        if($_SERVER['SERVER_NAME'] != "localhost"){
            $this->bIsLive = true;
        }
    }

    /**
     * Database host
     * @var string
     */
    // const DB_HOST = 'reseller142.aserv.co.za';
    const DB_HOST = $this->bIsLive ? 'reseller142.aserv.co.za' : 'localhost';
    /**
     * Database namegit 
     * @var string
     */
    const DB_NAME = 'umdonigov_umdoni';

    /**
     * Database user
     * @var string
     */
    const DB_USER =  $this->bIsLive ? 'umdonigov_admin' : 'root';
   
    /**
     * Database password
     * @var string
     */
    const DB_PASSWORD = $this->bIsLive ? '29019WtP98zj23' : '';
   

    /**
     * Show or hide error messages on screen
     * @var boolean
     */
    const SHOW_ERRORS = $this->bIsLive ? false : true;


    /**
     * version
     */
    const VERSION = '1';
}
