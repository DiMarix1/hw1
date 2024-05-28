<?php
if (isset($_GET['q'])){
    
    $database = mysqli_connect('localhost','root','','nespresso') or die("Errore di connessione al database");
    $name=mysqli_escape_string($database,$_GET['q']);
    $cost =$_GET['cost'];
    $qnt = mysqli_escape_string($database,$_GET['qnt']);
    $link = mysqli_escape_string($database,$_GET['link']);
    $query = "INSERT INTO articoli value(0,'".$name."',".$cost.",".$qnt.",'https://www.nespresso.com".$link."')";

    if(mysqli_query($database,$query)){
    echo json_encode(array('ok' => true));
    exit;
    } else{
        echo json_encode(array('ok' =>false));
    }

    mysqli_close($database);
} else{
    echo "<html>
            Non dovresti vedere questa pagina.
            </html>";
    exit;   
}
