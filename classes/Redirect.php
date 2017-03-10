<?php 
	/**
	* @author Kidhoma Norman
	*/
	class Redirect
	{
		/**
		*  Public method to help in redirecting to pages
		*/
		public static function to($location = null)
		{
			if ($location) 
			{
				header('location: ' . $location);
				exit();
			}
		}
	}
?>