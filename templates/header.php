<?php
include_once "../php/config.php";
?>

    <!-- HEADER -->
    <div id="header">
        <div class="container"> <!-- keeps header content in 1200px fixed width-->
            <a href="<?php echo $Dir;?>/designer"><input id="sign-in" type="button" value="SIGN IN"/></a>
            <div style="clear:both"></div>          
            <a href = "<?php echo $Dir;?>/home"><img id="logo" src="<?php echo $Dir;?>/images/logo.png" width="60px" height="60px"/></a>
            <a href = "<?php echo $Dir;?>/home"><span id="title">EmblemObjects</span></a>
            <a href = "<?php echo $Dir;?>/whats-new" class="header-link">WHAT'S NEW</a>
            <a href="<?php echo $Dir;?>/how-to" class="header-link" style="color:#ffa800">HOW TO</a>
        </div>      
    </div>
<div style="clear:both"></div>
<div id="navigation">
<!-- NAVIGATION -->
<div class="container">
    <!-- search box -->
    <!--<div id="main-nav1" class="nav"> -->

    <nav id="nav">
        <ul id="navig">
            <li><a href="#" name="Store" class="first division">STORE</a>
                <ul>
                    <li><a href="#" class="category" name="Accessories">Accessories</a>
                        <ul>
                            <li><a href="#" class="subcategory" name="Cases">Cases</a></li>
                            <li><a href="#" class="subcategory" name="Keychains">Keychains</a></li>
                            <li><a href="#" class="subcategory" name="Belts & Buckles" >Belts & Buckles</a></li>
                        </ul>
                    </li>
                    <li><a href="#" class="category" name="Art">Art</a>
                        <ul>
                            <li><a href="#" class="subcategory" name="Sculpture">Sculptures</a></li>
                            <li><a href="#" class="subcategory" name="Parametics">Parametics</a></li>
                            <li><a href="#" class="subcategory" name="Themed">Themed</a></li>
                        </ul>
                    </li>
                    <li><a href="#" class="category" name="Gadgets">Gadgets</a>
                        <ul>
                            <li><a href="#" class="subcategory" name="Parts">Parts</a></li>
                            <li><a href="#" class="subcategory" name="Props">Props</a></li>
                        </ul>
                    </li>
                    <li><a href="#" class="category" name="Home">Home</a>
                        <ul>
                            <li><a href="#" class="subcategory" name="Placements">Placements</a></li>
                            <li><a href="#" class="subcategory" name="Holders">Holders</a></li>
                            <li><a href="#" class="subcategory" name="Vases">Vases</a></li>
                            <li><a href="#" class="subcategory" name="Lightning">Lighting</a></li>
                            <li><a href="#" class="subcategory" name="Desktop">Desktop</a></li>
                        </ul>
                    </li>
                    <li><a href="#" class="category" name="Jewelry">Jewelry</a>
                        <ul>
                            <li><a href="#" class="subcategory" name="Rings">Rings</a></li>
                            <li><a href="#" class="subcategory" name="Pendants">Pendants</a></li>
                            <li><a href="#" class="subcategory" name="Necklaces">Necklaces</a></li>
                            <li><a href="#" class="subcategory" name="Bracelets">Bracelets</a></li>
                            <li><a href="#" class="subcategory" name="Earrings">Earrings</a></li>
                            <li><a href="#" class="subcategory" name="Cufflinks">Cufflinks</a></li>
                            <li><a href="#" class="subcategory" name="Watches">Watches</a></li>
                        </ul>
                    </li>
                    <li><a href="#" class="category" name="Novelty">Novelty</a>
                        <ul>
                            <li><a href="#" class="subcategory" name="Desk Toys">Desk Toys</a></li>
                            <li><a href="#" class="subcategory" name="Puzzles">Puzzles</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li><a href="#" class="division" name="Designers" >DESIGNERS</a>
                <ul>
                    <li><a href="#" class="category" name="Jacob Blitzer">Jacob Blitzer</a></li>
                </ul>
            </li>
            <li><a href="#" class="last division" name="Collections">COLLECTIONS</a>
                <ul>
                    <li><a href="#" class="category" name="Launch Collection">Launch Collection</a></li>
                </ul>
            </li>
        </ul>
    </nav>



    <!--
    <pre id="shop" class="nav-1-btn">SHOP | </pre>
    <pre id="designers" class="nav-1-btn"> DESIGNERS | </pre>
    <pre id="collections" class="nav-1-btn"> COLLECTIONS</pre>
    -->
    <!-- </div> -->
    <div id="main-nav2" class="nav">
        <a href="#" name="latest" onclick="alert('Database call to sort by ' + this.name)">LATEST</a> &nbsp;|&nbsp;
        <a href="#" name="popular" onclick="alert('Database call to sort by most ' + this.name)">POPULAR</a>
    </div>
    <form name="search-field" id="search-field" method="GET" action="<?php echo $Dir;?>/php/search.php">
        <input name="query"/>
        <button type="submit"><img src="http://localhost:8080/itp460/ITP_EmblemObjects/images/icon_search.png" alt="Search" height="15px" width="15px"/></button>
    </form>
</div>
<div id="drop-down-1">
    <div class="drop-down-col">
        <h1>SOLO OBJECTS</h1>
        JEWELRY<br/>
        <br/>
        rings<br/>
        bracelets<br/>
        pendants<br/>
        earrings<br/>
        cufflinks<br/>
    </div>
    <div class="drop-down-col" id="column-2">
        OTHER<br/>
        <br/>
        models<br/>
    </div>
</div>
</div>
<div style="clear:both"></div>

<script type="text/javascript">
    function searchCategoryAlert(category) {
        var division = getParent(category);
        var divisionName = division.getAttribute("name");
        alert("Database call to search by " + divisionName + " >> " + category.name);
    }

    function searchSubcategoryAlert(subcategory) {
        var category = getParent(subcategory);
        var division = getParent(category);
        var categoryName = category.getAttribute("name");
        var divisionName = division.getAttribute("name");
        alert("Database call to search by " + divisionName + " >> " +  categoryName + " >> " + subcategory.name);
    }

    function getParent(node) {
        return node.parentNode.parentNode.parentNode.firstChild;
    }


    $(".category").click(function() {
        searchCategoryAlert(this);
    });
    $(".subcategory").click(function() {
        searchSubcategoryAlert(this);
    });
</script>


