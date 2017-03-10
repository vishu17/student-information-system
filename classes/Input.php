<?php 
	/**
	* @author Kidhoma Norman
	*/
	class Input
	{
		/**
		* Method to handle users input
		*/
		public static function cleanData($data = null)
		{
			if ($data) 
			{
				$data = trim($data);
				$data = stripslashes($data);
				$data = htmlspecialchars($data);
				return $data;
			}
		}
	}
?>