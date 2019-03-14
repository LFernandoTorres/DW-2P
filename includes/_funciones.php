<?php 
require_once("_db.php");
switch ($_POST["accion"]) {
	case 'login':
	login();
	break;
	
	//**WORKS**//
	case 'consultar_works':
	consultar_works();
	break;
	case 'insertar_works':
	insertar_works();
	break;
		case 'eliminar_works':
	eliminar_works($_POST["id"]);
	break;
	case 'ceditar_works':
	ceditar_works($_POST["id"]);
	break;
	case 'editar_works':
	editar_works($_POST["id"]);
	break;

	//**OURTEAM**//
	case 'consultar_ourteam':
	consultar_ourteam();
	break;
	case 'insertar_ourteam':
	insertar_ourteam();
	break;
		case 'eliminar_ourteam':
	eliminar_ourteam($_POST["id"]);
	break;
	case 'ceditar_ourteam':
	ceditar_ourteam($_POST["id"]);
	break;
	case 'editar_ourteam':
	editar_ourteam($_POST["id"]);
	break;
	default:
	break;


/////WORKS
function consultar_works(){
	global $mysqli;
	$consulta = "SELECT * FROM works";
	$resultado = mysqli_query($mysqli, $consulta);
	$arreglo = [];
	while($fila = mysqli_fetch_array($resultado)){
		array_push($arreglo, $fila);
	}
	echo json_encode($arreglo); //Imprime el JSON ENCODEADO
}
function insertar_works(){
	global $mysqli;
	$img_wo = $_POST["imagen"];
	$proyect_name_wo = $_POST["proyecto"];	
	$website_design_wo = $_POST["website"];	
	$consultain = "INSERT INTO works VALUES('','$img_wo','$proyect_name_wo','$website_design_wo')";
	$resultadoin = mysqli_query($mysqli, $consultain);
	$arregloin = [];
	while($filain = mysqli_fetch_array($resultadoin)){
		array_push($arregloin, $filain);
	}
	echo json_encode($arregloin); //Imprime el JSON ENCODEADO
}
function eliminar_works($id){
	global $mysqli;
	$consulta = "DELETE FROM works WHERE id_wo = $id";
	$resultado = mysqli_query($mysqli, $consulta);
	// print_r($resultado);
	if ($resultado) {
		echo "Se elimino correctamente";
	}
	else{
		echo "Se genero un error intenta nuevamente";
	}
}
function ceditar_works($id){
	global $mysqli;
	$consulta = "SELECT * FROM works WHERE id_wo = '$id'";
	$resultado = mysqli_query($mysqli, $consulta);

	$fila = mysqli_fetch_array($resultado);
	    echo json_encode($fila);
	}

function editar_works($id){
	global $mysqli;
	$img_wo = $_POST["img_wo"];
	$proyect_name_wo = $_POST["proyect_name_wo"];	
	$website_design_wo = $_POST["website_design_wo"];	
	$consultain = "UPDATE works SET img_wo = '$img_wo',proyect_name_wo = '$proyect_name_wo', website_design_wo = '$website_design_wo' WHERE id_wo = $id";
	$resultadoin = mysqli_query($mysqli, $consultain);
    echo "Se edito el Work correctamente";
}

/////OURTEAM
function consultar_ourteam(){
	global $mysqli;
	$consulta = "SELECT * FROM ourteam";
	$resultado = mysqli_query($mysqli, $consulta);
	$arreglo = [];
	while($fila = mysqli_fetch_array($resultado)){
		array_push($arreglo, $fila);
	}
	echo json_encode($arreglo); //Imprime el JSON ENCODEADO
}
function insertar_ourteam(){
	global $mysqli;
	$img_our = $_POST["imagen"];
	$nombre_our = $_POST["nombre"];	
	$cargo_our = $_POST["cargo"];	
	$consultain = "INSERT INTO ourteam VALUES('','$img_our','$nombre_our','$cargo_our')";
	$resultadoin = mysqli_query($mysqli, $consultain);
	$arregloin = [];
	while($filain = mysqli_fetch_array($resultadoin)){
		array_push($arregloin, $filain);
	}
	echo json_encode($arregloin); //Imprime el JSON ENCODEADO
}
function eliminar_ourteam($id){
	global $mysqli;
	$consulta = "DELETE FROM ourteam WHERE id_our = $id";
	$resultado = mysqli_query($mysqli, $consulta);
	if ($resultado) {
		echo "Se elimino correctamente";
	}
	else{
		echo "Se genero un error intenta nuevamente";
	}
}
function ceditar_ourteam($id){
	global $mysqli;
	$consulta = "SELECT * FROM ourteam WHERE id_our = '$id'";
	$resultado = mysqli_query($mysqli, $consulta);
	$fila = mysqli_fetch_array($resultado);
	    echo json_encode($fila);
	}

function editar_ourteam($id){
	global $mysqli;
	$img_our = $_POST["img_our"];
	$nombre_our = $_POST["nombre_our"];	
	$cargo_our = $_POST["cargo_our"];	
	$consultain = "UPDATE ourteam SET img_our = '$img_our',nombre_our = '$nombre_our', cargo_our = '$cargo_our' WHERE id_our = $id";
	$resultadoin = mysqli_query($mysqli, $consultain);
    echo "Se edito Ourteam correctamente";
}
?>