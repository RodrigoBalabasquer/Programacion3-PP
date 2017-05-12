<!doctype html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Punto 1</title>
    </head>
    <body>
        <form action="UsuarioCarga.php" method="POST"
        enctype="multipart/form-data" >
            Nombre: <input type="text" name="txtNombre">
            <br/>
            Email: <input type="text" name="txtEmail">
            <br/>
            Edad: <input type="text" name="txtEdad">
            <br/>
            Clave: <input type="text" name="txtClave">
            <br/>
            <input type="submit" value="Enviar" name="btnEnviar">
            <br/>
        </form>
    </body>
</html>

<?php
    
    if(isset($_POST['btnEnviar']))
    {
        $archivo = fopen("usuarios.txt","a");
        if(fwrite($archivo,$_POST['txtNombre']."-".$_POST['txtEmail']."-".$_POST['txtEdad']."-".$_POST['txtClave']."-\r\n")!= false)
        {
            echo "Datos guardados";
            fclose($archivo);
        }
        else
        {
            echo "No se pudo guardar";
            fclose($archivo);
        }
    }

?>