<?php
    session_start();
    $noUser=0;
    if(isset($_SESSION['username'])){
        header("Location: index.php");
        exit;
    }

    if(isset($_POST['username']) && isset($_POST['password'])){
        // l'utente ha inserito dei dati, controllo nel db
        $database = mysqli_connect("localhost","root","","nespresso") or die("ErrorConnection");
        $username = mysqli_real_escape_string($database,$_POST['username']);
        $password = mysqli_real_escape_string($database,$_POST['password']);
        // implementiamo la ricerca di (utente,password)
        // si potrebbe aggiungere di informare l'utente se la password è errata
        $query = "SELECT * FROM utenti WHERE username='".$username."'";
        $result = mysqli_query($database, $query);
        if(mysqli_num_rows($result)>0){
            $row = mysqli_fetch_assoc($result);        
            if(password_verify($password,$row['password'])){
            // ho trovato riscontro
                $_SESSION['username'] = $_POST['username'];
                header("Location: index.php");
                exit;
        }
        }
        else{
            $noUser=1;
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src=login.js defer></script>
    <link rel="stylesheet" href="login.css">
    <title>Document</title>
</head>
<body>
    <main>
        <h1>Accedi al tuo account</h1>
        <form name="login_form" method="post">
            <p>
                <label >Username <input type="text" name="username"></label>
                <span class="error, hidden" id="user">E inserisci qualcosa</span>
            </p>
            <p>
                <label>Password <input type="password" name="password"></label>
                <span class="error, hidden" id="pass">Questa la devi proprio inserire</span>
            </p>
            <p class="submit">
                <label>&nbsp;<input type='submit'></label>
            </p>
        </form>
        <?php
            if($noUser){
                echo "<span class='error'>Username non riconosciuto</span>";
                echo " <a href='signup.php'>Registrati</a>";
            }
        ?>
        <p <?php if($noUser) {echo "class='hidden'"; } ?>>Oppure <a href="signup.php">Registrati</a></p>
        <a href="index.php">Home</a>
    </main>
</body>
</html>