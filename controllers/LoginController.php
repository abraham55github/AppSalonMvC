<?php

namespace Controllers;
use Classes\Email;
use Model\Usuario;
use MVC\Router;

class loginController{

    public static function login(Router $router){
        $router->render('auth/login');
    }

    public static function logout(){
        echo "desde logout";
    }

    public static function olvide(Router $router){
        $router->render('auth/olvide-password',[

        ]);
    }

    public static function recuperar(){
        echo "desde recuperar";
    }

    public static function crear(Router $router){

        $usuario = new Usuario($_POST);

        //alertas vacias
        $alertas = [];
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $usuario->sincronizar($_POST);
            $alertas = $usuario->validarNuevaCuenta();

            //revisar que alerta este vacio
            if(empty($alertas)){
                //verificar que el usuario no este verificado
                $resultado = $usuario->existeUsuario();

                if($resultado->num_rows){
                    $alertas = Usuario::getAlertas();
                }else{
                    //hashear password
                    $usuario->HashPassword();

                    //generar un token unico
                    $usuario->crearToken();

                    //Enviar el email
                    $email = new Email($usuario->nombre, $usuario->email, $usuario->token); 

                    $email->enviarconfirmacion();

                    //crear usuario
                    $resultado = $usuario->guardar();

                    

                    if($resultado){
                        header('Location: /mensaje');
                    }


                    //no esta registrado
                    

                  
                }
            }
        }
        $router->render('auth/crear-cuenta', [
            'usuario' => $usuario,
            'alertas'=> $alertas
        ]);
    }

    public static function mensaje(Router $router){
        $router->render('auth/mensaje');
    }

    public static function confirmar(Router $router){
        $alertas = [];
        $token = s($_GET['token'])

        $router->render('auth/confirmar-cuenta', [
            'alertas'=> $alertas
        ]);
    }
}
