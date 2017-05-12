<!doctype html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Punto 3</title>
        <script type="text/javascript" src="jquery.js"></script>
        <script type = "text/javascript">
        function Borrar(valor)
        {
            /*var xml = new XMLHttpRequest();
            xml.open("POST","Borrar.php",true);
            xml.setRequestHeader("content-type","application/x-www-form-urlencoded");
            
            xml.onreadystatechange = function()
            {   
                if(xml.readyState == 4 && xml.status == 200)
                {
                    document.getElementById("div").innerHTML = xml.responseText;
                }
            }
            xml.send("valor1="+valor);*/
            $.ajax(
			{
				type: 'POST',
				url: 'Borrar.php',
				dataType: 'text',
				data: "valor1="+valor,
				async:true
			})
			.done(function(resultado)
			{	
				$('#div').html(resultado);
			})
			.fail(function (jqXHR, textStatus, errorThrown)
            {
			    alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
			});

            
        }
        </script>
    </head>
    <body>
        <?php
        $texto = array();
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
        $i=0;
        foreach($texto as $tex)
        {
            
            echo $tex;
            
            echo "<input type='button' value='Borrar' name='btnborrar' onclick='Borrar($i)'>";
            echo "<br>";
            $i++;
            
        }
        ?>
        <div id='div'>    </div>
    </body>
</html>





