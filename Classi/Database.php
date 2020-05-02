<?php
/**
 * Classe che gestisce il db
 * @abstract
 */
abstract class Database 
{
    /**
     * @var string nome dell'host del DBMS
     * @access private
     */
    private $nomehost;
    /**
     * @var string nome utente per l'accesso al DBMS
     * @access private
     */
    private $nomeuser;
    /**
     * @var string password per l'accesso al DBMS
     * @access private
     */
    private $password;
    /**
     * @var string nome del db
     * @access private
     */
    private $dbname;

    /**
     * @var object connessione
     * @access protected
     */
    protected $conn;

    /**
     * Costruttore
     * 
     * @access public
     */
    public function __construct()
    {
        $this->nomehost = "localhost";
        $this->nomeuser = "client";
        $this->password = "Ciaone";
        $this->dbname = "e_learn";
    }
    /**
     * Metodo per la connesione al DB
     * 
     * @access protected
     * @return object $conn Connessione al db
     * @throws Exception connessione
     */
    protected function connect()
    {
        $this->conn = new mysqli($this->nomehost, $this->nomeuser, $this->password, $this->dbname);
        
        if ($this->conn->connect_error) 
        {
            throw new Exception($this->conn->connect_error);
        }

        return $this->conn;
    }

    /**
     * Metodo per la chiusura della connessione
     * 
     * @access protected
     */
    protected function close()
    {
        $this->conn->close();
    }
}
?>

