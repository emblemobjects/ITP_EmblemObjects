<!doctype html>

<html lang="en">
<head>
    <title>Emblem Objects</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <script>
        /*
        </body>
        </html>
        */
    </script>
    <script language="javascript">
        function send() {
          //  document.theform.submit();
            console.log("Sending form");
        }
</script>
    <link href='http://fonts.googleapis.com/css?family=EB+Garamond' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="framework.css">
    
</head>


<body>
    
    <div id="wrapper">
    
    <!-- HEADER -->
    <div id="header">        
        <div class="container"> <!-- keeps header content in 1200px fixed width-->
            <input id="sign-in" type="button" value="SIGN IN"/>
            <div style="clear:both"></div>
            
            <img id="logo" src="images/logo.png"/>
            <span id="title">emblem objects.</span>
            <a href="#" class="header-link">WHAT'S NEW</a>
            <a href="#" class="header-link" style="margin-right: 90px; color:#ffa800">HOW TO</a>
        </div>      
    </div>
    <div style="clear:both"></div>
    
     
     
    <!-- NAVIGATION -->  
    <div id="navigation">
        <div class="container">
            
           
            
            <form name="search-field" id="search-field" action="" method=POST>
                <input name="search-input" />
                <button name="search-submit" type="submit"><img src="images/icon_search.png" alt="Search" height="15px" width="15px"/></button>
            </form>
            

            
        </div>         
    </div>
    <div style="clear:both"></div>
      
      
    
    <!-- CONTENT --> 
    <div id="content">
        <div id="container">
        </div>
    </div>
    <div style="clear:both"></div>
        
                
        
    <!-- FOOTER -->  
    <div id="footer">
        <div id="icons-container">
            <a href="#"><img class="social-icon" src="images/icon_twitter.png"/></a>
            <a href="#"><img class="social-icon" src="images/icon_tumblr.png"/></a>
            <a href="#"><img class="social-icon" src="images/icon_youtube.png"/></a>
            <a href="#"><img class="social-icon" src="images/icon_google+.png"/></a>
            <a href="#"><img class="social-icon" src="images/icon_facebook.png"/></a>
        </div>
    </div>
    <div style="clear:both"></div>
    </div>
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script src="home.js"></script> 
    <script src="framework.js"></script>
    
    
    
    <!-- PHP -->
    <?php
    
        // Submit the search
        if(isset($_POST['search-submit'])){  //check if form was submitted
            $input = $_POST['search-input']; //get input text
            echo '<script type="text/javascript">console.log("'.$input.'");</script>';  // log input to the console
        }
        
    ?>
</body>
</html>
