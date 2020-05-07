<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- mio stile -->
    <link rel="stylesheet" href="style.css">

    <!-- bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Moodle</title>
</head>
<body class="text-center">
    <?php //t= metodo(accedi/registrati)   u= insegnante/studente
        if (isset($_GET["t"]) && isset($_GET["u"])) 
        {   
            switch($_GET["t"])
            {//benvenuto in elearn(nome da scegliere)
                //login
                case "a":
                    echo '
                        <form class="form-signin" action="./Autentificazione/Accedi.php" method="post">
                            <input style="display:none;" type="text" name="tipo" value="s">
                            <img class="mb-4" src="https://image.flaticon.com/icons/svg/991/991922.svg" alt="" width="72" height="72">
                            <h1 class="h3 mb-3 font-weight-normal"> Accedi</h1>
                            <label for="inputEmail" class="sr-only">Email address</label>
                            <input name="email" type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
                            <label for="inputPassword" class="sr-only">Password</label>
                            <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
                            <a href="./?t=r&u=s"> Registrati </a>
                            <button class="btn btn-lg btn-warning btn-block" type="submit"> Accedi </button>
                            <!--<p class="mt-5 mb-3 text-muted">&copy; 2017-2019</p>-->
                        </form>
                        ';
                break;
                //register
                case "r":
                    switch($_GET["u"])
                    {
                        case "s":
                            echo '
                                <form class="form-signin" action="./Autentificazione/CreaUtente.php" method="post">
                                    <input style="display:none;" type="text" name="tipo" value="s">
                                    <img class="mb-4" src="https://image.flaticon.com/icons/svg/991/991922.svg" alt="" width="72" height="72">
                                    <h1 class="h3 mb-3 font-weight-normal"> Registrati come studente </h1>
                                    <input type="email" name="email" id="inputEmail" class="form-control" name="email" placeholder="Email address" required autofocus>
                                    <input style="margin-bottom:0px" name="password" border-radius: 0;" type="password" id="rInputPassword" class="form-control" onkeydown="onWrite1(event)" placeholder="Password"  required>
                                    <img src="./Immagini/check.png" class="controlli check" alt="check">
                                    <img src="./Immagini/cross.png" class="controlli cross" alt="cross">
                                    <input type="password" name="conferma_password" id="rInputConfermaPassword" class="form-control" onkeydown="onWrite2(event)" placeholder="Conferma password"  required>
                                    <img src="./Immagini/check.png" class="controlli check" alt="check">
                                    <img src="./Immagini/cross.png" class="controlli cross" alt="cross">
                                    <button class="btn btn-lg btn-warning btn-block" type="submit"> Registrati </button>
                                    <!--<p class="mt-5 mb-3 text-muted">&copy; 2017-2019</p>-->
                                </form>
                                ';
                            break;
                        case "i":
                            echo '
                                <form class="form-signin" action="./Autentificazione/CreaUtente.php" method="post">
                                    <input style="display:none;" type="text" name="tipo" value="i">
                                    <img class="mb-4" src="https://image.flaticon.com/icons/svg/991/991922.svg" alt="" width="72" height="72">
                                    <h1 class="h3 mb-3 font-weight-normal"> Registrati come insegnante </h1>
                                    <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address"  required autofocus>
                                    <input style="margin-bottom:0px;  border-radius: 0;" name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
                                    <input type="password" name="conferma_password" id="inputConfermaPassword" class="form-control" placeholder="Conferma password" required>
                                    <button class="btn btn-lg btn-warning btn-block" type="submit"> Registrati </button>
                                    <!--<p class="mt-5 mb-3 text-muted">&copy; 2017-2019</p>-->
                                </form>
                                ';
                            break;
                    }
                break;
            }
            
        }
        else 
        {
            echo '
            <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
              <div class="titolo">
                <h2><strong>Benvenuto in E-Learn</strong></h2>
                <form action="./">
                  <input style="display:none;" name="t" type="text" value="a">
                  <input style="display:none;" name="u" type="text" value="s">
                  <input type="submit" class="button-1" style="width: 180px;" value="Accedi">
                </form>
                <div class="row">
                  <div class="col-sm-6">
                    <form action="./">
                      <input style="display:none;" name="t" type="text" value="r">
                      <input style="display:none;" name="u" type="text" value="s">
                      <input type="submit" class="button-1" value="Registrati come studente">
                    </form>
                  </div>
                  <div class="col-sm-6">
                    <form action="./">
                      <input style="display:none;" name="t" type="text" value="r">
                      <input style="display:none;" name="u" type="text" value="i">
                      <input type="submit" class="button-1" value="Registrati come insegnante">
                    </form> 
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-3"></div>
          </div>
                
            ';
        }
        /*
            <form action="./">
                    <input style="display:none;" name="t" type="text" value="a">
                    <input style="display:none;" name="u" type="text" value="s">
                    <input type="submit" value="Accedi">
                </form>
                <form action="./">
                    <input style="display:none;" name="t" type="text" value="r">
                    <input style="display:none;" name="u" type="text" value="s">
                    <input type="submit" value="Registrati come studente">
                </form>
                <form action="./">
                    <input style="display:none;" name="t" type="text" value="r">
                    <input style="display:none;" name="u" type="text" value="i">
                    <input type="submit" value="Registrati come insegnante">
                </form>
        */
    ?><!--
    <script>
        function onWrite1(event) 
        {
            let password = document.getElementById("rInputPassword");
            let conferma_password = document.getElementById("rInputConfermaPassword");
            let checks = document.getElementsByClassName("check");
            let crosses = document.getElementsByClassName("cross");
            /*console.log(checks);
            console.log(crosses);*/
            let ris = password.value + String.fromCharCode(event.which || event.keyCode);
            console.log("pass:" + ris);
            console.log("conferma:" + conferma_password.value);
            if (ris == conferma_password)
            {
                for(let check of checks) 
                {
                    check.style.display = "block";
                }
                for(let cross of crosses) 
                {
                    cross.style.display = "none";
                }
            } 
            else 
            {
                for(let check of checks) 
                {
                    check.style.display = "none";
                }
                for(let cross of crosses) 
                {
                    cross.style.display = "block";
                }
            }
        }
        function onWrite2(event)
        {
            let password = document.getElementById("rInputPassword");
            let conferma_password = document.getElementById("rInputConfermaPassword");
            let checks = document.getElementsByClassName("check");
            let crosses = document.getElementsByClassName("cross");
            /*console.log(checks);
            console.log(crosses);*/
            let ris = conferma_password.value + String.fromCharCode(event.which || event.keyCode);
            console.log("pass:" + password.value);
            console.log("conferma:" + ris);
            if (ris == password.value)
            {
                for(let check of checks) 
                {
                    check.style.display = "block";
                }
                for(let cross of crosses) 
                {
                    cross.style.display = "none";
                }
            } 
            else 
            {
                for(let check of checks) 
                {
                    check.style.display = "none";
                }
                for(let cross of crosses) 
                {
                    cross.style.display = "block";
                }
            }
        }
    </script>-->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>