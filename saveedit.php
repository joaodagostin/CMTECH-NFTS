<?php 

    include_once('configperfil.php');
    $conectar = mysql_connect('localhost','root','');
	$banco    = mysql_select_db("site");

    if(isset($_POST['update'])) {
        $usuario = $_POST['usuario'];
        $celular = $_POST['celular'];
        $senha      = $_POST['senha'];

        $sqlUpdate = "UPDATE registro set Usuario = '$usuario', Celular = NULL, Senha = '$senha' where id = '$id'";
        $resultado = mysql_query($sqlUpdate);

        if($resultado) {
            echo  "<script>alert('Dados alterados com sucesso!');</script>";
        } else {
            echo  "<script>alert('Falha ao alterar dados, tente novamente!');</script>";
        }
    }
    header('Location: configperfil.php');

?>