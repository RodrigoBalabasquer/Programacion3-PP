<!doctype html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Punto 7</title>
        <script type="text/javascript" src="jquery.js"></script>
        <script type = "text/javascript">
        function Borrar(valor)
        {
            /*var xml = new XMLHttpRequest();
            xml.open("POST","BorrarBase.php",true);
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
				url: 'BorrarBase.php',
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
        include_once "Container.php";
        $Pdo = new PDO("mysql:host=localhost;dbname=pp_prog_lll","root","");
		$PdoST = $Pdo->prepare("SELECT * FROM containers WHERE 1");
    	$PdoST->execute();
        
		foreach($PdoST as $registro) //devuelve los valores de la base fila por fila
		{	
			$ListaDeContainers[] = new Container($registro['numero'],$registro['descripcion'],$registro['pais'],$registro['foto']);
            
		}
        
        echo "<table border>
		<thead>
			<tr>
				<th>  Numero </th>
				<th>  Descripcion    </th>
                <th>  Pais   </th>
				<th>  FOTO       </th>
                <th>   </th>
			</tr> 
		</thead>";   	
        foreach ($ListaDeContainers as $cont){
            echo " 	<tr>
                        <td>".$cont->numero."</td>
                        <td>".$cont->descripcion."</td>
                        <td>".$cont->pais."</td>
                        <td><img src='archivos/".$cont->Foto."' width='100px' height='100px'/></td>
                        <td><input type='button' value='Borrar' name='btnborrar' onclick='Borrar($cont->numero)'><td>
                    </tr>";
            
        }	
        echo "</table>";	
        ?>
        <div id='div'>    </div>
    </body>
</html>



