<?php
/* Inizializza la sessione */
session_start();

/* Controlla se l'utente è bloccato */
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
      <a class="navbar-brand text-white">Safe Site</a>
      <a class="navbar-brand text-white" href="profile.php">Profilo</a>
      <div class="d-flex align-items-center">
        <a href="logout.php" class="btn btn-link px-3 me-2 text-white">
          Logout
        </a>
      </div>
    </nav>

    <section class="jumbotron text-center">
        <div class="container">
          <h1 class="jumbotron-heading">Benvenuto <?php echo $_SESSION["matricola"]; ?></h1>
          <p class="lead text-muted">Visualizza i corsi disponibili</p>
          <form class="form-inline justify-content-center" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="form-group mx-sm-3 mb-2">
              <label for="inputPassword2" class="sr-only">Corso di studi</label>
              <input type="text" class="form-control" id="corso" name="corso" placeholder="corso di studi">
            </div>
            <button type="submit" class="btn btn-primary mb-2">Cerca</button>
          </form>
        </div>
    </section>

      <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
          if (!empty(trim($_POST["corso"]))){
            $corso = trim($_POST["corso"]);

            // Variabile $corso vulnerabile a SQL injection


            $query = "SELECT nome, cfu FROM corso WHERE nome LIKE '%$corso%'";

          if ($result = mysqli_query($conn, $query)) {
              echo "<div class='row justify-content-center'>";
              echo '<table class="table justify-content-center" style="width:50%"> 
                <thead class="thead-dark">
                  <tr> 
                      <th> <font scope="col">Corso</font> </th> 
                      <th> <font scope="col">CFU</font> </th> 
                  </tr>
                </thead>
                <tbody>'
              ;
              while ($row = $result->fetch_assoc()) {
                  $field1name = $row["nome"];
                  $field2name = $row["cfu"];
                  echo '<tr> 
                            <td>'.$field1name.'</td> 
                            <td>'.$field2name.'</td> 
                        </tr>';
              }
              echo '</tbody></table></div>';
              $result->free();
          } 

            /* Chiusura della connessione */
            mysqli_close($conn);
          }
          else {
            echo "nessun corso disponibile";
          }
        }

      ?>



  </body>
</html>

