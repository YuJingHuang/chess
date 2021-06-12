<html>

<?php
include "class/database.php";
$database = new database();
$database->connect();
$database->GET();
?>




    <head>
        <title>西洋棋-大廳</title>
        <style type ="text/css">
        .container{width:100%;height:100%}
        .left{width:25%;height:100%;margin:0px;background-color:#FFF8D7;display:inline-block;vertical-align:top}
        .center{width:50%;height:100%;margin:0px;background-color:#FFFFFF;display:inline-block;text-align: center;vertical-align:top}
        .right{width:24%;height:100%;margin:0px;background-color:#FFF8D7;display:inline-block;vertical-align:top}
        .table{background-color:#FFFFFF;border-color:#0066CC;line-height:30px}
        .table-button{background-color:#ACD6FF;line-height:20px;border:5px #0066CC solid}
        .table-table{font-size:20px;font-weight:bold}
        .button{height:50px;margin-top:450px;text-align: center}
        .newtable-button{width:250px;height:40px;font-size:20px}
        .other-button{width:60px;height:30px;line-height:30px;font-size:16px}
        </style>
    </head>
    <body style = "margin:0px;background-color:#FFF8D7">

        <div class = "container">
            <div class = "left"></div>
            <div class = "center">
            <?php
                $sql = "SELECT * FROM lobby";
                $result = mysqli_query($database->conn, $sql);
                while($row = mysqli_fetch_assoc($result)){
                    echo"
                        <form class = 'table'>
                            <br/>
                            <button type='submit' class = 'table-button'>
                                <br/>
                                <table width = '450px' hight = '300px' cellpading = '1000' class = 'table-table'>
                                    <tr>
                                        <td rowspan = '2' style = 'color:#0066CC'>".substr($row['time'], 11,5)."</td>
                                        <td style = 'color:#FFFFFF'>白方</td>
                                        <td>黑方</td>
                                        <td rowspan = '2' style = 'color:#0066CC'>遊玩中</td>
                                    </tr>
                                    <tr>
                                        <td style = 'color:#FFFFFF'><br/>".$row['player1']."</td>
                                        <td><br/>".$row['player2']."</td>
                                    </tr>
                                </table>
                                <br/>
                            </button>
                        </form>";  
                }




            /*
            if (isset($_POST["CREATE"])) {
                $tableid = $_SESSION["table_id"];
                $time = $_SESSION["time"];
                $player1 = $_SESSION["player1"];
                $player2 = $_SESSION["player2"];
                $status = $_SESSION["status"];
                echo "'$tableID'"*/

                ?>
            </div>
            <div class = "right">
                <div class = "button">
                    <form method="POST" action="class/createLobby.php">

                        <input type="submit" value="開設新房" class = "newtable-button" name="CREATE">
                        <br/>
                        <br/>
                        <input type="button" value="上一頁" class = "other-button">
                        <input type="button" value="下一頁" class = "other-button">
                        <input type="button" value="刷新" class = "other-button" onclick="window.location.reload()"  >
                        <input type="button" value="離開" class = "other-button" onclick="javascript:location.href='./index.php'">
                    </form>
                </div>
            </div>
        </div>
        
                            <?/*自動重新整理*/ /*php header('refresh: 5;url="./lobby.php"')*/ ?>
    </body>
</html>