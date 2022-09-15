<?php

require_once "koneksi.php";

if(function_exists($_GET['function'])){
    $_GET['function']();
}

function getMinuman(){

    global $koneksi;
    $query = mysqli_query($koneksi, "SELECT * FROM Minuman");
    while($data = mysqli_fetch_object($query)){
        $Minuman[]=$data;
    }

    $respon = array(
        'status'    => 1,
        'message'   => 'succes get minuman',
        'minuman'   => $Minuman
    );

    header('content-type: application/json');
    print json_encode($respon);
}

function addMinuman(){

    global $koneksi;

    $Parameter = array(
        'Nama'=> '',
        'Harga'=> ''
    );

    $cekData = count(array_intersect_key($_POST, $Parameter));

    if($cekData == count($Parameter)){

        $nama   = $_POST['Nama'];
        $harga  = $_POST['Harga'];

        $result = mysqli_query($koneksi, "INSERT INTO Minuman VALUES('', '$nama', '$harga')");

        if($result){
            return message(1, "insert data $nama sucess");
        }else{
            return message(0, "insert data failed");
        }
    }else{
        return message(0, "parameter salah");
    }

}

function message($status, $msg){

    $respon = array(
        'status'    => $status,
        'message'   => $msg
    );
    header('content-type: application/json');
    print json_encode($respon);

}
//http://localhost/tugas/api.php?function=updateMinuman&id={}
function updateMinuman(){

    global $koneksi;

    if(!empty($_GET['id_minuman'])){
        $id_minuman = $_GET['id_minuman'];
    }

    $parameter = array(
        'nama'  => "",
        'harga' => ""
    );

    $cekData = count(array_intersect_key($_POST, $parameter));

    if($cekData == count($parameter)){
        $nama   = $_POST['nama'];
        $harga  = $_POST['harga'];

        $result = mysqli_query($koneksi, "UPDATE minuman SET nama='$nama', harga='$harga' WHERE id_minuman='$id_minuman'");

        if($result){
            return message(1, "update data $nama sucess");
        }else{
            return message(0, "update data failed");
        }
    }else{
        return message(0, "parameter salah");
    }
}

function deleteMinuman(){

    global $koneksi;

    if(!empty($_GET['id_minuman'])){
        $id_minuman = $_GET['id_minuman'];
    }

    $result = mysqli_query($koneksi, "DELETE FROM minuman WHERE id_minuman='$id_minuman'");

    if($result){
        return message(1, "Delete data success");
    }else{
        return message(0, "Delete data failed");
    }
}

?>