<?php
    session_start();
    require_once ('./../Classi/Utente.php');
    require_once ('./../Classi/Corso.php');
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Learn</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>



    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="page.css">
</head>
<body>
    
<div class="container">
    <div class="row page">
        <div class="col-1">
        </div>
        <div class="col-10">
            <center>
                <h1>Crea un corso</h1>
            </center>
            <form action="./" method="POST">
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" id="nome" required>
                </div>
                <div class="form-group">
                    <label for="descrizione">Descrizione</label>
                    <textarea class="form-control" id="descrizione" required>
                    </textarea>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <center>
                                <h2>Aggiungi insegnanti</h2>
                                <div class="container" id="risultatoInsegnanti">
                                    <div class="row">
                                        <div class="col">
                                            <input type="text" class="form-control" id="insertInsegnanti">
                                        </div>
                                        <div class="col">
                                            <h3 id="addInsegnante"> Aggiungi </h3>
                                        </div>
                                    </div>
                                    <!--<div class="row" id="risultatoInsegnanti">

                                    </div>-->
                                </div>
                            </center>
                        </div>
                        <div class="col">
                            <center>
                                <h2>Aggiungi studenti</h2>
                                <div class="container">
                                    <div class="row">
                                        <div class="col">
                                            <input type="text" class="form-control" id="insertStudenti">
                                        </div>
                                        <div class="col">
                                            <h3 id="addStudente"> Aggiungi </h3>
                                        </div>
                                    </div>  
                                </div>
                                <div id="container risultatoStudenti">
                                </div>
                            </center>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </div>
        <div class="col-1">
        </div>
    </div>
</div>
    <script>


        /* Metodo per rimuovere l'insegnate aggiunto */
        function cancella(elemento)
        {
            $('#'+elemento ).remove();
        }

        /* Metodo per trovare se un insegnante è già stato aggiunto */

        function trova(insegnante)
        {
            let total = [];
            let trovato = false;
            $('#risultatoInsegnanti').find('input.insegnanti').each(function(index, elem){
                total.push(elem.value);
            });
            console.log(total);
            for (let i=0; i<total.length; i++)
            {
                if (total[i]===insegnante)
                {
                    trovato = true
                    break;
                }
            }
            return trovato;
        }

        /* Evento richiamato quando la pagina è caricata */
        $(document).ready(function(){
            let utenteJson = '<?php echo $_SESSION["Utente"] ?>';
            let utenteObj = JSON.parse(utenteJson); // oggetto Utente della sessione preso da php

            console.log(utenteObj.Email);

            function richiesta(email, cont)
            {
                $.post({
                    url:"./query.php",
                    data:{query:email, cont:cont},
                    success:
                        function(data)
                        {
                            $('#risultatoInsegnanti').append(data);
                        }
                });

            } 
            $('#addInsegnante').click(function(){
                let email = $('#insertInsegnanti').val();
                if(email != '' && email!==utenteObj.Email)
                {
                    if (!trova(email))
                    {
                        let cont = $('input.insegnanti').length-1;
                        richiesta(email, cont);
                    }
                    else
                    {
                        alert('l\'utente è già stato inserito');
                    }
                }
                else
                {
                    alert('Il campo deve essere riempito');
                }
            });
        });
    </script>
    <!--<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    --><script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>