<?php 
require_once("_db.php");
switch ($_POST["accion"]) {
	case 'login':
	login();
	break;
	//**TESTIMONIALS POR EDIER**//
	case 'consultar_testimonials':
	consultar_testimonials();
	break;
	case 'insertar_testimonials':
	insertar_testimonials();
	break;
	case 'eliminar_testimonials':
	eliminar_testimonials($_POST["id"]);
	break;
	case 'ceditar_testimonials':
	ceditar_testimonials($_POST["id"]);
	break;
	case 'editar_testimonials':
	editar_testimonials($_POST["id"]);
	break;

	//**DOWNLOADS POR EDIER**//
	case 'consultar_download':
	consultar_download();
	break;
	case 'insertar_download':
	insertar_download();
	break;
		case 'eliminar_downloads':
	eliminar_downloads($_POST["id"]);
	break;
	case 'ceditar_downloads':
	ceditar_downloads($_POST["id"]);
	break;
	case 'editar_downloads':
	editar_downloads($_POST["id"]);
	break;
	default:
	break;
}

}
/////TESTIMONIALS POR EDIER
function consultar_testimonials(){
	global $mysqli;
	$consulta = "SELECT * FROM testimonial";
	$resultado = mysqli_query($mysqli, $consulta);
	$arreglo = [];
	while($fila = mysqli_fetch_array($resultado)){
		array_push($arreglo, $fila);
	}
	echo json_encode($arreglo);
}
function insertar_testimonials(){
	global $mysqli;
	$img_tes = $_POST["imagen"];
	$cita_tes = $_POST["cita"];	
	$persona_tes = $_POST["persona"];	
	$consultain = "INSERT INTO testimonial VALUES('','$img_tes','$cita_tes','$persona_tes')";
	$resultadoin = mysqli_query($mysqli, $consultain);
	$arregloin = [];
	while($filain = mysqli_fetch_array($resultadoin)){
		array_push($arregloin, $filain);
	}
	echo json_encode($arregloin); 
}
function eliminar_testimonials($id){
	global $mysqli;
	$consulta = "DELETE FROM testimonial WHERE id_tes = $id";
	$resultado = mysqli_query($mysqli, $consulta);
	if ($resultado) {
		echo "Se elimino correctamente";
	}
	else{
		echo "Se genero un error intenta nuevamente";
	}
}
function ceditar_testimonials($id){
	global $mysqli;
	$consulta = "SELECT * FROM testimonial WHERE id_tes = '$id'";
	$resultado = mysqli_query($mysqli, $consulta);
	$fila = mysqli_fetch_array($resultado);
	    echo json_encode($fila);
	}

function editar_testimonials($id){
	global $mysqli;
	$img_tes = $_POST["imagen"];
	$cita_tes = $_POST["cita"];	
	$persona_tes = $_POST["persona"];	
	$consultain = "UPDATE testimonial SET img_tes = '$img_tes',cita_tes = '$cita_tes', persona_tes = '$persona_tes' WHERE id_tes = $id";
	$resultadoin = mysqli_query($mysqli, $consultain);
    echo "Se edito el testimonial correctamente";
}
/////DOWNLOADS POR EDIER
function consultar_download(){
	global $mysqli;
	$consulta = "SELECT * FROM download";
	$resultado = mysqli_query($mysqli, $consulta);
	$arreglo = [];
	while($fila = mysqli_fetch_array($resultado)){
		array_push($arreglo, $fila);
	}
	echo json_encode($arreglo);
}
function insertar_download(){
	global $mysqli;
	$titulo_do = $_POST["titulo"];
	$subtitulo_do = $_POST["subtitulo"];	
	$boton_do = $_POST["boton"];	
	$consultain = "INSERT INTO download VALUES('','$titulo_do','$subtitulo_do','$boton_do' )";
	$resultadoin = mysqli_query($mysqli, $consultain);
	$arregloin = [];
	while($filain = mysqli_fetch_array($resultadoin)){
		array_push($arregloin, $filain);
	}
	echo json_encode($arregloin);
}
function eliminar_downloads($id){
	global $mysqli;
	$consulta = "DELETE FROM download WHERE id_do = $id";
	$resultado = mysqli_query($mysqli, $consulta);
	if ($resultado) {
		echo "Se elimino correctamente";
	}
	else{
		echo "Se genero un error intenta nuevamente";
	}
}
function ceditar_downloads($id){
	global $mysqli;
	$consulta = "SELECT * FROM download WHERE id_do = '$id'";
	$resultado = mysqli_query($mysqli, $consulta);
	$fila = mysqli_fetch_array($resultado);
	    echo json_encode($fila);
	}

function editar_downloads($id){
	global $mysqli;
	$titulo_do = $_POST["titulo"];
	$subtitulo_do = $_POST["subtitulo"];	
	$boton_do = $_POST["boton"];	
	$consultain = "UPDATE download SET titulo_do = '$titulo_do',subtitulo_do = '$subtitulo_do', boton_do = '$boton_do' 
	WHERE id_do = $id";
	$resultadoin = mysqli_query($mysqli, $consultain);
    echo "Se edito download correctamente";
}	

?>