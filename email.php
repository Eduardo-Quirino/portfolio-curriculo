<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Validação dos dados recebidos pelo formulário
  $requiredFields = ['nome', 'email', 'assunto', 'mensagem'];

  foreach ($requiredFields as $field) {
    if (empty($_POST[$field])) {
      echo "Por favor, preencha todos os campos do formulário";
      exit;
    }
  }

  $nome = htmlspecialchars($_POST['nome'], ENT_QUOTES, 'UTF-8');
  $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
  $assunto = htmlspecialchars($_POST['assunto'], ENT_QUOTES, 'UTF-8');
  $mensagem = htmlspecialchars($_POST['mensagem'], ENT_QUOTES, 'UTF-8');

  $data_envio = date('d/m/Y');
  $hora_envio = date('H:i:s');

  // Compo E-mail
  $arquivo = "
    <html>
      <p><b>Nome: </b>$nome</p>
      <p><b>E-mail: </b>$email</p>
      <p><b>Assunto: </b>$assunto</p>
      <p><b>Mensagem: </b>$mensagem</p>
      <p>Este e-mail foi enviado em <b>$data_envio</b> às <b>$hora_envio</b></p>
    </html>
  ";

  // Emails para quem será enviado o formulário
  $destino = "edu.3532quirino@gmail.com";
  $assuntoEmail = "Contato pelo Site Portfólio";

  // Cabeçalhos do e-mail
  $headers  = "MIME-Version: 1.0\n";
  $headers .= "Content-type: text/html; charset=UTF-8\n";
  $headers .= "From: $nome <$email>";

  // Enviar e-mail
  if (mail($destino, $assuntoEmail, $arquivo, $headers)) {
    echo "E-mail enviado com sucesso!";
  } else {
    echo "Houve um erro ao enviar o e-mail. Por favor, tente novamente mais tarde.";
  }
} else {
  echo "Acesso inválido ao script.";
}
?>
