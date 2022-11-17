<?php
    session_start();
    if(isset($_POST['submit']) && !empty($_POST['email'])  && !empty($_POST['senha'])) 
    {
        $conectar = mysql_connect('localhost','root','');
	    $banco    = mysql_select_db("site");

        $email = $_POST['email'];
        $senha = $_POST['senha']; 

        $sql = "SELECT * FROM registro WHERE email='$email' AND senha='$senha'";
        $result = mysql_query($sql);
        $pessoa = mysql_fetch_assoc($result);

        if($pessoa == 0) {
            unset($_SESSION['email']);
            unset($_SESSION['senha']);
            header("Location: login.php");
        }else {
            $_SESSION['email'] = $email;
            $_SESSION['senha'] = $senha;
            header("Location: perfil.php");
        }
    }else 
    {
        header("Location: login.php");
    }

?>
