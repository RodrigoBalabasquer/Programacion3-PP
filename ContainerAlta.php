<!doctype html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Punto 5</title>
    </head>
    <body>
        <form action="ContainerAlta.php" method="POST"
        enctype="multipart/form-data" >
            Numero: <input type="text" name="txtNumero">
            <br/>
            Descripcion: <input type="text" name="txtDescripcion">
            <br/>
            pais: <input type="text" name="txtPais">
            <br/>
            Foto: <input type="file" name="foto">
            <br/>
            <input type="submit" value="Enviar" name="btnEnviar">
            <br/>
        </form>
    </body>
</html>

<?php
    
if(isset($_POST['btnEnviar']))
{
    
	$destino = "archivos/" . $_FILES["foto"]["name"];
	$uploadOk = TRUE;
	
    $tipoArchivo = pathinfo($destino, PATHINFO_EXTENSION);
	
    $esImagen = getimagesize($_FILES["foto"]["tmp_name"]);
	if($esImagen === FALSE) 
	{
		$uploadOk = FALSE;
		$mensaje = "S&oacute;lo son permitidas IMAGENES.";
		echo $mensaje;
	}
	
	
	if ($uploadOk === FALSE) 
	{
		echo "<br/><br/>NO SE PUDO SUBIR EL ARCHIVO.";
	} 
	else 
	{
		//MUEVO EL ARCHIVO DEL TEMPORAL AL DESTINO FINAL
		if (move_uploaded_file($_FILES["foto"]["tmp_name"], $destino)) 
		{
			try
            {
                $Pdo = new PDO("mysql:host=localhost;dbname=pp_prog_lll","root","");
                $PdoST = $Pdo->prepare("INSERT INTO containers(numero,descripcion,pais,foto) VALUES(:numero,:descripcion,:pais,:foto)");
                $PdoST->bindParam(":numero",$_POST['txtNumero']);
                $PdoST->bindParam(":descripcion",$_POST['txtDescripcion']);
                $PdoST->bindParam(":pais",$_POST['txtPais']);
                $PdoST->bindParam(":foto",$_FILES["foto"]["name"]);
                $PdoST->execute();
                
            }
            catch(Exception $e)
            {
                echo $e->getMessage();
            }
			
		} 
		else 
		{
			$mensaje = "Lamentablemente ocurri&oacute; un error y no se pudo subir el archivo.";
			echo $mensaje;
		}
	}
}

?>