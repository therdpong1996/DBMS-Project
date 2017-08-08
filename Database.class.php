<?php
class Database {
    private $host = "";
    private $username = "";
    private $password = "";
    private $db_name = "";

    function __construct($host,$username,$password,$db_name) {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->db_name = $db_name;
    }

    public function loopdatabase($n = 20, $data){
        $con = mysqli_connect($this->host , $this->username , $this->password , $this->db_name);
        mysqli_set_charset($con,"utf8");
        $n_db = mysqli_fetch_row(mysqli_query($con, "SELECT COUNT(id) FROM log_datas"));
        if($n_db[0] >= $n){
            $del_n = $n_db[0] - $n + 1;
            mysqli_query($con, "DELETE FROM log_datas ORDER BY id ASC LIMIT ".$del_n);
            $this->insert($data);
        }else{
            $this->insert($data);
        }
    }

    public function insert($data){
        $con = mysqli_connect($this->host , $this->username , $this->password , $this->db_name);
        mysqli_set_charset($con,"utf8");
        $sql_i = "UPDATE display_data SET d_temp = '".$data["temp"]."', d_humi = '".$data["humi"]."'";
        $sql_u = "INSERT INTO log_datas(temp,humi,time) VALUES ('".$data["temp"]."', '".$data["humi"]."', '".time()."')";
        $save_i = mysqli_query($con, $sql_i);
        $save_u = mysqli_query($con, $sql_u);
        $con->close();
        if ($save_i and $save_u) {
            return true;
        }else{
            return false;
        }
        
    }

}

?>