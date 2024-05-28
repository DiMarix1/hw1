<?php 
session_start();


$database = mysqli_connect("localhost","root","","nespresso") or die("Errore database");
$query = "SELECT * FROM articoli";
$result = mysqli_query($database, $query);


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="shop.css">
    <script src="shop.js" defer></script>
    <title>Shop</title>
</head>
<body>
    <header>
        <h1><?php if(isset($_SESSION['username']))
            echo $_SESSION['username'];
        else
            echo "Ciao"?>, scegli il prodotto che ti interessa</h1>

<p>
    <a href="cart.php">Visualizza carrello</a>
</p>
    </header>
<section id="showroom">
<?php 
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {

        $src = $row["img"];
        echo
            "<div class='element' >
                <img src='".$src."'>
                <p class='titolo'>
                ".$row['nome']."<br> €".$row['prezzo']."
                </p>
                <p>
                Quantità disponibile: ".$row['quantita']."
                </p>
                <p id='".$row['id']."'>
                    <a class='add' href='#'>Aggiungi</a>                
                </p>
            </div>  ";

    }
} else {
    echo "Database non ha dato risultati";
    exit;
}

?>

</section>

<footer>
    <p>Sei un admin? 
       Inserisci nuovi prodotti <br>
       <a href="new_prod.php">Nuovo</a>
    </p>

</footer>

<?php
mysqli_close($database);

?>
    
</body>
</html>