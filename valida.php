<?php 
 ini_set('default_charset','UTF-8');

  class valida{
      private $email;//Valor Do input
      private $email_value;//Valor Que Sera Colocado Dentro Do Input
      private $array_email_error;//array com errors
      private $email_db;//valor que será cadastrado no db

      private $senha;
      private $senha_value;
      private $array_senha_error;
      private $senha_db;

      private $nome;
      private $nome_value;
      private $array_nome_error;
      private $nome_db;
      public function GetEmail(){
        if(isset($_POST["email"])){
         $this->email = $_POST['email'];
        }else{
            $this->email = false;
        }
        $this->array_email_error = array("Email Vázio","Email Inválido");
      }
      public function GetSenha(){
        if(isset($_POST["senha"])){
          $this->senha = $_POST['senha'];
        }else{
            $this->senha = false;
        }
        $this->array_senha_error = array("Senha Vazio","Senha Muito Fraca","Límite De Caracteres é 30","Ensira Letras E Numeros");
    }
    public function GetNome(){
        if(isset($_POST["nome"])){
           $this->nome = $_POST['nome'];
        }else{
            $this->nome = false;
        }
        $this->array_nome_error = array("Nome Vázio","Proibido Numeros E Caracteres Especiais","Somente O Primeiro Nome");
    }
    /*validação*/
    public function validaEmail(){
       $email =  $this->email;
       $array_email = $this->array_email_error;
       $this->email_db = false;
        if($email == false){
            echo $array_email[0];
        }else{
            /*valida */
            if(strlen($email)>=257){
                 echo $array_email[1];       
            }else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                   echo $array_email[1];
            } else{
                 $this->email_db = $email;
            }
        }
    }
    public function validaSenha(){
        $senha = $this->senha;
        $array_senha = $this->array_senha_error;
        $this->senha_db = false;
          if($senha == false){
            echo $array_senha[0];
          }else {
            if(strlen($senha)>=31){
            $count = strlen($senha) - 30;
            echo "<br>".$array_senha[2].' Retire "'.$count.'" caracteres';
            }else if( !preg_match('([a-zA-Z].*[0-9]|[0-9].*[a-zA-Z])', $senha )){
              echo $array_senha[3];
            } else{
                $this ->senha_db = $senha;
            
               
            }
        }
    }
    public function validaNome(){
        $nome = $this->nome;
        $array_nome = $this->array_nome_error;
        $this->nome_db = false;
        if($nome == false){
           echo $array_nome[0];
        }else{
            if(strlen($nome)>=40){
              echo $array_nome[2];
            }else if(filter_var($nome,FILTER_SANITIZE_NUMBER_INT )){
                echo  $array_nome[1];
            }else{
                $this->nome_db = $nome;
            }
        }
    }
    /*valores dentro do campo input*/ 
    public function value_email(){
        echo htmlspecialchars($this->email);
    }
    public function value_senha(){
        echo htmlspecialchars($this->senha);
    }
    public function value_nome(){
        echo htmlspecialchars($this->nome);
    }
}
$valida = new valida();
$valida -> GetEmail();
$valida -> GetSenha();
$valida -> GetNome();
?>