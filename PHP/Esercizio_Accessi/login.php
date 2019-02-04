<html>
<head>
  <link rel="stylesheet" href="style.css" />
  <title>Sistema Accessi</title>
</head>
<body>
  <?php
  if (isset($_SESSION['username'])) {
    header("Location: index.php");
  }
  else {
    //mostra menu in alto
    include 'menu.php';
    //mostra form login
    ?>
    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
    <?php
  }
  ?>
</body>
</html>
