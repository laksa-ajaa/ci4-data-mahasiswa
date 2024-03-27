<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    .container {
        padding: 30px;
        width: 500px;
        height: 400px;
        background-color: lightblue;
        border-radius: 10px;
        margin: auto;
    }
    .container h1{
        text-align: center;
    }
    </style>
</head>
<body>
    <div class="container">
    <h1>Biodata</h1>
    <p>Nama: <?= $nama ?></p>
    <p>Alamat: <?= $alamat ?></p>
    <p>Umur: <?= $umur ?></p>
    <p>Prodi: <?= $prodi ?></p>
    <p>Cita-Cita: <?= $cita2 ?></p>
    </div>
</body>
</html>