<!doctype html>
<?php   include './../php/json-store-objects.php';  ?>

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

                <div id="hover" class="storeItem-hover" onclick="openOverlay()"><p> THIS IS SOME TEXT STUFF FOR HELLO WORLD </p></div>
                <div id="item" class="storeItem"> </div>
            	<div id="light" class="bright_content"> </div>
            	<div id="fade" class="dark_overlay" onclick="closeOverlay()"> </div>

        	</div>


        </div>
    </div>
    <div style="clear:both"></div>
    <br /><br />
    <br /><br />
    <br /><br />

    <div id="footer"></div>
    <div style="clear:both"></div>
</div>

<script type="text/handlebars" id="overlay-template">
<div id="overlayTemplate">
<overlayText>

{{#compare type "CUSTOM" operator="==="}}
    <div class="leftText">
        <h1>{{ name }}</h1>
    </div>

    <div class="rightText">
        <h2> $ {{ price }} </h2>
    </div>
    <div style="clear:both"></div>
    <br />

    <div id="imgBox" class="leftText">
        <img src="{{img}}" alt="" width="230px" height="230px"/>
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
{{/compare}}

{{#compare type "SOLO" operator="==="}}
    <div class="leftText">
        <h1>{{ name }}</h1>
    </div>

    <div class="rightText">
        <h2> $ {{ price }} </h2>
    </div>
    <div style="clear:both"></div>
    <br />

    <div id="imgBox" class="leftText">
        <img src="{{img}}" alt="" width="230px" height="230px"/>
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

        <div id="buttonDiv" class="leftText">
            <button type="submit">Buy Item</button>
        </div>

        <div class="leftText">
            <button type="submit">Customize Item</button>
        </div>

    <div style="clear:both"></div>

{{/compare}}

</overlayText>
</div>
</script>

<script type="text/handlebars" id="item-template">
<div id="itemTemplate">

    <div id="itemImageBox">
        <img src="{{img}}" alt="" width="240px" height="240px"/>
    </div>

    <div id="itemDescriptionBox">
        <p>{{ name }} --- {{type}} </p>
    </div>

</div>
</script>

<script type="text/handlebars" id="hover-template">
<div id="hoverTemplate">

    <div id="itemDescriptionBox">
        <p>{{ name }} ------ ${{price}} </p>
    </div>

    Description: {{description}}

</div>
</script>

    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script type="text/javascript" src="../js/load_templates.js"></script>
    <script type="text/javascript" src="../js/json-search-db.js"></script>
    <script src="../js/handlebars-v2.0.0.js"></script>
    <script src="../js/home.js"></script>

</body>
</html>
