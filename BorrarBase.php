<?php
    
    $Pdo = new PDO("mysql:host=localhost;dbname=pp_prog_lll","root","");
    $PdoST = $Pdo->prepare("DELETE FROM `containers` WHERE numero = :numero");
    $PdoST->bindParam(":numero",$_POST["valor1"]);
    $PdoST->execute();
    echo "<a href='ListadoBaseBorrar.php'> Actualizar </a>";
?>