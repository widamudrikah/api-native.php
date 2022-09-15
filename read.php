<?php

include 'koneksi.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minuman Enak</title>
</head>
<body>
    
    <h1>Minuman Enak</h1>

    <table border="1">
        <tr>
            <th>Id Minuman</th>
            <th>Nama</th>
            <th>Harga</th>
        </tr>
        <?php
        $data = mysqli_query($koneksi, "SELECT * FROM minuman");
        while($minuman = mysqli_fetch_array($data)){
        ?>

        <tr>
            <td><?php echo $minuman['id_minuman']?></td>
            <td><?php echo $minuman['nama']?></td>
            <td><?php echo $minuman['harga']?></td>
        </tr>

        <?php
        }
        ?>
    </table>

</body>
</html>