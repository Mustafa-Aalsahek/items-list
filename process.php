<?php

session_start();

$mysqli= new mysqli("localhost","root","mypass123","mikro") or die(mysqli_error($mysqli));

$id =0;
$update= false;
$item='';
$price='';
$vat='';
$lisaa='';
$kate='';

if(isset($_POST['save'])){
    $item= $_POST['item'];
    $price= $_POST['price'];
    $vat = (($price)*1.24);
    $lisaa=$_POST['lisaa'];
    $kate= $vat + (($lisaa)*0.01*($vat));
    
    $mysqli->query("INSERT INTO lista (item,price,vat,lisaa,kate) VALUES ('$item','$price','$vat','$lisaa','$kate')") or die($mysqli->error);
    
    $_SESSION['message']= "item has been saved!";
    $_SESSION['msg_type']= "success";
    
    header("location: index.php");
}

if(isset($_GET['delete'])){
    $id= $_GET['delete'];
    $mysqli->query("DELETE FROM lista WHERE id=$id") or die($mysqli->error());
    
    $_SESSION['message']= "Item has been deleted!";
    $_SESSION['msg_type']= "danger";
    
    header("location: index.php");
}

$summa= $mysqli->query("SELECT SUM(vat) AS totalsum FROM lista") or die($mysqli->error());

$row = mysqli_fetch_assoc($summa); 

$sum = $row['totalsum'];


  /*  if(isset($_GET['sum'])){
    $id= $_GET['sum'];
    $mysqli->query("SELECT SUM(vat) FROM lista") or die($mysqli->error());
    
    header("location: index.php");
}    */

if(isset($_GET['edit'])){
    $id= $_GET['edit'];
    $update = true;
    $result= $mysqli->query("SELECT * FROM lista WHERE id=$id") or die($mysqli->error());
    if(count($result)==1){
        $row= $result->fetch_array();
        $item= $row['item'];
        $price= $row['price'];
        $vat= $row['vat'];
        $lisaa=$row['lisaa'];
        $kate=$row['kate'];
    }
}


if(isset($_POST['update'])){
    $id= $_POST['id'];
    $item= $_POST['item'];
    $price=$_POST['price'];
    $vat = (($price)*1.24);
    $lisaa=$_POST['lisaa'];
    $kate= $vat + (($lisaa)*0.01*($vat));
    
    
   $mysqli->query("UPDATE lista SET item='$item' , price='$price',vat='$vat',lisaa='$lisaa',kate='$kate' WHERE id=$id") or die($mysqli->error);
    
    $_SESSION['message'] = "item has been updated";
    $_SESSION['msg_type'] = "warning";
    
    header('location: index.php');
}




?>