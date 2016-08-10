<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript" src="jquery-3.1.0.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#btnBuscar").click(function(){

			});
		});
	</script>
	<style type="text/css">
		.header{
			width: 100%;
			height: 80px;
			border:1px solid black;
		}
		.menuleft{
			width: 200px;
			float: left;
			border:1px solid black;
		}
		.cuerpo{
			width: 80%;
			border: 1px solid black;
			float: left;
		}
	</style>
</head>
	

<body>
<?php 

	include_once("conexion_db.php"); 

	$connectdb = connectdb();
	
	$tablaCandidato = $connectdb->query("SELECT * from `candidato` INNER JOIN `candidato_estudios` ON `candidato`.IdCandidato = `candidato_estudios`.IdCandidato INNER JOIN `candidato_extras` ON `candidato`.IdCandidato = `candidato_extras`.IdCandidato INNER JOIN `candidato_generales` ON `candidato`.IdCandidato = `candidato_generales`.IdCandidato  limit 0,1");
	//$tablaEstudios = $connectdb->query("SELECT * from `candidato_estudios` where IdCandidato IN (SELECT IdCandidato from `candidato` limit 0,1)");

	unconnectdb($connectdb);

?>
<div class="header"><h1>REGISTRO DE CANDIDATOS</h1></div>

<div class="menuleft">
	Filtro:<br><br>
	Nombre:<br>
	<input type="text"><br>
	eMail:<br>
	<input type="text"><br>
	Instituto:<br>
	<input type="text"><br>
	Conocimientos:<br>
	<input type="text"><br>
	Empresa:<br>
	<input type="text"><br>
	Giro:<br>
	<input type="text"><br>
	Puesto:<br>
	<input type="text"><br>
	<br>
	<input type="button" value="Buscar" id="btnBuscar">
</div>

<div class="cuerpo">
<?php 
	$row = mysqli_fetch_assoc($tablaCandidato);
	//$row2 = mysqli_fetch_assoc($tablaEstudios);
	print_r($row);
	//print_r($row2);
?>
	<table border="1">
		<thead>
			<tr>
				<td>Candidato</td><td>eMail</td><td>Instituto</td><td>Conocimientos</td><td>Recidencia</td>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td><?php echo $row['Nombre']." ".$row['ApPaterno']." ".$row['ApMaterno']; ?></td><td><?php echo $row['eMail']; ?></td><td><?php echo $row['Institucion']; ?></td><td><?php echo $row['Descripcion']; ?></td><td><?php echo $row['Dir_Ciudad']." ".$row['Dir_Estado']." ".$row['Dir_Pais']; ?></td>
			</tr>
		</tbody>
	</table>

</div>


</body>
</html>