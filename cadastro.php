<?php
/*
PHP Version 7.4.8
Apache Version:Apache/2.4.43
*/
ini_set('default_charset','UTF-8');
include_once("valida.php");
session_start();
?>
<!DOCTYPE HTML>
<html lang="PT-BR">
 <head>
  <meta charset="UTF-8">
  <title>Cadastro</title>
  <meta name="keywords" content="HTML, CSS, PHP">
  <meta name="author" content="André Aparecido">
  <meta name="description" content="Simples Cadastro Com Validação">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="index.css">
 </head>
 <body>
  <form method="POST" action="cadastro.php" class="form">
    <div class="titulo">
        <h2>Cadastro</h2>
    </div>
    <div class="email">
     <h4>Email</h4>
    </div>
    <div class="error">
        <p>
         <?php 
           $valida -> validaEmail();
         ?>
        </p>
   </div>
    <div class="input">
       <input type="text" name="email" placeholder="Seu Melhor Email ;)" value="<?php $valida ->value_email(); ?>">
    </div>
    <div class="senha">
     <h4>Senha</h4>
    </div>
    <div class="error">
     <p>
     <?php
       $valida -> validaSenha();
     ?>
    </p>
   </div>
    <div class="input">
      <input type="text" name="senha" placeholder="Senha" value="<?php $valida->value_senha(); ?>">
    </div>
    <div class="nome">
     <h4>Nome</h4>
    </div>
    <div class="error">
      <p>
      <?php
       $valida -> validaNome();
      ?>
     </p>
    </div>
     <div class="input">
       <input type="text" name="nome" placeholder="Seu Primeiro Nome" value="<?php $valida ->value_nome(); ?>">
     </div>
     <div class="submit">
       <input type="submit" Value="Cadastrar" title="Cadastrar"> 
     </div>
  </form>
 </body>
</html>