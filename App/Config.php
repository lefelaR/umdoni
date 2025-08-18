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
    const DB_HOST = 'localhost';
    /**
     * Database namegit 
     * @var string
     */
    const DB_NAME = 'umdonigov_umdoni';

    /**
     * Database user
     * @var string
     */
    const DB_USER =  'root';
   
    /**
     * Database password
     * @var string
     */
    const DB_PASSWORD = '';
   

    /**
     * Show or hide error messages on screen
     * @var boolean
     */
    const SHOW_ERRORS = false;


    /**
     * version
     */
    const VERSION = '1';
}
