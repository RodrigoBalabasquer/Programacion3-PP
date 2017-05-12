<?php
    $indice = $_POST["valor1"];
    $archivo = fopen("usuarios.txt","r");
        
        while(!feof($archivo))
            {
                $archivoAuxiliar = fgets($archivo);
                $Persona = explode("-",$archivoAuxiliar);
                $Persona[0] = trim($Persona[0]);
                if($Persona[0] != "")
                {
                    $texto[] =$Persona[0]."-".$Persona[1]."-".$Persona[2]."-".$Persona[3];
                }
            }  
    fclose($archivo);
    $archivo = fopen("usuarios.txt","w");
    fwrite($archivo,"");
    fclose($archivo);
    $archivo = fopen("usuarios.txt","a");
    for($i=0;$i<count($texto);$i++)
    {
        if($i!=$indice)
        {
            fwrite($archivo,$texto[$i]."-\r\n");
        }
    }
    fclose($archivo);
    echo "<a href='Listado.php'> Actualizar </a>";
?>