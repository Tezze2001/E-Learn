<?php 
    session_start(); 
    require_once ('./Classi/Utente.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>E-Learn</title>

    <!-- mio stile
    <link rel="stylesheet" href="style.css"> -->
    <style>
        nav{
            display: inline;
            background-color: yellow;
        }
        .bd-navbar{
            background-color: #000 !important;
        }
    </style>
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body> 
    <?php
        if (isset($_SESSION['Utente']))
        {
            //ricava l'oggetto passato tramite sessione
            $Utente = Utente::parseJsonToUtente($_SESSION['Utente']);

            if($Utente->Tipologia =='i')
            {
                echo '
                <nav class="navbar navbar-expand-lg navbar-light bg-light bd-navbar" style="background-color: #e3f2fd;">
                    
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- sinistra -->
                        <ul class="navbar-nav mr-auto">

                        </ul>
                        <!-- destra -->
                        <ul class="navbar-nav flex-row ml-md-auto d-none d-md-flex">
                            <li class="nav-item">
                                <a class="nav-link" href="./Corsi/Crea.php">Crea un corso</a>
                            </li>
                            <li class="nav-item">                            
                                <a class="navbar-brand" href="#"><img width="50px" high="50px" src="./Immagini/'.$Utente->Icona.'" alt="Immagine di profilo"></a>
                            </li>
                        </ul>
                    </div>
                </nav> ' ;
            }
            else
            {
                echo '
                <nav class="navbar navbar-expand-lg navbar-light bg-light bd-navbar" style="background-color: #e3f2fd;">

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- sinistra -->
                        <ul class="navbar-nav mr-auto">
                            
                        </ul>
                        <!-- destra -->
                        <ul class="navbar-nav flex-row ml-md-auto d-none d-md-flex">
                            <li class="nav-item">
                                <a class="nav-link" href="#">Aggiungi un corso</a>
                            </li>
                            <li class="nav-item">                            
                                <a class="navbar-brand" href="#"><img width="50px" high="50px" src="./Immagini/'.$Utente->Icona.'" alt="Immagine di profilo"></a>
                            </li>
                        </ul>
                    </div>
                </nav> ' ;
            }
        }
        else
        {
            header('Location: ./index.php');
        }
    ?>
    <div class="container">
        
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>