<?php 

require_once("config.php");
/*
$sql = new sql();

$usuarios = $sql->select("SELECT * FROM tb_usuarios");

echo json_encode($usuarios);
*/

/*
//Carrega um usuário
$root = new usuario();

$root->loadById(3); // puxando id do usuario pelo select

echo $root;
*/
/*
//Carrega uma lista de usuario sem parametros.
$lista = usuario::getList(); //utlizando assim pois  getLista é uma classe static na classe usuario

echo json_encode($lista);
 */
/*
//Carrega uma lista de usuario buscando pelo login
$search = usuario::search("jo");

echo json_encode($search);
 */
 
 //carrega um usuario usando o login e a senha

$usuario = new usuario();
$usuario->login("root","!@#$");
echo $usuario;
 ?>