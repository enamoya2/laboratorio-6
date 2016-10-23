<?php
session_start();
include_once ("funcionalidades.php");

function imprimirPreguntas(){
	$xml = simplexml_load_file('../xml/preguntas.xml');
	echo '<table border=1> <tr> <th> TEMATICA </th> <th> COMPLEJIDAD </th> <th> ENUNCIADO </th></tr>';
	foreach($xml->children() as $pregunta){
		echo '<tr> <th>' . $pregunta['subject'] . '</th> <th>'. $pregunta['complexity'] . '</th>';
		foreach($pregunta->children() as $child){
			if($child->getName() == 'itemBody'){
				echo '<th>' . $child->p . '</th>';
			}
		}
		echo '</tr>';
	}
	echo '</table>';
	anadirAccion("ver_preguntas");
}
?>



<!DOCTYPE html>
<html>
  <head>
	<?php include('../adds/StyleAndMeta.php'); ?>
	<title>Inicio</title>
  </head>
  <body>
  <div id='page-wrap'>
	<?php include('../adds/header.php'); ?>
	<?php include('../adds/navegation.php'); ?>
    <section class="main" id="s1">
		<div>
			<?php imprimirPreguntas(); ?>
		</div>
    </section>
	<?php include('../adds/footer.php'); ?>
</div>
</body>
</html>
