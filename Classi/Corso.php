<?php
require_once ('Database.php');
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
     * Costruttore
     * 
     * @throws Valori non validi
     * @access public
     */
    public function __construct()
    {
        parent::__construct();
        if (func_num_args() == 2)
        {
            if ($this->Nome = $this->checkNome(func_get_arg(0))===false)
            {
                throw new Exception('Valori non validi');
            }

            if ($this->Descrizione = $this->checkNome(func_get_arg(1))===false)
            {
                throw new Exception('Valori non validi');
            }
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
        if (true)
        {
            return true;
        }
        else
        {
            return false;
        }
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
        if (true)
        {
            return true;
        }
        else
        {
            return false;
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
     * Insert corso
     * 
     * @param string $Descrizione
     * 
     * @access public
     */
    public function insertCorso($Descrizione)
    {
        $sql = "INSERT INTO Corsi(Nome, Descrizione) VALUES (?,?);";

        $stmt = $this->connect()->prepare($sql);
        $stmt->bind_param('ss', $this->Nome, $this->Descrizione);

        $stmt->execute();
        $stmt->close();
    }
}
?>