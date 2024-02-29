<h1 class="nombre-pagina">¿Olvidaste tu contraseña?</h1>
<p class="descripcion-pagina">Reestablece tu contraseña escrbriendo tu email a continuación: </p>

<?php include_once __DIR__ ."/../template/alertas.php"; ?>

<form class="formulario" method="POST" action="/olvide">
    <div class="campo">
        <label for="email">Email</label>
        <input
            type="email"
            id="email"
            name="email"
            placeholder="Tu E-mail"
        />
    </div>

    <input type="submit" class="boton" value="Restaurar contraseña">
</form>

<div class="acciones">
    <a href="/">¿Ya tienes una cuenta? inicia Sesión</a>
    <a href="/crear-cuenta">¿Aún no tienes una cuenta? Crea una</a>
</div>