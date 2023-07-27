<?php 
    class Connected{
        public static function ConnectDB(){
        $host = 'localhost';
        $dbname = 'Techart';
        $dbuser = 'root';
        $dbpassword = '';
        try 
            {
                $dbs = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8;", $dbuser, $dbpassword);
                #echo "Connected to $dbname at $host successfully.";
            } 
        catch (PDOException $pe) 
            {
                die("Could not connect to the database $dbname :" . $pe->getMessage());
            }
        return $dbs;
        }
    }
    class NewsModel extends Connected{      
        public static function getCount($limit){
            $res_count = parent::ConnectDB()->query("SELECT COUNT(*) FROM news");
            $row = $res_count->fetch();
            $total = $row[0];
            $str_page = ceil($total / $limit);
            return $str_page;
        }
        public static function getList($offset, $limit){
            $query = parent::ConnectDB()->query("SELECT *,DATE_FORMAT(date,'%d.%m.%y') dt FROM news ORDER BY date DESC LIMIT $offset, $limit");
            return $query;
        }
        public static function getID(){
            $st = parent::ConnectDB()->prepare("SELECT *,DATE_FORMAT(date,'%d.%m.%y') dt FROM news WHERE id=?");
            $st -> bindValue(1, $_GET['id'], PDO::PARAM_INT);
            $st -> execute();
            $row = $st->fetch();
            return $row;
        }
        public static function getMail(){
            $st = parent::ConnectDB()->prepare("INSERT INTO feedback VALUES (0, ?, ?, ?)");
            return $st;
        }
    }