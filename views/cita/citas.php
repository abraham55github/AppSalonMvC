<h1 class="nombre-pagina">Tus citas registradas</h1>

<?php
    include_once __DIR__ .'/../template/barra.php';
?>

<div class="citas-admin">
    <ul class="citas">
        <?php
            $idCita = 0;
            foreach( $citas as $key => $cita){
                $fechaObj = new DateTime($cita->fecha);
                $nombreMes = [
                    'enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio',
                    'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre'
                ];
                $fechaFormateada = $fechaObj->format('d, \d\e ') . $nombreMes[$fechaObj->format('n') - 1] . $fechaObj->format(' \d\e Y');
                
                if($idCita !== $cita->id){
                    $total = 0;
                    
        ?>
        <li>
            <p>Fecha: <span><?php echo $fechaFormateada; ?></span></p>
            <p>Hora: <span><?php echo $cita->hora; ?></span></p>

            <h3>Servicios</h3>
            <?php 
                $idCita = $cita->id;
            } // Fin de IF 
                $total += $cita->precio;
            ?>
                <p class="servicio"><?php echo $cita->servicio . " " . $cita->precio; ?></p>
                <?php 
                    $actual = $cita->id;
                    $proximo = $citas[$key + 1]->id ?? 0;

                    if(esUltimo($actual, $proximo)) { ?>
                        <p class="total">Total: <span>$ <?php echo $total; ?></span></p>
    
                        <form action="/api/eliminar" method="POST">
                            <input type="hidden" name="id" value="<?php echo $cita->id; ?>">
                            <input type="submit" class="boton-eliminar" value="Eliminar">
                        </form>
    
                <?php } 
            } // Fin de Foreach ?>
    </ul>

</div>


