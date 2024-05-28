<?php
    // La registrazione può avvenire solo se non è già attiva una sessione
    session_start();
    if(isset($_SESSION["username"])){
        header("Location: index.php");
        exit;
    }

    // verifico se il form è stato utilizzato
    if(isset($_POST['username']) && isset($_POST['password'])){
        // collegamento al database
        $database = mysqli_connect("localhost","root","","nespresso") or die("ErrorConnection");
        // controllo che i dati non siano già presenti nel db
        $username =mysqli_real_escape_string($database,$_POST['username']);
        $password= password_hash(mysqli_real_escape_string($database,$_POST['password']),PASSWORD_DEFAULT);
        $name= mysqli_real_escape_string($database, $_POST['nome']);
        $cognome = mysqli_real_escape_string($database, $_POST['cognome']);
        $email = mysqli_real_escape_string($database, $_POST['email']);

            $query="INSERT INTO utenti VALUE('".$name."','".$cognome."','".$email."','".$username."','".$password."')";
            $res = mysqli_query($database, $query);
            if($res){
                $_SESSION['username']=$_POST['username'];
                $_SESSION['nome']=$_POST['nome'];
                
                mysqli_close($database);
                header("location: login.php");
                exit;
            } else{
                echo "<html> <body> Errore nella registrazione</body></html>" ;
            }
        }
    



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="signup.css">
    <script src="signup.js" defer></script>
    <title>Registrati</title>
</head>
<body>
    <h1>Registrati per non perdere le nostre offerte</h1>
</h1>
   
    <main>
        <form name="signup" method="POST">
            <p class="element">
                <label>Nome <input type="text" name="nome" id="nome"></label>
                <span class="error">Dai, come dobbiamo chiamarti?</span>                    
            </p>
            <p class="element">
                <label>Cognome <input type="text" name="cognome" id="cognome"></label>
                <span class="error">E questo perché no?</span>
            </p>
            <p class="element">
                <label>Email <input type="text" name="email" id="email"></label>
                <span class="error">Non potremo inviarti le nostre offerte!</span>
            </p>
            <p class="element">
                <label>Username <input type="text" name="username" id="username"></label>
                <span class="error">Username già in uso</span>
            </p>
            <p class="element">
                <label >Password <input type="password" name="password" id="password"></label>
                <span class="error" id="short">Password troppo corta!</span>
                <span class="error" id="char">Password deve contenere caratteri speciali!</span>
            </p>
            <p class="element">
            <label >Conferma password <input type="password" name="password2" id="password2"></label>
            <span class="error" id="pass2">Le due password non coincidono!</span>
            </p>
            <p class="submit">
                <label>&nbsp;<input type='submit'></label>
            </p>

    </main>
</body>
</html>