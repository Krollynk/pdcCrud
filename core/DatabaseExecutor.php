<?php
class DatabaseExecutor {
    private $conn;

    public function __construct() {
        $this->conn = DataSource::connect();
    }

    public function execute($mysql): array {
        $builder = new QueryBuilder($mysql);
        $sql = $builder->run();

        //var_dump($sql);die; // Debugging line to check the generated SQL
        if($mysql['tipo'] == 'select'){
            $result = $this->conn->query($sql);
            $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
        }else if($mysql['tipo'] == 'insert'){
            if($this->conn->query($sql) === TRUE) {
                $result = array(
                    'id' => $this->conn->insert_id
                );
            } else {
                $result = array('error' => $this->conn->error);
            }
        }else{
            if($this->conn->query($sql) === TRUE) {
                $result = array(
                    'success' => 'ok'
                );
            } else {
                $result = array('error' => $this->conn->error);
            }
        }

        /* if (!$result) {
            throw new Exception("Database error: " . $this->conn->error);
        } */
        return $result;
    }
    public function execute_direct($mysql, $tipo): array {
        $sql = $mysql;

        if($tipo == 'select'){
            $result = $this->conn->query($sql);
            $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
        }else if($tipo == 'insert'){
            if($this->conn->query($sql) === TRUE) {
                $result = array(
                    'id' => $this->conn->insert_id
                );
            } else {
                $result = array('error' => $this->conn->error);
            }
        }else{
            $result = $this->conn->query($sql);
            $result = array('ok');
        }

        /* if (!$result) {
            throw new Exception("Database error: " . $this->conn->error);
        } */
        return $result;
    }
}