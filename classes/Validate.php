<?php
	/**
	* @author Kidhoma Norman
	*/
	class Validate
	{
		/**
		*  Class method to verify whether username and password are not empty
		*/
		public static function check($username, $password)
		{
			if (!empty($username) && !empty($password)) 
			{
				return true;
			}
		}
	}

?>