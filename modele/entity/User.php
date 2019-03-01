<?php

class User
{
    private $id ;
    private $email ;
    private $username ;
    private $password ;
    private $date_inscription ;
    private $etat ;

    public function __construct($email,$username,$password,$date_inscription, $etat=1 , $id=0)
    {
        $this->id = $id;
        $this->email = $email;
        $this->username = $username;
        $this->password = $password ;
        $this->date_inscription = $date_inscription ;
        $this->etat = $etat ;
    }


    public function getId()
    {
        return $this->id;
    }


    public function setId($id)
    {
        $this->id = $id;
    }


    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getUsername()
    {
        return $this->username;
    }

   
    public function setUsername($username)
    {
        $this->username = $username;
    }


    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }


    public function getDate_inscription()
    {
        return $this->date_inscription;
    }

 
    public function setDate_inscription($type)
    {
        $this->type = $date_inscription;
    }

    public function getEtat()
    {
        return $this->etat;
    }

   
    public function setEtat($etat)
    {
        $this->etat = $etat;
    }


}