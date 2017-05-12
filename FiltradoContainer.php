<!doctype html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Punto 8</title>
    </head>
    <body>
        <form action="FiltradoContainer.php" method="POST"
        enctype="multipart/form-data" >
            Pais: <input type="text" name="txtPais">
            <br/>
            <input type="submit" value="Enviar" name="btnEnviar">
            <br/>
        </form>
    </body>
</html>

<?php
if(isset($_POST['btnEnviar']))
{
    include_once "Container.php";
    $Pdo = new PDO("mysql:host=localhost;dbname=pp_prog_lll","root","");
    $PdoST = $Pdo->prepare("SELECT * FROM containers WHERE pais = :pais");
    $PdoST->bindParam(":pais",$_POST['txtPais']);
    $PdoST->execute();
    foreach($PdoST as $registro) //devuelve los valores de la base fila por fila
    {	
        $ListaDeContainers[] = new Container($registro['numero'],$registro['descripcion'],$registro['pais'],$registro['foto']);
        
    }


    echo "<table class='table'>
            <thead>
                <tr>
                    <th>  Numero </th>
                    <th>  Descripcion    </th>
                    <th>  Pais   </th>
                    <th>  FOTO       </th>
                </tr> 
            </thead>";   	
        foreach ($ListaDeContainers as $cont){
            echo " 	<tr>
                        <td>".$cont->numero."</td>
                        <td>".$cont->descripcion."</td>
                        <td>".$cont->pais."</td>
                        <td><img src='archivos/".$cont->Foto."' width='100px' height='100px'/></td>
                    </tr>";
        }	
    echo "</table>";
}

?>