<h1 class="nombre-pagina">Panel de administración</h1>


<?php
    include_once __DIR__ .'/../template/barra.php';
?>
<h2>Buscar Citas</h2>
<div class="busqueda">
    <form class="formulario">
        <div class="fecha">
            <input 
                type="date"
                id="fecha"
                name="fecha"
                value="<?php echo $fecha; ?>"
            >
        </div>
    </form>
</div>

<div id="citas-.admin"></div>