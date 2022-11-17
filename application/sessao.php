<?php
function logaUsuario($senha, $confirmar,$nome,$sobrenome,$email,$cpf,$celular,$sexo,$usuario,$id) {
    $_SESSION['usuario_logado'] = $email; 
    $_SESSION['usuario_id'] = $id; 
    $_SESSION['usuario_nome'] = $nome; 
    $_SESSION['usuario_sobrenome'] = $sobrenome; 
    $_SESSION['usuario_usuario'] = $usuario; 
}
?>