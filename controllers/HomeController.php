<?php

require_once 'models/usuarios.php';

class homeController{

    public function index(){

        require_once 'views/layout/conteiner.php';
    }

    public function registro(){
        
        require_once 'views/formulario/registro.php';
    }

    public function politicaDePrivacidad(){

        require_once 'views/politicas/politicas_priv.php';
    }

    public function avisoLegal(){

        require_once 'views/politicas/aviso_legal.php';
    }

    public function save(){
        ob_start();

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
            $name = $_POST['name'] ? $_POST['name'] : 'false';
            $surname = $_POST['surname'] ? $_POST['surname'] : 'false';
            $email = $_POST['email'] ? $_POST['email'] : 'false';
            $empresa = $_POST['empresa'] ? $_POST['empresa'] : 'false';
            $message = $_POST['message'] ? $_POST['message'] : 'false';
            
            $errores = array();
    
            // Validate name
            if (!empty($name) && !is_numeric($name) && !preg_match("/[0-9]/", $name)) {
                $name_valid = true;
            } else {
                $name_valid = false;
                $errores['name'] = "El Nombre es incorrecto";
            }
    
            // Validate surname
            if (!empty($surname) && !is_numeric($surname) && !preg_match("/[0-9]/", $surname)) {
                $surname_valid = true;
            } else {
                $surname_valid = false;
                $errores['surname'] = "El apellido es incorrecto";
            }
    
            // Validate email
            if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $email_valid = true;
            } else {
                $email_valid = false;
                $errores['email'] = "El email es incorrecto";
            }
    
            // Validate empresa
            if (!empty($empresa)) {
                $empresa_valid = true;
            } else {
                $empresa_valid = false;
                $errores['empresa'] = "Debe colocar el nombre de su empresa";
            }

            // Validate message
            if (!empty($message)) {
                $message_valid = true;
            } else {
                $message_valid = false;
                $errores['message'] = "Debe colocar algun mensaje";
            }
            
            if (count($errores) == 0) {
                
                $usuario = new Usuarios();
                $usuario->setName($name);
                $usuario->setSurname($surname);
                $usuario->setEmail($email);
                $usuario->setEmpresa($empresa);
                $usuario->setMessage($message);
    
                $save = $usuario->save();                
    
                if ($save) {
                    $_SESSION['register'] = "Complete";
                
                } else {
                    $_SESSION['register'] = "Failed";
                }
            }else {
                $_SESSION['register'] = "Failed";
            }           

        }
        // Clean output buffer and send headers
        ob_end_clean();
        header("Location: " . BASE_URL . "home/registro");
        exit();
    }
    
}