 <?php
    session_start();
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <script src="index.js" defer></script>
    <script src ="forecast.js" defer></script>
    <script src ="spotify.js" defer></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kaisei+Opti&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">



    <title>NespressoDiMaria</title>
</head>
<body>
    <header>
        <!-- Contiene i due elementi sempre fissi nella pagina -->
        <div id="sped">
            <span>SPEDIZIONE GRATUITA PER TUTTI GLI ORDINI DI CAFFÈ CON PIÙ DI 100 CAPSULE </span>
                <a href=""> ORDINA ORA</a>
        </div>
        <div id="barra">
            <div id="logo">
                <a href="#"><img id="logowhite" src="media/logo-white.svg"></a>
            </div>
            <span id="cose">
                <a id="searcbar"href="#"><img src="media/search.svg" alt="">Cerca</a>
                <a id="accountLogin" ><img src="media/account.svg" alt="">
                <?php
    if(isset($_SESSION["username"])) 
        echo $_SESSION["username"];
    else echo "Accedi"; ?></a>
                <a href="cart.php"><img src="media/cart.svg" alt="">Carrello</a>
            </span>
        </div>

        <!-- Relativa alla pagina di login -->
        <div class="flexCol, hidden" id="loginPage">
            <span>ACCEDI</span>
            <span>Accedi al tuo account ed effetua un ordine</span>
            <form id="userData">
                Inserisci email e password
                <input type="text" id="mail">
                <input type="text" id="password">
                <input type="submit" value="Accedi">
            </form>

            <a href="#">Password dimenticata?</a>
            <div>
                <input type="checkbox" name="" id="">
                <a href="#">Ricordami</a>
            </div>
            <a href="login.php">ACCEDI ></a>
            <?php
            if(isset($_SESSION['username']))
                echo "<a href='logout.php'>Esci</a>";
    ?>
                <span>Non hai ancora un account?</span>
            <a href="signup.php">Registrati subito  ></a>
        </div>


        <!-- menù versione mobile -->
        <nav id="mobile">
            <div></div>
            <div></div>
            <div></div>
        </nav>

    </header>
    <!-- Navigation bar del sito -->
    <nav>
            <a >Caffe</a>
            <a >Macchine</a>
            <a >Accessori</a>
            <a >Easy</a>
            <a >Promozioni</a>
            <a >Ricette</a>
            <a >Sostenibilità</a>
            <a >Assistenza</a>
            <a >Dove siamo</a>
            <a >Professional</a>
    </nav>
    <!-- Immagine a tutto schermo con testo di sopra -->
    <div id="banner">
        <div>
            <h1>GIFTING DAYS</h1>
            <p>Con la primavera arrivano nuovi regali, <br>
            ricevili acquistando i nostri caffe.
            </p>
            <a>ACQUISTA ORA</a>
        </div>

    </div>
    <!-- Contieni i tre elementi con le novità, display flex per colonna -->
    <div id="scopri">
        <div id="primo">
            <div>
            <h2>ENTRA NEL MONDO <br> NESPRESSO CON <br> <strong>EASY MACCHINA</strong></h2>
            <p>Scopri i nostri piani di abbonamento Easy <br>
                Macchina a partire da <strong>19 € al mese</strong>
            </p>
            <a> SCOPRI</a>
            </div>
            <img class="terna" src="media/easy.avif">
        </div>
        <div id="secondo">
            <div>
                <h2>RENDI UNICO <br>
                IL TUO <strong>REGALO</strong>
                </h2>
                <p>
                    Scopri le idee regalo Nespresso per la <br>
                    <strong>festa del papà</strong> e <strong>personalizza</strong>
                    la vostra <br> pausa caffè.
                </p>
                <a> SCOPRI</a>
            </div>
            <img class="terna" src="media/regalo.avif" alt="">
        </div>
        <div id="terzo">
            <div>
                <h2>SCEGLI UNA <br> MACCHINA <br> <strong>RICONDIZIONATA</strong>
                </h2>
                <p>Rimetti in circolo valore riutilizzando <br>
                risorse esistenti. <br>
                Fai una scelta ancora più <strong>sostenibile</strong> <br>
                acquistando una macchina <strong>ricondizionata.</strong>
            </p>
            <a>SCOPRI</a>
            </div>
            <img class="terna" src="media/reuse.avif" alt="">
        </div>
    </div>

    <div class="text">
        <h1>NON PERDERTI LE NOVITÀ</h1>
    </div>

    <!-- Non è uno slider effettivo ancora perchè serve un'animazione, fa da vetrina al momento -->
    <div id="slider">

        <div class="elemento">
            <img src="media/vivida.avif" alt="">  
            <p>Vividà</p>
            <p>Cereali, dolci e biscotti</p>
            <a class="onClick">Scopri di più</a>
            <span>€ 0,70</span>
            <a class="add" >AGGIUNGI</a>  
                    <!-- Primo elemento che non si deve vedere -->
                    <div class="news , flexCol , hidden">
                        <div class="space">
                            <!-- contiene il testo -->
                            <h3>Vividà</h3>
                            <button class="close">X</button>
                        </div>
                        <div class="flexRow">
                            <img src="media/vivida.avif" alt="">
                            <span>Cereali, dolce e biscotti</span>
                        </div>
                        <h4>Profilo Aromatico</h4>
                        <span>Note biscottate, cereali</span>
                        <div>
                            <a >Maggiori informazioni sul prodotto</a>
                        </div>
                        <div class="space">
                            <span>€ 0,70</span>
                            <button>+</button>
                        </div>
                    </div>
        </div>
        

        <div class="elemento">
            <img src="media/maple.avif" alt="">
            <p>Maple Pecan</p>
            <p>Sciroppo d'acero & Noci Pecan</p>
            <a class="onClick">Scopri di più</a>
            <span>€ 0,70</span>
            <a class="add">AGGIUNGI</a>

            <!-- Elemento nascosto -->
            <div class="news , flexCol , hidden">
                <div class="space">
                    <!-- contiene il testo -->
                    <h3>Maple</h3>
                    <button class="close">X</button>
                </div>
                <div class="flexRow">
                    <img src="media/maple.avif" alt="">
                    <span>Sciroppo d’acero &<br> Noci Pecan</span>
                </div>
                <h4>Profilo Aromatico</h4>
                <span>Sciroppo d'acero, noci pecan</span>
                <div>
                    <!-- Se inserisco href="#" non ricarica
                    la pagina ma torna semplicemente in alto -->
                    <a >Maggiori informazioni sul prodotto</a>
                </div>
                <div class="space">
                    <span>€ 0,70</span>
                    <button>+</button>
                </div>
            </div>


        </div>



        <div class="elemento">
            <img src="media/dharkan.avif" alt="">
            <p>Dharkan</p>
            <p>Cacao e Cereali Tostati</p>
            <a class="onClick">Scopri di più</a>
            <span>€ 0,55</span>
            <a class="add">AGGIUNGI</a>

            
            <!-- elemento nascosto -->
            <div class="news , flexCol , hidden">
                <div class="space">
                    <!-- contiene il testo -->
                    <h3>Dharkan</h3>
                    <button class="close">X</button>
                </div>
                <div class="flexRow">
                    <img src="media/dharkan.avif" alt="">
                    <span>Cereali tostati &<br> e miele</span>
                </div>
                <h4>Profilo Aromatico</h4>
                <span>Cereali tostati</span>
                <div>
                    <!-- Se inserisco href="#" non ricarica
                    la pagina ma torna semplicemente in alto -->
                    <a >Maggiori informazioni sul prodotto</a>
                </div>
                <div class="space">
                    <span>€ 0,70</span>
                    <button>+</button>
                </div>
            </div>
        </div>
 
    </div>

    <!-- Per dare l'impressione di poter scorrere le immagini di sopra -->
    <div class="buttons">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
    </div>
    <!-- Programma fedeltà e immagine dinamica -->
    <div id="account">
        <div id="scritta">
            <h3>I VANTAGGI DEL NOSTRO PROGRAMMA FEDELTÀ</h3>
            <p>Accedi e resta sempre aggiornato sui vantaggi legati al tuo status</p>
            <a href="login.php"id="accesso" ><strong>ACCEDI AL TUO ACCOUNT</strong></a>
            <a id="more" >Scopri Nespresso&More</a>
        </div>
        <div id="dinamico">
            <img src="media/ambasci.png" alt="">
        </div>
    </div>

    <!-- Altro div con 3 elementi all'interno -->
    <div id="tris">
        <h2>
            QUAL È LA DIFFERENZA IN UN CAFFÈ NESPRESSO?
        </h2>
        <div class="container">
            <div>
                <img src="media/bcorp.avif" alt="">
                <h3>DOING IS EVERYTHING</h3>
                <p>Sostenibilità sociale e ambientale fanno la differenza.</p>
                <p>
                <a>Scopri di più</a>
                </p>
            </div>
            <div>
                <img src="media/chicco.avif" alt="">
                <h3>DA CHICCO A CHICCO</h3>
                <p>Il processo di produzione e lavorazione del caffè fa la differenza.</p>
                <p>
                    <a>Scopri di più</a>
                </p>
            </div>
            <div>
                <img src="media/itali.avif" alt="">
                <h3>NESPRESSO PER L'ITALIA</h3>
                <p>L'impegno verso il paese che amiamo fa la differenza.</p>
                <p>
                    <a>Scopri di più</a>
                </p>
            </div>
        </div>
    </div>



<!-- Per le API del meteo -->
    <section id="forecast">
        <h4>Scopri il meteo delle zone di produzione!</h4>
        <form name ="forecast" id="forecast_form" method="post">
            <select name="selected" id="city">
                <option value="Brasilia">Brasile</option>
                <option value="Bogotà">Colombia</option>
                <option value="El Salvador">El Salvador</option>
                <option value="Hanoi">Vietnam</option>
            </select>
            <!-- <input type="search" name="" id="city"> -->
            <input type="submit" value="Scopri!">
        </form>

        <div id="mostra" class="hidden">
            
        </div>
    </section>

<!--  -->

    <section id="spotify">
        <h3>Canzoni del momento nel paese</h3>
        <div id="show" class="hidden">
            
        </div>
    </section>

    <!-- Banner centrato lavora con noi -->
    <div id="work">
        <div>
        <h3>UNISCITI AL <br> NOSTRO TEAM</h3>
        <p>Scopri le opportunità <br>
        di carriera in Nespresso</p>
        <a href="">SCOPRI DI PIÙ</a>
        </div>    
    </div>

    <!-- metodi di pagamento -->
    <div id="pay">
        <span>100% PAGAMENTI SICURI</span>
        <img src="media/Mastercard-Log.png" alt="">
        <img src="media/apple.jpg" alt="">
    </div>

    <!-- Contiene le quattro colonne prima del footer -->
    <div id="quad">
        <div>
            <h4>Prodotti</h4>
            <a href="">Capsule caffè</a>
            <a href="">Macchine</a>
            <a href="">Accessori</a>
            <a href="">Piani di abbonamento Easy</a>
            <a href="">Promozioni per te</a>
        </div>
        <div>
            <h4>Di più su Nespresso</h4>
            <a href="">Dove siamo</a>
            <a href="">Doing is everything</a>
            <a href="">Programma fedeltà</a>
            <a href="">Lavora con noi</a>
            <a href="">Nespresso Professional</a>
        </div>
        <div>
            <h4>Assistenza</h4>
            <a href="">Servizi</a>
            <a href="">Assistenza Macchine</a>
            <a href="">FAQ</a>
            <a href="">Registra la tua macchina</a>
            <a href="">App Nespresso</a>
        </div>
        <div>
            <h4>Contattaci</h4>
            <p>
            <a href=""><img src="media/smartphone.svg" alt="">Whatsapp</a>
            <br> Da lunedì a domenica, dalle 8:00 alle 22:00
            </p>    
            <p>
                <a href=""><img src="media/chat.svg" alt="">Live chat</a>
                <br>Dalle 8:00 alle 22:00 <br>
                Effettua il login per accedere
            </p>
            <p>
                <a href=""><img src="media/call.svg" alt="">Chiamaci <br> 800 39 20 29</a>
                Disponibile 24/7 <br>
                Numero Verde gratuito
            </p>
        </div>
    </div>

    <!-- Promo app -->
    <div id="apps">
        <span>Ordina più velocemente con la nostra App</span>
        <a><img src="media/android.png" alt=""></a>
        <a href=""> <img src="media/applelogoo.png" alt=""></a>
    </div>

    <footer>
        <div>
            <a href="">Note legali</a>
            <a class="center"href="">Contatti</a>
            <a href="">Regolamenti</a>
        </div>
        <div id="sub">
            <span>Italiano</span>
            <span>
                <a href="">Cookies</a>
                <a class="center" href="">Accessibilità</a>
                <a href="">Mappa sito</a>
                <a class="center" href="">Lavora con noi</a>
                <a href="">Segnalazioni</a>
            </span>
        </div>
        <div id="largo">
            <div>Follow Nespresso on</div>
            <div><a href="#">Torna su <img src="media/north.svg" alt=""></a></div>
            <div><a href="main.html"><img id="logowhite" src="media/logo-white.svg"></a>
                Nestlè Nespresso S.A. 2024
            </div>
        </div>
    </footer>
</body>
</html>