<?php

require_once 'config/db.php';

class Usuarios{

    private $id;
    private $name;
    private $surname;
    private $email;
    private $empresa;
    private $message;
    private $created_at;
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }
    
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $this->db->real_escape_string($name);

        return $this;
    }

    public function getSurname()
    {
        return $this->surname;
    }

    public function setSurname($surname)
    {
        $this->surname = $this->db->real_escape_string($surname);

        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $this->db->real_escape_string(trim($email));

        return $this;
    }

    public function getEmpresa()
    {
        return $this->empresa;
    }

    public function setEmpresa($empresa)
    {
        $this->empresa = $this->db->real_escape_string($empresa);

        return $this;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    public function getCreated_at()
    {
        return $this->created_at;
    }

    public function setCreated_at($created_at)
    {
        $this->created_at = $created_at;

        return $this;
    }

    function save(){

        $sql = "INSERT INTO usuarios VALUES (NULL,'{$this->getName()}','{$this->getSurname()}','{$this->getEmail()}','{$this->getEmpresa()}','{$this->getMessage()}',CURDATE())";
        $save = $this->db->query($sql);

        /*
        var_dump($sql);
        var_dump($save);
        die();
        */
        $result = false;

        if($save){
            $result = true;
        }

        return $result;
    }
}