<!doctype html>
<?php
include './../php/json-store-objects.php';
?>

<html lang="en">
<head>
    <title>Emblem Objects</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <link href='http://fonts.googleapis.com/css?family=EB+Garamond' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="../css/header.css">
    <link rel="stylesheet" type="text/css" href="../css/navigation.css">
    <link rel="stylesheet" type="text/css" href="../css/body.css">
    <link rel="stylesheet" type="text/css" href="../css/content.css">
    <link rel="stylesheet" type="text/css" href="../css/footer.css">

    <link rel="stylesheet" type="text/css" href="../css/home.css">

</head>


<body>
<div id="wrapper">
    <div id="header"></div>
    <div style="clear:both"></div>
    <div id="navigation"></div>
    <div style="clear:both"></div>

    <!-- CONTENT -->
    <div id="content">
        <div class="container">
        
            <!-- Container to hold the objects -->
            <div id="objects-display">

                <div class="storeItem" onclick="openOverlay()">
                    <p> STORE ITEM </p>
                </div>
            	<!-- /////////////////////////////////////////////////////////////////// -->

            	<div id="light" class="bright_content">
                	<overlayText> Handlebars bizzz nassssss </overlayText>

            	</div>

            	<div id="fade" class="dark_overlay" onclick="closeOverlay()"> </div>

            	<!-- ////////////    {{#each storeItems}}//////////////////   {{/each}}///////////////////////////////////// -->


        	</div>

        </div>
    </div>
    <div style="clear:both"></div>

    <div id="footer"></div>
    <div style="clear:both"></div>
</div>

<script type="text/handlebars" id="overlay-template">
<overlayText>

    <div class="leftText">
        <h1>{{ name }}</h1>
    </div>

    <div class="rightText">
        <h2> $ {{ price }} </h2>
    </div>
    <div style="clear:both"></div>
    <br />

    <div id="imgBox" class="leftText">
        <img src="{{img}}" alt="" width="100px" height="100px"/>
    </div>

    <div id="optionsBox" class="rightText">

        Description: {{description}}

        <br /><br />

        <form>

        Select a Color
        <select name="colors">
            {{#each colors}}
                <option> {{this}} </option>
            {{/each}}
        </select>
        <br />

        Select a Material
        <select name="materials">
            {{#each materials}}
                <option> {{this}} </option>
            {{/each}}
        </select>
        <br />

        Select a Size
        <select name="sizes">
            {{#each sizes}}
                <option> {{this}} </option>
            {{/each}}
        </select>

        </form>
    </div>

    <div style="clear:both"></div>

    <br />

    <div id="buttonDiv">
        <button type="submit">Buy Item</button>
    </div>

</overlayText>
</script>

    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script type="text/javascript" src="../js/load_templates.js"></script>
    <script type="text/javascript" src="../js/json-search-db.js"></script>
    <script src="../js/handlebars-v2.0.0.js"></script>
    <script src="../js/home.js"></script>

</body>
</html>
