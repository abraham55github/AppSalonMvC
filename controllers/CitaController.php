<?php 

namespace Controllers;
use Model\AdminCita;
use MVC\Router;

class CitaController{
    public static function index(Router $router){
        if(!isset($_SESSION)) {
            session_start();
        }

        isAuth();

        $router->render("cita/index", [
            'nombre'=> $_SESSION['nombre'],
            'id'=> $_SESSION['id']
        ]);
    }

    public static function citas(Router $router){
        if(!isset($_SESSION)) {
            session_start();
        }

        $usuarioId = $_SESSION['id'];

        // Consultar la base de datos
        $consulta = "SELECT citas.id, citas.hora, citas.fecha, CONCAT( usuarios.nombre, ' ', usuarios.apellido) as cliente, ";
        $consulta .= " usuarios.email, usuarios.telefono, servicios.nombre as servicio, servicios.precio  ";
        $consulta .= " FROM citas  ";
        $consulta .= " LEFT OUTER JOIN usuarios ";
        $consulta .= " ON citas.usuarioId=usuarios.id  ";
        $consulta .= " LEFT OUTER JOIN citasServicios ";
        $consulta .= " ON citasServicios.citaId=citas.id ";
        $consulta .= " LEFT OUTER JOIN servicios ";
        $consulta .= " ON servicios.id=citasServicios.servicioId ";
        $consulta .= " WHERE citas.usuarioId = '{$usuarioId}' ";

        $citas = AdminCita::SQL(($consulta));


        $router->render("cita/citas", [
            'nombre'=> $_SESSION['nombre'],
            'citas' => $citas
   
        ]);
    }
    
}