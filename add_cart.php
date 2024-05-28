<?php
session_start();

if (!isset($_GET['q'])){
    echo "Non dovresti essere qui";
    echo "<a href='index.php'>Home</a>";
}
else if(isset($_SESSION['username'])){
    $database = mysqli_connect("localhost","root","","nespresso") or die("Errore database");
    $user = mysqli_real_escape_string($database,$_SESSION['username']);
    $prod = mysqli_real_escape_string($database,$_GET['q']);
    $qnt = $_GET['qnt'];
    //  echo "$prod". " ". "$qnt". " ". $user;

    
    $query = "INSERT INTO cart VALUE(0,'".$user."',".$prod.",".$qnt.")";
    if(mysqli_query($database, $query)){
        echo json_encode(array('ok' => true,'id' =>$prod)); 
        $query= "UPDATE articoli SET quantita=quantita-".$qnt." WHERE id=".$prod;
        mysqli_query($database, $query);
    }else{
        echo json_encode(array('ok'=> false));
    }
}else{
    echo json_encode(array('ok' => false));
}