<?php 
    class Db{
        private $maychu = 'localhost';
        private $tk = 'root';
        private $matkhau = '';
        private $csdl = 'tienganh';
        
        private $conn = NULL;

        public function ketnoi(){
            $this->conn=new mysqli($this->maychu, $this->tk, $this->matkhau, $this->csdl);
            if(!$this->conn){
                echo "Kết nối thất bại!";
                exit();
            }else{
                mysqli_set_charset($this->conn,'utf-8');
            }
            return $this->conn;
        }
    }
?>