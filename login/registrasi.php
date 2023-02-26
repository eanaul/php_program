<?php
//koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "login");

//cek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

//memeriksa apakah form sudah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //mengambil nilai dari form
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    //memeriksa apakah username sudah terdaftar di database
    $sql = "SELECT * FROM input WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        //jika username sudah terdaftar, tampilkan pesan error
        echo "<script>
        alert('Username sudah terdaftar');
        </script>";
        
    } else {
        //jika username belum terdaftar, lakukan pendaftaran
        $sql = "INSERT INTO input (username, password) VALUES ('$username', '$password')";
        if (mysqli_query($conn, $sql)) {
            echo "<script>
            alert('Berhasil di daftar!')
            </script>";
            header("location: login.php");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Silahkan daftar</title>

    <style>
         *, html, body{
        margin: 0;
        padding: 0;
        
        }

        body{
        background-image: url(img/seigaiha.webp);
        background-size: 2000px;
        background-repeat: no-repeat;
        }

        .kepala{
            display: flex;
            justify-content: center;
            margin-top: 200px;
        }

        .container{
            background-color: white;
            display: inline-block;
            
            overflow: hidden;
            padding: 50px 50px;
            border-radius: 10px;
            box-shadow: 0 10px 15px -3px rgb(0 0 0 / 10%), 0 4px 6px -2px rgb(0 0 0 / 5%);
            
        }

        .judul{
            text-align: center;
            margin-bottom: 30px;
            font-size: 25px;
            font-family: sans-serif;
        }

        .nav{
            padding-bottom: 20px;
        }

        .nav ul li{
            padding: 10px 5px;
            list-style: none;
            border-bottom: 2px solid royalblue;
            text-decoration: none;
        }

        .nav ul li input{
            background: none;
            outline: none;
        }

        .button{
            background-color: royalblue;
            display: inline-block;
            margin-left: 50px;
            padding: 10px 20px;
            margin-top: 20px;
            border-radius: 20px;
            justify-content: 50px;
        }

        .button:hover{
            cursor: pointer;

        }

        .button input{
            background-color: royalblue;
            color: white;
            text-decoration: none;
        }

        .btn{
            color: white;
            text-decoration: none;
            font-size: 15px;
            font-family: sans-serif;
            padding: 3px;
            border: none;
            outline: none;
            background: none;
        }

        .btn:hover{
            cursor: pointer;
        }

        .search-txt{
            border: none;
            background: none;
            outline: none;
        }

        .gambar img{
            width: 70px;
            margin-left: 55px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>



<div class="kepala">
        <div class="container">

        <div class="gambar">
            <img src="img/WIKRAMA LOGO 2.png" alt="">
        </div>

        <div class="rata">
            <h1 class="judul">Sign Up</h1>
        </div>

<form action="" method="post">
<div class="nav">

    <ul>
        <li><input class="search-txt" type="text" name="username" placeholder="Buat Username"></li>
        <li><input class="search-txt" type="password" name="password" placeholder="Buat Password"></li>
    </ul>
</div>

    <div class="button">
        <button class="btn" type="submit" name="daftar">Daftar</button>
    </div>
<center>
    <p style="text-style: italic; padding-top: 3rem;">sudah punya akun? <a href="login.php">Login</a></p>
        </center>
    </form>
  

</body>
</html>