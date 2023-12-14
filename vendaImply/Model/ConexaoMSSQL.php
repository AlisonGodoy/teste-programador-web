<?php 

include_once '../config.ini.php';

class ConexaoMSSQL {
    protected $db;
    protected $hostname;
    protected $porta;
    protected $database;
    protected $username;
    protected $password;
    public $ultimoId;

    public function __construct(){
        $this->hostname = DB['hostname'];
        $this->porta = DB['port'];
        $this->database = DB['database'];
        $this->username = DB['username'];
        $this->password = DB['password'];

        $this->conecta();
    }

    public function conecta(){
        try {
            $this->db = new PDO("mysql:host=$this->hostname;database=$this->database", $this->username, $this->password);
            $this->db->setAttribute(PDO::SQLSRV_ATTR_ENCODING, PDO::SQLSRV_ENCODING_SYSTEM);
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function consulta($query, $params = []) {
        try {
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
            $this->db->exec('USE vendaimply');
    
            $statement = $this->db->prepare($query);
            $statement->execute($params);
            
            return $statement->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            throw new Exception("Erro na consulta. Detalhes: " . $e->getMessage() . ". Query: " . $query);
        }
    }

    public function executa($sql, $params = []){
        $statement = $this->db->prepare($sql);
        try {
            $statement->execute($params);
            if ($statement->errorCode() != "00000") {
                throw new PDOException($statement->errorInfo()[2]);
            }
            $this->ultimoId = $this->db->lastInsertId();
            return $statement->rowCount();
        } catch (PDOException $e){
            echo $e->getMessage();
            throw new Exception($e->getMessage());        
        }
    }
}