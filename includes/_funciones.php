<?php 
require_once("_db.php");
switch ($_POST["accion"]) {
	case 'login':
	login();
	break;
	//**USUARIOS**//
	case 'consultar_usuarios':
	consultar_usuarios();
	break;
	case 'insertar_usuarios':
	insertar_usuarios();
	break;
	case 'eliminar_registro':
	eliminar_registro($_POST["id"]);
	break;
	case 'editar_registro':
	editar_registro($_POST["id"]);
	break;
	case 'editar_usuarios':
	editar_usuarios($_POST["id"]);
	break;
	//---

	//**CARGA FOTO**//
	case 'carga_foto':
	carga_foto();
	break;
	//---

	//**ENCABEZADO**//
	case 'consultar_encabezado':
	consultar_encabezado();
	break;
	case 'insertar_encabezado':
	insertar_encabezado();
	break;
	case 'eliminar_encabezado':
	eliminar_encabezado($_POST["id"]);
	break;
	case 'ceditar_encabezado':
	ceditar_encabezado($_POST["id"]);
	break;
	case 'editar_encabezado':
	editar_encabezado($_POST["id"]);
	break;
	//---

	//**FEATURES**//
	case 'consultar_features':
	consultar_features();
	break;
	case 'insertar_features':
	insertar_features();
	break;
	case 'eliminar_features':
	eliminar_features($_POST["id"]);
	break;
	case 'ceditar_features':
	ceditar_features($_POST["id"]);
	break;
	case 'editar_features':
	editar_features($_POST["id"]);
	break;

function consultar_usuarios(){
	global $mysqli;
	$consulta = "SELECT * FROM usuarios";
	$resultado = mysqli_query($mysqli, $consulta);
	$arreglo = [];
	while($fila = mysqli_fetch_array($resultado)){
		array_push($arreglo, $fila);
	}
	echo json_encode($arreglo); //Imprime el JSON ENCODEADO
}

function insertar_usuarios(){
	global $mysqli;
	$nombre_usr = $_POST["nombre"];
	$correo_usr = $_POST["correo"];	
	$password = $_POST["password"];	
	$telefono_usr = $_POST["telefono"];	
	$consultain = "INSERT INTO usuarios VALUES('','$nombre_usr','$correo_usr','$password', '$telefono_usr', 1)";
	$resultadoin = mysqli_query($mysqli, $consultain);
		echo "Se inserto el usuario en la BD ";

}
///ELIMINAR USUARIO////
function eliminar_registro($id){
	global $mysqli;
	$consulta = "DELETE FROM usuarios WHERE id_usr = $id";
	$resultado = mysqli_query($mysqli, $consulta);
	// print_r($resultado);
	if ($resultado) {
		echo "Se elimino correctamente";
	}
	else{
		echo "Se genero un error intenta nuevamente";
	}
}
function editar_registro($id){
	global $mysqli;
	$consulta = "SELECT * FROM usuarios WHERE id_usr = '$id'";
	$resultado = mysqli_query($mysqli, $consulta);
	// $arreglo = [];
	// while($fila = mysqli_fetch_array($resultado)){
	// 	array_push($arreglo, $fila);
	// }
	// echo json_encode($arreglo);

	// }
	$fila = mysqli_fetch_array($resultado);
	    echo json_encode($fila);
	}

function editar_usuarios($id){
	global $mysqli;
	$nombre_usr = $_POST["nombre"];
	$correo_usr = $_POST["correo"];	
	$password = $_POST["password"];	
	$telefono_usr = $_POST["telefono"];
	$consultain = "UPDATE usuarios SET nombre_usr = '$nombre_usr',correo_usr = '$correo_usr', password = '$password', telefono_usr = '$telefono_usr' WHERE id_usr = $id";
	$resultadoin = mysqli_query($mysqli, $consultain);
    echo "Se edito el usuario correctamente";
}

////ENCABEZADO//////
function consultar_encabezado(){
	global $mysqli;
	$consulta = "SELECT * FROM encabezado";
	$resultado = mysqli_query($mysqli, $consulta);
	$arreglo = [];
	while($fila = mysqli_fetch_array($resultado)){
		array_push($arreglo, $fila);
	}
	echo json_encode($arreglo); //Imprime el JSON ENCODEADO
}
		
function insertar_encabezado(){
	global $mysqli;
	$titulo_en = $_POST["titulo"];
	$subtitulo_en = $_POST["subtitulo"];	
	$boton_en = $_POST["boton"];	
	$consultain = "INSERT INTO encabezado VALUES('','$titulo_en','$subtitulo_en','$boton_en')";
	$resultadoin = mysqli_query($mysqli, $consultain);
	$arregloin = [];
	while($filain = mysqli_fetch_array($resultadoin)){
		array_push($arregloin, $filain);
	}
	echo json_encode($arregloin); //Imprime el JSON ENCODEADO
}

function eliminar_encabezado($id){
	global $mysqli;
	$consulta = "DELETE FROM encabezado WHERE id_en = $id";
	$resultado = mysqli_query($mysqli, $consulta);
	if ($resultado) {
		echo "Se elimino correctamente";
	}
	else{
		echo "Se genero un error intenta nuevamente";
	}
}
function ceditar_encabezado($id){
	global $mysqli;
	$consulta = "SELECT * FROM encabezado WHERE id_en = '$id'";
	$resultado = mysqli_query($mysqli, $consulta);
	$fila = mysqli_fetch_array($resultado);
	    echo json_encode($fila);
	}

function editar_encabezado($id){
	global $mysqli;
	$titulo_en = $_POST["titulo"];
	$subtitulo_en = $_POST["subtitulo"];	
	$boton_en = $_POST["boton"];	
	$consultain = "UPDATE encabezado SET titulo_en = '$titulo_en',subtitulo_en = '$subtitulo_en', boton_en = '$boton_en' WHERE id_en = $id";
	$resultadoin = mysqli_query($mysqli, $consultain);
    echo "Se edito Main correctamente";
}

/////FEATURES
function consultar_features(){
	global $mysqli;
	$consulta = "SELECT * FROM features";
	$resultado = mysqli_query($mysqli, $consulta);
	$arreglo = [];
	while($fila = mysqli_fetch_array($resultado)){
		array_push($arreglo, $fila);
	}
	echo json_encode($arreglo); //Imprime el JSON ENCODEADO
}
function insertar_features(){
	global $mysqli;
	$img_fe = $_POST["imagen"];
	$titulo_fe = $_POST["titulo"];	
	$subtitulo_fe = $_POST["subtitulo"];	
	$consultain = "INSERT INTO features VALUES('','$img_fe','$titulo_fe','$subtitulo_fe')";
	$resultadoin = mysqli_query($mysqli, $consultain);
	$arregloin = [];
	while($filain = mysqli_fetch_array($resultadoin)){
		array_push($arregloin, $filain);
	}
	echo json_encode($arregloin); //Imprime el JSON ENCODEADO
}
function eliminar_features($id){
	global $mysqli;
	$consulta = "DELETE FROM features WHERE id_fe = $id";
	$resultado = mysqli_query($mysqli, $consulta);
	if ($resultado) {
		echo "Se elimino correctamente";
	}
	else{
		echo "Se genero un error intenta nuevamente";
	}
}
function ceditar_features($id){
	global $mysqli;
	$consulta = "SELECT * FROM features WHERE id_fe = '$id'";
	$resultado = mysqli_query($mysqli, $consulta);
	$fila = mysqli_fetch_array($resultado);
	    echo json_encode($fila);
	}

function editar_features($id){
	global $mysqli;
	$img_fe = $_POST["imagen"];
	$titulo_fe = $_POST["titulo"];	
	$subtitulo_fe = $_POST["subtitulo"];	
	$consultain = "UPDATE features SET img_fe = '$img_fe',titulo_fe= '$titulo_fe', subtitulo_fe = '$subtitulo_fe' WHERE id_fe = $id";
	$resultadoin = mysqli_query($mysqli, $consultain);
    echo "Se edito Feature correctamente";
}
	function login(){
		global $mysqli;
		// Conectar a Base de Datos.
		$correo = $_POST["correo"];
		$pass = $_POST["password"];	
		// Consultar a Base de Datos que exista el usuario.
		$consulta = "SELECT * FROM usuarios WHERE correo_usr = '$correo'";
		$resultado = $mysqli->query($consulta);
		$fila = $resultado->fetch_assoc();
		
		if ($fila == 0) 
			{
				// 	Si el usuario no existe imprimir = 2
				echo "El usuario no existe [ERROR-02]";

			}

			// 	Si el usuario existe, conusltar que el password sea correcto. 
		else if ($fila["password"] != $pass) 
			{
				$consulta = "SELECT * FROM usuarios WHERE correo_usr = '$correo' AND password = '$pass'";
				$resultado = $mysqli->query($consulta);
				$fila = $resultado->fetch_assoc();
				// 			Si el password no es correcto, imprimir codigo de erorres = 0.
				echo "El Password es Incorrecto [ERROR-00]";

				
			}
				else if($correo == $fila["correo_usr"] && $pass == $fila["password"])
				{
					// 			Si el password es correcto imprimir = 1 
					session_start();
					error_reporting(0);
					$_SESSION['usuarios']=$correo;
					echo $correo;
					echo $_SESSION['usuarios'];				
					echo "El Usuario y Password son Correctos [ACESSO-01]"	;
				}
			}

?>