<?php
  /*
    Per ogni prodotto, filtro le select disponibili
    Una volta inviato il form, faccio alcuni array con i prodotti
    Tramite addizioni reiterate calcolo il valore totale
    Tramite i metodi della classe estraggo i vari dati dei prodotti
  */

  require 'Prodotto.php';
?>
<html>
<head>
  <title>Elenco Prodotti</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <a href="homepage.php">Torna alla homepage</a>
  <form action="" method="get">
    <table class="login-box">
      <tr>
        <td>Genere scelto</td>
        <td>
          <select name="genere">
          <?php
            $options = array();
            $all_products = array();

            $prodotti = file('prodotti.csv');

            foreach($prodotti as $prodotto){
              $prod = new Prodotto();
              $prod->init(explode(',', $prodotto)[0], explode(',', $prodotto)[1], explode(',', $prodotto)[2], explode(',', $prodotto)[3], explode(',', $prodotto)[4]);
              #var_dump($prod);
              $genere = $prod->getGenere();

              if (!in_array($genere, $options)){
                array_push($options, $genere);
              }
              array_push($all_products, $prod);
            }

            foreach($options as $option){
              echo '<option value="'.$option.'">'.$option.'</option>';
            }
          ?>
          </select>
        </td>
      </tr>
      <tr>
        <td colspan="2"><input type="submit" value="Estrai"></td>
      </tr>

  </form>

  <?php
    if (isset($_GET['genere'])) {
      $valore_totale = 0;
      foreach ($all_products as $p) {
        $valore_totale += $p->getPrezzo()*$p->getGiacenza();

        if ($_GET['genere'] == $p->getGenere()){
          echo '<table class="product-box">
          <tr>
            <td>Nome prodotto</td>
            <td>'.$p->getNome().'</td>
          </tr>
          <tr>
            <td>Genere</td>
            <td>'.$p->getGenere().'</td>
          </tr>
          <tr>
            <td>Prezzo</td>
            <td>'.$p->getPrezzo().'</td>
          </tr>
          <tr>
            <td>Giacenza</td>
            <td>'.$p->getGiacenza().'</td>
          </tr>
          <tr>
            <td colspan="2"><img src="'.$p->getImmagine().'"></td>
          </tr>
          </table>';
        }

      }

      echo '<div class="success">Valore totale magazzino: '.$valore_totale.' &euro;</div>';

    }

  ?>

</body>
</html>
