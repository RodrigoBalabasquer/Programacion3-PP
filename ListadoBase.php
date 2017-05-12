<?php 
include_once "Container.php";
        $Pdo = new PDO("mysql:host=localhost;dbname=pp_prog_lll","root","");
		$PdoST = $Pdo->prepare("SELECT * FROM containers WHERE 1");
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
?>