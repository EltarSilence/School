<?php
/*
  SE L'UTENTE NON E' LOGGATO
    MOSTRA FORM LOGIN
  ALTRIMENTI
    MOSTRA INFORMAZIONI E FORM DI UPDATE
*/
  session_start();

  if (!isset($_SESSION['nickname'])){
    header("Location: login.php");
    die();
  }
  require 'config.php';
?>
<html>
  <head>
    <link rel="stylesheet" href="style.css" />
    <title>Sistema Accessi</title>
  </head>
  <body>
    <?php
      include 'menu.php';
      if (isset($_GET['er'])){
        if ($_GET['er'] == "adm"){
          echo '<div class="error"><b>Devi essere amministratore per visionare questa pagina</div>';
        }
      }

      $sql = "SELECT * FROM utenti WHERE nickname = '".$_SESSION['nickname']."'";
      $result = $conn->query($sql);
      while($row = $result->fetch_assoc()){ $user = $row; }
    ?>
    <div class="body">

      <?php
        if (isset($_POST['update'])){
          $cgnm = $_POST['cognome'];
          $nome = $_POST['nome'];
          $mail = $_POST['email'];
          $indirizzo = $_POST['indirizzo'];
          $ddn = $_POST['ddn'];
          $sql = "UPDATE utenti SET cognome = '$cgnm', nome = '$nome', email = '$mail', indirizzo = '$indirizzo', ddn = '$ddn' WHERE nickname = '".$_SESSION['nickname']."'";
          $result = $conn->query($sql);
          echo '<div class="success"><b>Dati aggiornati con successo</div>';
        }

      ?>
      <h2><img src="content/edit.png" /> I tuoi dati personali</h2>
      <form action="" method="post">
        <table class="login-box">
          <tr>
            <?php
              if ($user['isAdmin']){
                echo '<td colspan="2" align="center">(Sei un amministratore)</td>';
              }
            ?>

          </tr>
          <tr>
            <td>Cognome</td>
            <td><input name="cognome" value="<?php echo $user['cognome']?>"/></td>
          </tr>
          <tr>
            <td>Nome</td>
            <td><input name="nome" value="<?php echo $user['nome']?>"/></td>
          </tr>
          <tr>
            <td>Email</td>
            <td><input name="email" value="<?php echo $user['email']?>"/></td>
          </tr>
          <tr>
            <td>Indirizzo</td>
            <td><input name="indirizzo" value="<?php echo $user['indirizzo']?>"/></td>
          </tr>
          <tr>
            <td>Data di nascita</td>
            <td><input type="date" name="ddn" value="<?php echo $user['ddn']?>"/></td>
          </tr>
          <tr>
            <td colspan="2" align="center"><input type="submit" name="update" value="Aggiorna i tuoi dati" /></td>
          </tr>
        </table>
      </form>
    </div>
  </body>
</html>
