<?php
    require_once ('./../Classi/Database.php');
    if (isset($_POST['query']))
    {
        class Temp extends Database
        {
            public function __construct()
            {
                parent::__construct();
            }
            public function selectAll($Email)
            {
                $Id="";
                $mio="";
                $sql = "SELECT Id, Email 
                        FROM Utenti
                        WHERE
                            Email LIKE ?";

                $stmt = $this->connect()->prepare($sql);
                $stmt->bind_params('s', '%'.(string)$Email.'%');
                /* bind variables to prepared statement */
                
                $stmt->bind_result($Id, $mio);
                $risposta="";
                /* fetch values */
                while ($stmt->fetch()) {
                    $risposta = $Id.' '.$mio.'|';
                }
                return $risposta;
            }
        }
        $db = new Temp();
        echo $db->selectAll($_POST['query']);

        /*$db = new Temp();
        $sql = "SELECT Id, Email 
                FROM Utenti
                WHERE
                    Email LIKE %?%";

        $stmt = $db->connect()->prepare($sql);
        $stmt->bind_params('s', $_POST['query']);
        /* bind variables to prepared statement 
        $stmt->bind_result($Id, $Email);
        $risposta="";
        /* fetch values 
        while ($stmt->fetch()) {
            $risposta = $Id.' '.$Email.'|';
        }
        echo $risposta;*/
    }
    else
    {
        echo "Nessun utente trovato";
    }
?>