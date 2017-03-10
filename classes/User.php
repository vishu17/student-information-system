<?php

	/**
	* @author Kidhoma Norman
	*/
	class User 
	{
		// Private property to handle database connection
		private $_db;

		public function __construct()
		{
			$this->_db = Database::getInstance();
		}
		
		/**
		* Method to handle user login and check if login is true 
		*/
		public function login($username, $password)
		{			
			$query = $this->_db->query("SELECT * FROM test WHERE username = ? AND password = ?", array($username, $password));
			return ($query->count() > 0) ? $_SESSION['user_session'] = $query->results()[0]->username : false;
		}

		/**
		* Public Static Method to store user session if logged in
		*/
		public static function isLoggedIn()
		{
			if(isset($_SESSION['user_session']))
			{
				return true;
			}
		}

		/**
		* Public Method to handle users logout
		*/
		public static function logout()
		{
			session_destroy();
			unset($_SESSION['user_session']);
			return true;
		}
		
	}
?>