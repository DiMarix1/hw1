<?php 
    session_start();

    // $_SESSION['username'] = 'dimax';
    if(!isset($_SESSION['username'])){
        echo "<html> 
            <body> 
            <p class='nouser'>Nessun utente rilevato <br>
            Esegui il login <br>
            <a href='login.php'>Accedi</a>
            </p>
            </body>
        </html>";
        
    }
    else{
    $user_id = $_SESSION['username'];
    $database = mysqli_connect('localhost','root','','nespresso') or die('Errore database');
    
    $query = "SELECT item_id, count(qnt) AS qnt FROM cart WHERE user_id='".$user_id."' GROUP BY(item_id)";
    $cart = mysqli_query($database, $query);
    if(mysqli_num_rows($cart) === 0){
        echo"<html>";
        echo"<p>L'utente non ha carrelli</p>";
        echo"<a href='shop.php'>Vai allo shop</a>";
        echo"</html>";
        
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cart.css">
    <title>Carrello di <?php 
    if(!isset($_SESSION['username']))
        echo " nessuno";
    else
        echo $user_id;
    ?></title>
</head>
<body>
    <h1>Carrello </h1>
    <p>Continua ad acquistare
        <a id ='shop' href="shop.php">Negozio</a>
    </p>

    <section id="show">
        <?php 
        if(isset($_SESSION['username'])){
            $parziale0;
            while($row = mysqli_fetch_assoc($cart)){
                $query = "SELECT nome,img, prezzo FROM articoli WHERE id=".$row['item_id']."";
                $res = mysqli_query($database, $query);
                $name = mysqli_fetch_assoc($res);
                $cost_item = $row['qnt']*$name['prezzo'];
                // echo $name;
                echo "<p class='cart_item'>";
                echo "Hai aggiunto ".$name['nome']." per ".$row['qnt']." unità <br>";
                echo "Spenderesti ".$cost_item." euro";
                echo "<img src='".$name['img']."'>";
                // echo"<br>";
                echo "</p>";
                $_parziale=$parziale + $cost_item;
            }
        }
        ?>
    </section>
    <section id="total">
        <p>Totale: <?php if(isset($_SESSION['username'])) 
                            echo $parziale;
                        else
                            echo "0 ";?> euro</p>
    </section>
    
</body>
</html>