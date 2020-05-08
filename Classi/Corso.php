<?php
require_once ('Database.php');
require_once ('Utente.php');
/**
 * Classe per la gestione dei corsi
 */
class Corso extends Database
{
    /**
     * @var int $Id identificativo del corso
     * @access private
     */
    private $Id;
    /**
     * @var string $Nome nome del corso
     * @access private
     */
    private $Nome;
    /**
     * @var string $Descrizione Descrizione del corso
     * @access private
     */
    private $Descrizione;
    /**
     * @var int $Creatore id dell'utente che ha creato il corso
     * @access private
     */
    private $Creatore;
    /**
     * Costruttore
     * 
     * @throws Valori non validi
     * @access public
     */
    public function __construct()
    {
        parent::__construct();
        if (func_num_args() == 3)
        {
            /*if ($this->Nome = $this->checkNome(func_get_arg(0))===false)
            {
                throw new Exception('Valori non validi');
            }

            if ($this->Descrizione = $this->checkDescrizione(func_get_arg(1))===false)
            {
                throw new Exception('Valori non validi');
            }

            if ($this->checkCreatore(func_get_arg(2))===false)
            {
                throw new Exception('Valori non validi');
            }
            echo func_get_arg(0);
            echo func_get_arg(1);
            die();*/
            $this->Nome = func_get_arg(0);
            $this->Descrizione =func_get_arg(1);
            $this->checkCreatore(func_get_arg(2));
        }   
    }
    /**
     * Controllo SQL Injection del nome
     * 
     * @param string $nome
     * @return string $nome  ----> corretto
     * @return boolean false ----> errato
     * @access public
     */
    public function checkNome($nome)
    {
        return $nome;
        /*
        if (true)
        {
            return $nome;
        }
        else
        {
            return false;
        }*/
    }
    /**
     * Controllo SQL Injection della descrizione
     * 
     * @param string $Descrizione
     * @return string $Descrizione  ----> corretto
     * @return boolean false ----> errato
     * @access public
     */
    public function checkDescrizione($Descrizione)
    {
        return $Descrizione;
        /*if (true)
        {
            return $Descrizione;
        }
        else
        {
            return false;
        }*/
    }
    /**
     * Controllo SQL Injection del nome
     * 
     * @param Utente $Utente
     * @return int $IdCreatore  ----> corretto
     * @return boolean false    ----> errato
     * @access public
     */
    public function checkCreatore($Utente)
    {
        $Utente = new Utente($Utente->Email,$Utente->Password,$Utente->Tipologia);
        $ris= $Utente->existId();
        if ($ris === false)
        {
            return false;
        }
        else
        {
            $this->Creatore = $ris;
            return true;
        }
    }
    /**
     * Select corsi
     * 
     * @param string $Descrizione
     * @return array $data[] trovato
     * @return boolean false non trovato
     * @access public
     */
    public function selectCorso($Id)
    {
        $sql="SELECT * FROM Corsi WHERE Id='". $Id ."';";
        $result = $this->connect()->query($sql);
        $numrows = $result->num_rows;
        if ($numrows > 0)
        {
            while ($row = $result->fetch_assoc())
            {
                $data[] = $row;
            }
            $this->close();
            return $data;
        }
        else
        {
            $this->close();
            return false;
        }
    }
    /**
     * Insert corso in Corso
     * 
     * 
     * @access public
     */
    public function insertCorso()
    {
        $sql = "INSERT INTO Corsi(Nome, Descrizione, Creatore) VALUES (?,?,?);";

        $stmt = $this->connect()->prepare($sql);
        $stmt->bind_param('ssi', $this->Nome, $this->Descrizione,$this->Creatore);

        $stmt->execute();
        $stmt->close();
    }
}
?>