<?php
    session_start();
    require("./../CredenzialiDB.php");

    if(isset($_SESSION['email']) && isset($_SESSION['password']) && isset($_SESSION['tipo']))
    {
        try 
        {
            $Utente = new Utente($_SESSION['email'], $_SESSION['password'], $_SESSION['tipo']);
        }
        catch (Exception $e)
        {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
            die();
        }
        $Utente->insertUtenti();
        
        $_SESSION['Utente'] = $Utente->parseUtenteToJson();
        
        /*
        $_SESSION['email'] = $Utente->getEmail();
        $_SESSION['tipo'] = $Utente->getTipologia();
        $conn = new mysqli($nomehost, $nomeuser, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connessione al db fallita: " . $conn->connect_error);
        }   
        
        $sql = "INSERT INTO Utenti(Email, Password, Tipologia) VALUES (?,?,?);";
        $stmt = $conn->prepare($sql);
        
        $email = $_POST['email'];
        $pwd =password_hash($_POST['password'], PASSWORD_BCRYPT);
        $tipo ='i'; 
    
        $stmt->bind_param('sss', $_SESSION['email'], $_SESSION['password'], $_SESSION['tipo']);
        $stmt->execute();*/
        header("location: http://localhost:8080/Moodle/Home.php");
    }
    else
    {
        header("location: http://localhost:8080/Moodle/");
    }

?>