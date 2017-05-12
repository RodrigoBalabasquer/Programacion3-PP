<!doctype html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Punto 2</title>
    </head>
    <body>
        <form action="VerificarUsuario.php" method="POST"
        enctype="multipart/form-data" >
            Email: <input type="text" name="txtEmail">
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

        $valor = false;
        $archivo = fopen("usuarios.txt","r");
        while(!feof($archivo))
        {
            $archivoAuxiliar = fgets($archivo);
            $Persona = explode("-",$archivoAuxiliar);
            $Persona[0] = trim($Persona[0]);
            if($Persona[0] != "")
            {
                if($Persona[1] == $_POST['txtEmail'] && $Persona[3]==$_POST['txtClave'])
                {
                    $valor = true;
                    
                }
            }
        }
        fclose($archivo);
        if($valor)
        {
            echo '<a href="Listado.php">Lista</a>';
        }
        else
        {
            echo 'No hay coincidencias';
        }
        
    }

?>