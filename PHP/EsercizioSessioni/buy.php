<?php
  require 'bar.php';
  require 'Prodotto.php';
?>

<html>
<head>
  <title>Acquista</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
<form action="" method="get">
  <div class="login-box">
    <input type="search" name="searchbar"> <input type="submit" value="Cerca">
  </div>
</form>
<?php

  $all_products = array();

  $prodotti = file('prodotti.csv');

  foreach($prodotti as $prodotto){
    $prod = new Prodotto();
    $prod->init(explode(',', $prodotto)[0], explode(',', $prodotto)[1], explode(',', $prodotto)[2], explode(',', $prodotto)[3], explode(',', $prodotto)[4]);
    #var_dump($prod);
    $genere = $prod->getGenere();
    array_push($all_products, $prod);
  }

  if (isset($_GET['searchbar'])) {
    $foundProducts = array();
    foreach ($all_products as $prod){
      $prod_name_length = strlen($prod->getNome());
      if (similar_text(strtolower($_GET['searchbar']), strtolower($prod->getNome())) >= 4){
        array_push($foundProducts, $prod);
      }
    }

    if (empty($foundProducts)){
      echo '<div class="error">Nessun prodotto trovato: assicurarsi che le parole di ricerca siano corrette.</div>';
    }
    else {
      for ($i=0; $i<count($foundProducts); $i++){
        echo '<table class="product-box">
        <tr>
          <td class="tit">Nome prodotto</td>
          <td>'.$foundProducts[$i]->getNome().'</td>
        </tr>
        <tr>
          <td class="tit">Genere</td>
          <td>'.$foundProducts[$i]->getGenere().'</td>
        </tr>
        <tr>
          <td class="tit">Prezzo</td>
          <td>'.$foundProducts[$i]->getPrezzo().' &euro;</td>
        </tr>
        <tr>
          <td class="tit">Giacenza</td>
          <td>'.$foundProducts[$i]->getGiacenza().'</td>
        </tr>
        <tr>
          <td colspan="2"><img class="product-img" src="'.$foundProducts[$i]->getImmagine().'"></td>
        </tr>
        </table>';
      }
    }
  }
?>

</body>

</html>
