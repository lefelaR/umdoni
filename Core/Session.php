<?php
namespace Core;
class Session
{

    private $profile;
    private $role;
    private $sidebar;

    private $session;


    public function __construct() {
        $this->session = $_SESSION;
    }

    public function getProfile(): mixed
    {
        return $this->session['profile'];
    }

    public function getRole(): mixed
    {
        return $this->session['role'];
    }

    public function getSidebar(): mixed
    {
        return $this->session['sidebar'];
    }

}