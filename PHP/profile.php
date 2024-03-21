<?php
require_once "../assert/vendor/autoload.php";
$databaseConnection = new MongoDB\Client;
$myDatabase = $databaseConnection->guvi;
$userCollection = $myDatabase->profile;

if(isset($_POST['insert'])){
    $name = $_POST["name"];
    $dob = $_POST["dob"];
    $contact = $_POST["contact"];
    $address = $_POST["address"];
    $data = array(
        "Name"=> $name,
        "Dob"=>$dob,
        "Contat"=>$contact,
        "address"=>$address
    );

    $insert = $userCollection->insertOne($data);

    if($insert){
        echo "<div class='alert alert-success'>Successfully registered</div>";
    }
    else{
        echo "<div class='alert alert-danger'>Try again</div>";
    }
}

if(isset($_POST['update'])){
    $name = $_POST["name"];
    $dob = $_POST["dob"];
    $contact = $_POST["contact"];
    $address = $_POST["address"];

    $data = array('$set'=>array(
        "Name"=>$name,
        "Dob"=>$dob,
        "Contat"=>$contact,
        "address"=>$address
    ));
    $update = $userCollection->updateOne(array('Email' => $email), $data);

    if($update){
        echo "<div class='alert alert-success'>Update successful</div>";
    }
    else{
        echo "<div class='alert alert-danger'>Not updated</div>";
    }
}
?>