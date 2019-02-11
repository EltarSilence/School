<?php
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
    <link rel="stylesheet" href="style.css">
    <title>Elenchi</title>
  </head>

  <body>
    <?php
      include 'menu.php';
      if (isset($_GET['getAllAccesses'])){
        $u = $_GET['user'];
        $sql = "SELECT * FROM accessi WHERE user = '$u'";
        $result = $conn->query($sql);
        echo '<table class="login-box">';
        if ($result->num_rows < 1){
         echo "<tr><td>Non ci sono valori da mostrare</td></tr>";
        }
        while($row = $result->fetch_assoc()){
          echo '<tr><td><b>'.$_GET['user'].'</b></td><td>Login: <b>'.$row['inizio'].'</b> Logout: <b>'.$row['fine'].'</b></td></tr>';
        }
        echo '</table>';
      }
      if (isset($_GET['getBtwn'])){
        $gg1 = $_GET['gg1'];
        $mm1 = $_GET['month1'];
        $year1 = $_GET['year1'];
        $gg2 = $_GET['gg2'];
        $mm2 = $_GET['month2'];
        $year2 = $_GET['year2'];
        $sql = "SELECT * FROM accessi WHERE inizio BETWEEN '$year1-$mm1-$gg1' AND '$year2-$mm2-$gg2'";
        $result = $conn->query($sql);
        echo '<table class="login-box">';
        if ($result->num_rows < 1){
         echo "<tr><td>Non ci sono valori da mostrare</td></tr>";
        }
        while($row = $result->fetch_assoc()){
          echo '<tr><td><b>'.$row['user'].'</b></td><td>Login: <b>'.$row['inizio'].'</b> Logout: <b>'.$row['fine'].'</b></td></tr>';
        }
        echo '</table>';
      }
      if (isset($_GET['getMore10'])){
        $mese_riferim = $_GET['month'];
        $sql = "SELECT cognome, nome, user, COUNT(inizio) AS quanti, MONTH(inizio) AS mese FROM accessi AS A INNER JOIN utenti AS U ON A.user = U.nickname GROUP BY MONTH(inizio) HAVING COUNT(*) > 10 AND mese = $mese_riferim ORDER BY cognome, nome ASC";
        $result = $conn->query($sql);
        echo '<table class="login-box">';
        if ($result->num_rows < 1){
         echo "<tr><td>Non ci sono valori da mostrare</td></tr>";
        }
        while($row = $result->fetch_assoc()){
          echo '<tr><td><b>'.$row['cognome'].' '.$row['nome'].'</b></td></tr>';
        }
        echo '</table>';
      }
    ?>
    <div class="body">
      <h2>Tutti gli accessi di un utente</h2>
      <form action="" method="get">
        <table class="login-box">
          <tr>
            <td>Utente</td>
            <td>
              <select name="user">
                <?php
                $sql = "SELECT DISTINCT user FROM accessi";
                $result = $conn->query($sql);
                while($row = $result->fetch_assoc()){
                  echo '<option value="'.$row['user'].'">'.$row['user'].'</option>';
                }
                ?>
              </select>
          </td>
          </tr>
          <tr>
            <td colspan="2" align="center"><input type="submit" name="getAllAccesses" value="Estrai" /></td>
          </tr>
        </table>
      </form>

      <h2>Accessi tra due date</h2>
      <form action="" method="get">
        <table class="login-box">
          <tr>
            <td>Data di partenza considerazione</td>
            <td>
              <input name="gg1" placeholder="giorno">
              <input name="month1" placeholder="mese">
              <input name="year1" placeholder="anno">
            </td>
          </tr>
          <tr>
            <td>Data di fine considerazione</td>
            <td>
              <input name="gg2" placeholder="giorno">
              <input name="month2" placeholder="mese">
              <input name="year2" placeholder="anno">
            </td>
          </tr>
          <tr>
            <td colspan="2" align="center"><input type="submit" name="getBtwn" value="Estrai" /></td>
          </tr>
        </table>
      </form>

      <h2>Utenti che hanno fatto oltre 10 accessi</h2>
      <form action="" method="get">
        <table class="login-box">
          <tr>
            <td>Mese di riferimento</td>
            <td>
              <select name="month">
                <option value="1">Gennaio</option>
                <option value="2">Febbraio</option>
                <option value="3">Marzo</option>
                <option value="4">Aprile</option>
                <option value="5">Maggio</option>
                <option value="6">Giugno</option>
                <option value="7">Luglio</option>
                <option value="8">Agosto</option>
                <option value="9">Settembre</option>
                <option value="10">Ottobre</option>
                <option value="11">Novembre</option>
                <option value="12">Dicembre</option>
              </select>
            </td>
          </tr>
          <tr>
            <td colspan="2" align="center"><input type="submit" name="getMore10" value="Estrai" /></td>
          </tr>
        </table>
      </form>
    </div>
  </body>

</html>
