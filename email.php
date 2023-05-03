<?php
//Validação dos dados recebidos pelo formulário
if (empty($_POST['nome']) || empty($_POST['email']) || empty($_POST['assunto']) || empty($_POST['mensagem'])) {
  echo "Por favor, preencha todos os campos do formulário";
  exit;
}

$nome = htmlspecialchars($_POST['nome'], ENT_QUOTES, 'UTF-8');
$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$assunto = htmlspecialchars($_POST['assunto'], ENT_QUOTES, 'UTF-8');
$mensagem = htmlspecialchars($_POST['mensagem'], ENT_QUOTES, 'UTF-8');

$data_envio = date('d/m/Y');
$hora_envio = date('H:i:s');

//Compo E-mail
$arquivo = { "
  <html>
    <p><b>Nome: </b>$nome</p>
    <p><b>E-mail: </b>$email</p>
    <p><b>Assunto: </b>$assunto</p>
    <p><b>Mensagem: </b>$mensagem</p>
    <p>Este e-mail foi enviado em <b>$data_envio</b> às <b>$hora_envio</b></p>
  </html>
"};

//Emails para quem será enviado o formulário
$destino = "edu.3532quirino@gmail.com";
$assunto = "Contato pelo Site Portfólio";

//Este sempre deverá existir para garantir a exibição correta dos caracteres
$headers  = "MIME-Version: 1.0\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\n";
$headers .= "From: $nome <$email>";

//Enviar
if (mail($destino, $assunto, $arquivo, $headers)) {
  echo "E-mail enviado com sucesso!";
} else {
  echo "Houve um erro ao enviar o e-mail. Por favor, tente novamente mais tarde.";
}
