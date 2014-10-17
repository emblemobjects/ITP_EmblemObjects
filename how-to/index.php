<!doctype html>

<html lang="en">
<head>
    <title>Emblem Objects - How-To</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <link href='http://fonts.googleapis.com/css?family=EB+Garamond' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="http://localhost:8080/itp460/ITP_EmblemObjects/css/body.css">
    <link rel="stylesheet" type="text/css" href="http://localhost:8080/itp460/ITP_EmblemObjects/css/header.css">
    <link rel="stylesheet" type="text/css" href="http://localhost:8080/itp460/ITP_EmblemObjects/css/navigation.css">
    <link rel="stylesheet" type="text/css" href="http://localhost:8080/itp460/ITP_EmblemObjects/css/content.css">
    <link rel="stylesheet" type="text/css" href="http://localhost:8080/itp460/ITP_EmblemObjects/css/how-to.css"> 
    <link rel="stylesheet" type="text/css" href="http://localhost:8080/itp460/ITP_EmblemObjects/css/footer.css">   

    
</head>


<body>  
    <div id="wrapper">
        <div id="header"></div><div style="clear:both"></div>
        <div id="navigation"></div><div style="clear:both"></div>
        
        
        
        
        <!-- CONTENT --> 
        <div id="content">
            <div class="container">
                <h1>HOW TO</h1>

                <?php
                    $index = 1;
                    $f = fopen("http://localhost:8080/itp460/ITP_EmblemObjects/documents/how-to-text.txt", "r");

                    // Read line by line until end of file
                    while(!feof($f)) {
                        $line = fgets($f);
                        if (trim($line) != "") {
                            echo "<span class='index'>" . $index . " | </span>";
                            echo "<span class='text'>" . $line . "<br/><hr><br/></span>";
                            $index++;
                        }
                    }
                    fclose($f);
                ?>
            
            </div>
        </div>
        <div style="clear:both"></div>
    
    
    
        
        <div id="footer"></div><div style="clear:both"></div>
    </div>
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script type="text/javascript" src="http://localhost:8080/itp460/ITP_EmblemObjects/js/load_templates.js"></script>

</html>
