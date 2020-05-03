<?php
require_once ('Database.php');
class Query extends Database
{
    public function __construct()
    {
        parent::__construct();
    }
    public function selectInsegnanti($Email)
    {
        if (preg_match('/^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/i', $Email, $ritorno))
        {
            $Email = $ritorno[0];
            
            $sql = "SELECT Email
                    FROM Utenti
                    WHERE
                        Email = ? And Tipologia='i'";

            $stmt = $this->connect()->prepare($sql);
            $Email = $Email;
            $stmt->bind_param('s', $Email);
            
            $stmt->execute();

            $stmt->bind_result($Email);
            $risposta ="No matches";
    
            while ($stmt->fetch()) {
                $risposta = $Email;
                break;
            }
            return $risposta;
        }
        else 
        {
            return "No matches";
        }
    }
}  
?>