<?php
/* Inizializzo la sessione */
session_start();

$dochtml = new domDocument();
$dochtml->loadHTML('index.html');

$matricola = 0;
$password = "";
$err = "";

/* Se l'utente ha già effettauto il login lo reindrizzo */
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true)
{
    header("location: home.php");
    exit;
}

require_once "conn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (!empty(trim($_POST["matricola"])) && !empty(trim($_POST["password"]))){

      $matricola = trim($_POST["matricola"]);
      $password = trim($_POST["password"]);

      $query = "SELECT matricola, nome, cognome FROM studente WHERE matricola = '$matricola' and pass = '$password' ";

      $result = mysqli_query($conn, $query);

      if (mysqli_num_rows($result) > 0)
      {

          /* Store data in session variables */
          $_SESSION["loggedin"] = true;
          $_SESSION["matricola"] = $matricola;

          /* Redirect user to welcome page */
          header("location: home.php");
      }
      else
      {
          /* Display an error message if there is no row selected. */
          $err = "Credenziali non valide";
      }
      /* Close statement */
      mysqli_close($conn);
  }

}
?>

<html>
  <head>
  <title>Pagina molto sicura</title>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link rel="stylesheet" href="./css/style.css">
  </head>

  <body>
    <div class="wrapper fadeInDown">
      <div id="formContent">

        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

          <input type="text" id="matricola" class="fadeIn second" name="matricola" placeholder="matricola">
          <input type="password" id="password" class="fadeIn third" name="password" placeholder="password">

          <input type="submit" class="fadeIn fourth" value="Login">

          
        </form>
        <span class="help-block"><?php echo $err; ?></span>

      </div>
    </div>

  </body>
</html>


