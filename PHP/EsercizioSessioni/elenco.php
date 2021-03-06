<?php
  /*
    Per ogni prodotto, filtro le select disponibili
    Una volta inviato il form, faccio alcuni array con i prodotti
    Tramite addizioni reiterate calcolo il valore totale
    Tramite i metodi della classe estraggo i vari dati dei prodotti
  */
  session_start();
  require 'Prodotto.php';
  include 'bar.php';
?>
<html>
<head>
  <title>Elenco Prodotti</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
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

      for ($i=0; $i<count($all_products); $i++){
        $valore_totale += $all_products[$i]->getPrezzo()*$all_products[$i]->getGiacenza();

        if ($_GET['genere'] == $all_products[$i]->getGenere()){
          echo '<table class="product-box">
          <tr>
            <td class="tit">Nome prodotto</td>
            <td>'.$all_products[$i]->getNome().'</td>
          </tr>
          <tr>
            <td class="tit">Genere</td>
            <td>'.$all_products[$i]->getGenere().'</td>
          </tr>
          <tr>
            <td class="tit">Prezzo</td>
            <td>'.$all_products[$i]->getPrezzo().' &euro;</td>
          </tr>
          <tr>
            <td class="tit">Giacenza</td>
            <td>'.$all_products[$i]->getGiacenza().'</td>
          </tr>
          <tr>
            <td colspan="2"><img class="product-img" src="'.$all_products[$i]->getImmagine().'"></td>
          </tr>
          </table>';
      }
    }

      echo '<div class="product-box">Valore totale magazzino: '.number_format($valore_totale,2,",",".").' &euro;</div>';

    }

  ?>

</body>
</html>
