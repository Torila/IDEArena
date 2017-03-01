<?php

include('class.password.php');


class User extends Password{

	private $db;

		function _construct($db){

			parent::_construct();
			$this->_db = $db;
			}

			public function logged_in(){
				if(isset($_SESSION['idealog']) && $_SESSION['idealog'] == true){
					return true;
					}
			}

			public function grab_user(){
				if(isset($_SESSION['ideau'])){
					$username = $_SESSION['ideau'];
					$_SESSION['ideau'] = $username;
					return $username;
					}
			}


			private function get_user_hash($username){
					define('DBHOST','localhost');
					define('DBUSER','vnlaughlin');
					define('DBPASS','cs480');
					define('DBNAME','vnlaughlin');

					try{
						$connect = new PDO("mysql:host=".DBHOST.";port=8889;dbname=".DBNAME, DBUSER, DBPASS);
						$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					} catch(PDOException $e) {
						echo '<p class="error">'.$e->getMessage().'</p>';
						}

						$stmt = "SELECT password FROM users WHERE username=:username";
						$ment = $connect->prepare($stmt);
						$ment->execute(array(":username" => $username));
						$row = $ment->fetch(PDO::FETCH_ASSOC);
						$ans = $row['password'];
						return $row['password'];

			}

			public function login($username, $password){

				$hashed = $this->get_user_hash($username);
				if($password == $hashed){
					$_SESSION['idealog'] = true;
					$_SESSION['ideau'] = $username;
					return true;
					}
			}

			public function logout(){
					session_destroy();
					echo 'Goodbye!';
			}

}

?>