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
                                <div class="form-group form-check">
                                    <input type="text" class="form-control" id="insertInsegnanti">
                                </div>
                                <div class="" id="result1">

                                </div>
                            </center>
                        </div>
                        <div class="col">
                            <center>
                                <h2>Aggiungi studenti</h2>
                                <div class="form-group form-check">
                                    <input type="text" class="form-control" id="insertStudenti">
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
        
        $(document).ready(function(){
            function richiesta(email)
            {
                /*$.ajax({
                    url:"./query.php",
                    method:"POST",
                    data:{query:email},
                    success:
                        function(data)
                        {   
                            console.log(data);
                            let Utenti = data.split('|');
                            console.log(Utenti);
                            for (let i = 0; i < Utenti.count(); i++)
                                $('#result1').html('<p>'+Utenti+'</p>');
                        }
                });*/
                $.post({
                    url:"./query.php",
                    data:{query:email},
                    success:
                        function(data)
                        {   
                            console.log(data);
                            let Utenti = data.split('|');
                            console.log(Utenti);
                            for (let i = 0; i < Utenti.length; i++)
                                $('#result1').html('<p>'+Utenti+'</p>');
                        }
                });

            }
            richiesta();
            $('#insertInsegnanti').keypress(function(){
                let email = $(this).val();
                if(email != '')
                {
                    richiesta(email);
                }
                else
                {
                    richiesta();
                }
            });
        });
    </script>
    <!--<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    --><script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>