<h1 class="nombre-pagina">Recuperar passsword</h1>
<p class="descripcion-pagina">Coloca tu nuevo password acontinuación</p>

<?php include_once __DIR__ ."/../template/alertas.php"; ?>

<?php if($error) return; ?>
<form class="formulario" method="POST" >
    <div class="campo">
        <label for="password">Password</label>

        <input 
        type="password"
        id="password"
        placeholder="Tu nuevo password"
        name="password"
        >

    </div>

    <input type="submit" class="boton" value="Guardar nuevo contraseña">
</form>

<div class="acciones">
    <a href="/">¿Ya tienes una cuenta? inicia Sesión</a>
    <a href="/crear-cuenta">¿Aún no tienes una cuenta? Crea una</a>
</div>