<?php

namespace Source\Models;


Class Login
{
    private $user;
    private $password;

    public function getUser(){
        return $this->user;
    }

    public function setUser($user){
        $this->user = ($user = filter_var($user, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH));
    }



    public function getPassword(){
        return $this -> password;
    }

    public function setPassword($password){
        $this -> password = $password;
    }
}

