<?php 
    session_start();
    if(!isset($_SESSION['username'])){
echo "<html> 
        <body>
        <p>
            Per favore, accedi per poter inserire un nuovo prodotto.
        </p>";        
echo "<a href='login.php'>Accedi</a>";
echo "</body>
    </html>";
    
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="new_prod.js" defer></script>
    <link rel="stylesheet" href="new_prod.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserimento</title>
</head>

<?php

if(isset($_SESSION['username']))
{
echo"<body>";
echo"    <section id='nuovo_inserimento'>
        <h1>Inserisci un nuovo prodotto</h1>
        <form name='inserimento' method='GET'>
            <label>Nome prodotto<input type='text' name='prod_name' id='name'></label>
            <label>Costo unitario<input type='text' name='cost'></label>
            <label>Quantità disponibile<input type='text' name='quantita'></label>
            <label>Immagine <input type='text' name='link'></label>
            <label>&nbsp;<input type='submit' value='Inserisci'></label>
          </form>";
          echo" <p class='success, hidden' id='element'>
            Inserimento avvenuto con successo! <br>
            <a href= 'shop.php'>Vai allo shop</a>
          </p>
    </section>
    
    <a href= 'shop.php'>Vai allo shop</a>
    
</body>";
}
?>
</html>