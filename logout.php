<?php

    if (User::logout()) 
    {
    	Redirect::to('login.php');
    }
    
?>
