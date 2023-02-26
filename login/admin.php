<?php
session_start();

if( !isset($_SESSION["submit"])){
    header("location: login.php");
    exit;
}

$server = mysqli_connect("localhost", "root", "", "login");

$sql = "SELECT * from datasiswa";

$result = mysqli_query($server, $sql);
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Ini link css nya -->
    <link rel="stylesheet" href="admin.css"> </link>

    <!-- buat font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300&display=swap" rel="stylesheet">
    <title>Selamat Datang</title>
  </head>
  <body>
    <!-- NAVBAR -->
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
<div class="container">
    <a class="navbar-brand" href="#">Howdy?</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="logout.php">Log Out</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Features</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Pricing</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled">Disabled</a>
        </li>
      </ul>
    </div>
  </div></div>
</nav>

    <!-- AKHIR NAVBAR -->

    <!-- JUMBOTRON -->
    <?php if(mysqli_num_rows($result) > 0) { ?>
    <?php while($display = mysqli_fetch_assoc($result)) { ?>

    <section class="jumbotron text-center">
        <h2 class="display-4">Selamat datang, Admin !</h2>
        <img src="img/2544.webp" alt="lebron" width="250px">
  <h1 class="display-5"> <?php echo $display["nama"] ?> </h1>
  <p class="lead"><?php echo $display["nis"] ?> | <?php echo $display["rombel"] ?> | <?php echo $display["rayon"] ?> </p>
  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#ffff" fill-opacity="1" d="M0,64L48,106.7C96,149,192,235,288,240C384,245,480,171,576,122.7C672,75,768,53,864,69.3C960,85,1056,139,1152,149.3C1248,160,1344,128,1392,112L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>

  <?php } ?>
<?php }?>
</section>
    <!-- AKHIR JUMBOTRON -->



<!-- Konfigurasi database nilai -->

    <?php

$server = mysqli_connect("localhost", "root", "", "login");

$sql = "SELECT * from nilai";

$result = mysqli_query($server, $sql);

?>

<!-- akhir konfigurasi database nilai -->


    <!-- tabel -->
    <div class="tabel">
    <center>
    <?php if(mysqli_num_rows($result) > 0) { ?>
    <?php while($display = mysqli_fetch_assoc($result)) { ?>

        <h1 class="pb-5">Daftar Nilai</h1>
.
    <table class="table table-hover w-50 p-3 mb-5 " style="background-color: #e2edff;">
        <tr>
            <th>Mapel</th>
            <th>Nilai</th>
        </tr>
        <tr>
            <td>Produktif</td>
            <td><?php echo $display["Produktif"] ?></td>
        </tr>
        <tr>
            <td>Matematika</td>
            <td><?php echo $display["Matematika"] ?> </td>
        </tr>
        <tr>
            <td>Bahasa Indonesia</td>
            <td><?php echo $display["Indonesia"] ?> </td>
        </tr>
        <tr>
            <td>PIPAS</td>
            <td><?php echo $display["PIPAS"] ?></td>
        </tr>
    </table>
</div>
    <?php } ?>
<?php }?>
</center>
</div>
    <!-- akhir table -->


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>