<?php
/* Inizializza la sessione */
session_start();

/* Controllo del login */
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
  header("location: index.php");
  exit;
}
require_once "conn.php";

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
    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand text-white" href="home.php">Safe Site</a>
      <a class="navbar-brand text-white" href="profile.php">Profilo</a>
      <div class="d-flex align-items-center">
        <a href="logout.php" class="btn btn-link px-3 me-2 text-white">
          Logout
        </a>
      </div>
    </nav>

    <section class="jumbotron text-center">
        <div class="container">
          <h1 class="jumbotron-heading">Profilo, <?php echo $_SESSION["matricola"]; ?></h1>
          <p class="lead text-muted">Modifica idirizzo</p>

          <form class="justify-content-center" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

            <div class="form-floating">
                <input type="text" class="form-control" id="citta" name="citta" placeholder="città">
                <label for="floatingPassword">Città</label>
            </div>
            <div class="form-floating">
                <input type="text" class="form-control" id="citta" name="via" placeholder="via">
                <label for="floatingPassword">Via</label>
            </div>

            <button type="submit" class="btn btn-primary mb-2">Modifica</button>
          </form>
        </div>
    </section>

      <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
          if (!empty(trim($_POST["citta"])) and !empty(trim($_POST["via"]))){

            $citta = trim($_POST["citta"]);
            $via = trim($_POST["via"]);
            $matricola = $_SESSION["matricola"];

            // Variabile $corso vulnerabile a SQL injection

            $query = "DELETE FROM indirizzo WHERE studente = '$matricola'; INSERT INTO indirizzo (studente, citta, via) values ($matricola, '$citta', '$via')";

            if ($result = mysqli_multi_query($conn, $query)) {
                echo "indirizzo modificato correttamente";
            } else {
                echo $error = "Operazione non riuscita!";
            }

            /* Chiudi connessione */
            mysqli_close($conn);
          }
          else {
            echo "nessun corso disponibile";
          }
        }

      ?>



  </body>
</html>

