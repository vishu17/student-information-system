<?php
    include 'core/init.php';
    if(!User::isLoggedIn()) 
    {
        Redirect::to('login.php');
    }
    echo $_SESSION['user_session'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Student Information System</title>
<link rel="stylesheet" type="text/css" href="css/reset.css" />
<link rel="stylesheet" type="text/css" href="css/960.css" />
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link rel="stylesheet" type="text/css" href="css/jquery-ui-1.8.custom.css" />

<script type="text/javascript" src="ajax/jquery-1.4.1.min.js"></script>
<script type="text/javascript" src="ajax/jquery-ui-1.8.custom.min.js"></script>
<script type="text/javascript" src="ajax/main.js"></script>
</head>

<body>
<div id="container" class="container_16">
    <div id="dialog" title="Basic">
        <p>This is some text</p>
    </div>
    <div id="header" class="grid_16">
    	<a href="index.php"><h3>Krishna Engineering College</h3></a>
        <ul id="top_menu">
        	<li><a id="ad_login" href="admin.php">Admin</a></li>
        </ul><!-- end top_menu -->
    </div><!-- end header -->
    
    <div id="sub_header" class="grid_16">
    	<h4 id="logo">Student Information System</h4>
        <form id="search" method="POST">
        	<ul>
                <li><input type="text" id="search_box" name="search" value="Search.." /></li>
                <li>
                    <input type="image" id="search_btn" src="images/btn_search_name.png" />
                        <ul id="submenu">
                            <li><a href="#" id="s_name">By Name</a></li>
                            <li><a href="#" id="s_roll">By Roll. no.</a></li>
                        </ul>
                </li>
                <li><input type="image" src="images/btn_search.png" id="go" alt="search" title="search" /></li>
            </ul>
        </form><!-- end search -->
    </div><!-- end sub header -->
    
    <div class="grid_5 alpha">
        <img src="images/left_col_top.png" alt=""/>
        
        <div id="left_col" class="grid_5 alpha">
        <h4>Top 5 students</h4>
        <ul>
            <li>
                
                
                <p> <img src="images/stu.jpg" width="70" height="70" />
                    John Smith <br />
                    B.Tech - CS <br />
                    Roll no - 0616110058 <br />
                    Overall - 95% <br />
                </p>
            </li>
            
            <li>
                <p> <img src="images/stu.jpg" width="70" height="70" />
                    John Smith <br />
                    B.Tech - CS <br />
                    Roll no - 0616110058 <br />
                    Overall - 95% <br />
                </p>
            </li>
            
            <li>
                <p> <img src="images/stu.jpg" width="70" height="70" />
                    John Smith <br />
                    B.Tech - CS <br />
                    Roll no - 0616110058 <br />
                    Overall - 95% <br />
                </p>
            </li>
            
            <li>
                <p> <img src="images/stu.jpg" width="70" height="70" />
                    John Smith <br />
                    B.Tech - CS <br />
                    Roll no - 0616110058 <br />
                    Overall - 95% <br />
                </p>
            </li>
            
            <li id="last">
                <p> <img src="images/stu.jpg" width="70" height="70" />
                    John Smith <br />
                    B.Tech - CS <br />
                    Roll no - 0616110058 <br />
                    Overall - 95% <br />
                </p>
            </li>
            
        </ul>
        </div><!-- end left col -->
        <img src="images/left_col_bottom.png" />
                
    </div><!-- end wrap -->
    
    <div class="grid_11 omega">
            <img src="images/main_top.png" />
            <div id="right_col" >
                <h4>View complete student list (By Branch)</h4>
                <div id="content">
                <ul>
                    <li><a href="#" class="load-cs branch">CS</a></li>
                    <li><a href="#" class="load-ec branch">EC</a></li>
                    <li><a href="#" class="load-it branch">&nbsp;IT</a></li>
                    <li><a href="#" class="load-me branch">ME</a></li>
                    <li><a href="#" class="load-en branch">EN</a></li>                  
                </ul>   
                </div><!-- end content -->
            </div><!-- end right col -->
            <img src="images/main_bottom.png" />
    </div><!-- end wrap -->
    
    <div class="grid_16 footer">
        <img src="images/footer-top.png" />
        <div id="footer">
            <p>&copy; 2010 Vishu Singh<br />KEC</p>
        </div><!-- end footer -->
        <img src="images/footer-bottom.png" />
    </div><!-- end footer wrap -->
    
    
</div><!-- end container -->


</body>
</html>
