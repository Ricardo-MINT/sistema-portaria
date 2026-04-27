<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"/>
<title>Portaria 1.0 - Login</title>
<style>
    .w3-card {
      max-width: 500px;
      margin: 16px;
      padding: 32px;
    }

    input[type="text"],
    input[type="password"] {
      width: 60%;
      height: 24px;
      padding: 14px;
      margin: 12px 0;
      border: none;
      border-radius: 5px;
    }

    .btn-custom {
      width: 30%;
      margin-top: 16px;
      margin-left: auto;
      margin-right: auto;
      display: block;
    }

    h1, .fas, form {
      margin: 16px 0;
    }
</style>
</head>
<body>

  <div class="w3-display-container" style="height: 100vh;">
    <div class="w3-display-middle">
      <div class="w3-card w3-round w3-gray w3-center">
        <h1 class="w3-xxlarge">Sistema de Portaria</h1>
        <i class="fas fa-user-shield w3-jumbo w3-margin-bottom"></i>

        <form action="loginAction.php" method="post">
          <input type="text" name="txtUsuario" placeholder="Usuário" required />
          <input type="password" name="txtSenha" placeholder="Senha" required />

          <button type="submit" class="w3-button w3-light-gray w3-round-large btn-custom">
          <i class="fa fa-sign-in"></i> Login
          </button>
        </form>
      </div>
    </div>
  </div>

</body>
</html>

