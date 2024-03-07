<div class="barra">
    <p>Hola: <?php echo $nombre ?? ''; ?></p>
    <div>
        <a class="boton" href="/logout">Cerrar Sesión</a>
        <?php if(!isset($_SESSION['admin'])){ ?>
            <a class="boton"href="/cita">Crear Cita</a>
            <a class="boton" href="/citas">Mis Citas</a>
        <?php }else { ?>
            <a class="boton" href="/admin">Ver Citas</a>
        <?php } ?>
    </div>
</div>

<?php if(isset($_SESSION['admin'])){ ?>
    <div class="barra-servicios">
        <a class="boton" href="/servicios">Ver Servicios</a>
        <a class="boton" href="/servicios/crear">Nuevo Servicio</a>
    </div>


<?php } ?>