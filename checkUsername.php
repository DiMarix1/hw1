
<?php 
if(!isset($_GET['q'])){
    echo "<html> <body>Non dovresti essere qui</body></html>";
}else{
$database = mysqli_connect('localhost','root','','nespresso') or die("Errore database");
$data = mysqli_real_escape_string($database,$_GET['q']);
$query = "SELECT * FROM utenti WHERE username ='".$data."'";
// echo "<html> <body> $query </body></html>";
$res = mysqli_query($database, $query);
if(mysqli_num_rows($res)>0){
    echo json_encode(array('ok' =>false));
    exit;
}else{
    echo json_encode(array('ok' =>true));
    exit;
}
}