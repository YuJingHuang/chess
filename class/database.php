<?php
    class database{
        private $ServerName="localhost";
        private $UserName = "emotion";
        private $password = "123456";
        private $DBName = "chess";
        public $conn;
        function connect(){
            $this->conn = mysqli_connect($this->ServerName,$this->UserName,$this->password,$this->DBName);
        }
        function add_newUsers($id,$password){
            $sql = "SELECT * FROM users WHERE id = '$id'";
            $result = mysqli_query($this->conn,$sql);
            if(mysqli_num_rows($result) == 0){
                $sql = "INSERT INTO users (id,password) VALUE ('$id','$password')";
                mysqli_query($this->conn,$sql);
            }else{
                echo "使用者名稱已被使用";
            }
        }

        function signIn($id,$password){
            $sql = "SELECT id,password FROM users WHERE id = '$id'";
            $result = mysqli_query($this->conn,$sql);
            if(mysqli_num_rows($result)> 0){
                $row = mysqli_fetch_assoc($result);
                if($password == $row["password"]){
                    session_start();
                    $_SESSION["id"] = $row["id"];
                    header("Location:index.php"); 
                    exit;
                }else{
                    echo "帳號或密碼不正確";
                }
                echo "帳號或密碼不正確";
            } 
        }

        function get_WinStatistical($id){
            $winStatistical = new SplFixedArray(3);
            $sql = "SELECT win,loss,tie FROM users WHERE id = '$id'";
            $result = mysqli_query($this->conn,$sql);
            $row = mysqli_fetch_assoc($result);
            $winStatistical[0] = $row["win"];
            $winStatistical[1] = $row["loss"];
            $winStatistical[2] = $row["tie"];
            return $winStatistical;
        }


        function GET(){
            $sql="SELECT*FROM lobby";
            $result = mysqli_query($this->conn,$sql);
            session_start();
            while($row = mysqli_fetch_assoc($result)){
                $_SESSION["table_id"] = $row["table_id"];
                $_SESSION["time"] = $row["time"];
                $_SESSION["player1"] = $row["player1"];
                $_SESSION["player2"] = $row["player2"];
                $_SESSION["status"] = $row["status"];

            }
    
    }
    }
?>