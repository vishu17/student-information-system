<?php 
	/**
	* @author Kidhoma Norman
	* Create new class to handle database duties
	*/
	class Database
	{
		// property to handle database connection
		private static $_instance = null;

		/*
		* property to handle database connection string 
		* new PDO('mysql:host=127.0.0.1;dbname=arksnorman', 'root', 'root');
		*
		*/
		private $_pdo;

		// property to handle user querys i.e "SELECT, UPDATE, INSERT etc"
		private	$_query;

		// property to handle errors in case of any
		private	$_error = false;

		// property to handle data which has been got from database
		private	$_results;

		// property to handle number of rows affected 
		private	$_count = 0;

		// Method to auto-connect to database at the call of this class
		private function __construct()
		{
			try 
			{
				//connect to database
				$this->_pdo = new PDO('mysql:host=127.0.0.1;dbname=arksnorman', 'root', 'root');
			} 

			catch (PDOException $e) 
			{
				// return error if fail to connect to database
				die($e->getMessage());
			}
		}

		// Method to return succesfull connection to database in case of no error
		public static function getInstance()
		{
			if (!isset(self::$_instance)) 
			{
				// assign static variable $_instance to database class to construct new database
				self::$_instance = new Database;
			}

			// Return if sucessful connection
			return self::$_instance;
		}

		// Method to hand queries from users i.e "SELECT, INSERT, UPDATE, etc"
		public function query($sql, $params = array())
		{
			// initialize error to false to avoid returning errors of previous queries
			$this->_error = false;

			if ($this->_query = $this->_pdo->prepare($sql)) 
			{
				$x = 1;
				if (count($params)) 
				{
					foreach ($params as $param) 
					{
						$this->_query->bindValue($x, $param);
						$x++; 
					}	
				}

				if ($this->_query->execute()) 
				{

					// store results from select statement as an object
					$this->_results 	= $this->_query->fetchAll(PDO::FETCH_OBJ);

					// store number of rows affected
					$this->_count 		= $this->_query->rowCount();

				}

				else
				{
					// return error if above code failed to execute
					$this->_error = true;
				}
			}

			return $this;		
		}

		// Method to handle errors 
		public function error()
		{
			return $this->_error;
		}

		// Method to handle numbers of rows affected 
		public function count()
		{
			return $this->_count;
		}

		// Method to handle results fetched from database if any
		public function results()
		{
			return $this->_results;
		}
	}
?>