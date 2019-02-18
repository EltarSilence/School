<?php
  /*
    SE NON E' AMMINISTRATORE
      RITORNA AD INDEX
    ALTRIMENTI
      MOSTRA FORM DI REGISTRAZIONE
      ESEGUE QUERY DI INSERIMENTO
  */
  session_start();
  require 'config.php';
  $sql = "SELECT * FROM utenti WHERE nickname = '".$_SESSION['nickname']."'";
  $result = $conn->query($sql);
  while($row = $result->fetch_assoc()){ $user = $row; }
  if (!$user['isAdmin']){
    header('Location: index.php?er=adm');
    die();
  }

?>

<html>
  <head>
    <title>Nuovo Utente</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <?php
      if (isset($_POST['newuser'])){
        $cgnm = $_POST['cognome'];
        $nome = $_POST['nome'];
        $nickname = $_POST['nickname'];
        $password = $_POST['pwd'];
        $mail = $_POST['email'];
        $indirizzo = $_POST['indirizzo'];
        $ddn = $_POST['ddn'];
        if (isset($_POST['adm'])){
          if ($_POST['adm']=="true"){
            $admin = 1;
          }
        }
        else {
          $admin = 0;
        }

        $sql = "INSERT INTO utenti (cognome, nome, nickname, password, email, indirizzo, ddn, isAdmin)
        VALUES ('$cgnm', '$nome', '$nickname', '$password', '$mail', '$indirizzo', '$ddn', '$admin')";
        $result = $conn->query($sql);
        echo '<div class="success"><b>Nuovo utente registrato</div>';
      }

      include 'menu.php';

    ?>
    <div class="body">
      <form action="" method="post">
        <table class="login-box">
          <tr>
            <?php
              if ($user['isAdmin']){
                echo '<td colspan="2" align="center"><img src="content/add.png" width="15px" height="15px" /> (Sei un amministratore, puoi inserire nuovi utenti)</td>';
              }
            ?>
          </tr>
          <tr>
            <td>Cognome</td>
            <td><input name="cognome"/></td>
          </tr>
          <tr>
            <td>Nome</td>
            <td><input name="nome"/></td>
          </tr>
          <tr>
            <td>Nickname</td>
            <td><input name="nickname"/></td>
          </tr>
          <tr>
            <td>Password</td>
            <td><input name="pwd" type="password"/></td>
          </tr>
          <tr>
            <td>Email</td>
            <td><input name="email" type="email"/></td>
          </tr>
          <tr>
            <td>Indirizzo</td>
            <td><input name="indirizzo"/></td>
          </tr>
          <tr>
            <td>Data di Nascita</td>
            <td><input name="ddn" type="date"/></td>
          </tr>
          <tr>
            <td>Amministratore?</td>
            <td><input name="adm" type="checkbox" value="true"/></td>
          </tr>
          <tr>
            <td colspan="2" align="center"><input type="submit" name="newuser" value="Registra nuovo utente" /></td>
          </tr>
        </table>
      </form>
    </div>
  </body>

</html>
