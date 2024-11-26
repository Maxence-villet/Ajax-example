<?php
class Database {
        private static $host = 'host';
        private static $dbname = 'dbname';
        private static $user = 'user';
        private static $password = 'password';

        public static function  connectionDatabase() {
            
        
            try {
                $pdo = new PDO("mysql:host=".self::$host.";dbname=".self::$dbname."", self::$user, self::$password);
                
                return $pdo;
            } catch(PDOException $e) {
                echo "Erreur de connexion à la base de données : " . $e->getMessage();
                die();
            }
        }

        public static function requestExecute($request, $params){
            $pdo = self::connectionDatabase();
            $stmt = $pdo->prepare($request);
            foreach ($params as $key => $val) {
                $stmt->bindValue($key, $val);
            }
            $stmt->execute();
            return $stmt;
        }

        public static function fromRequestToTable($request, $params, $user_nickname){

            $stmt = self::requestExecute($request, $params);
            echo '<table>';
            echo '<tr><th>Nom du jeu</th><th>Pseudo</th><th>Difficulté</th><th>Temps</th><th>Date</th></tr>';

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo '<tr>';
                echo '<td>' . $row['game_name'] . '</td>';
                if ($row['player_nickname'] == $user_nickname) {
                    echo '<td class="highlight" style="color: #ec9123; font-weight: bold;">' . $row['player_nickname'] . '</td>'; 
                }
                else {
                    echo '<td>' . $row['player_nickname'] . '</td>';
                }
                echo '<td>' . $row['difficulty'] . '</td>';
                echo '<td>' . $row['score'] . '</td>';
                echo '<td>' . $row['date'] . '</td>';
                echo '</tr>';
            }

            echo '</table>';
        }
    }
?>



