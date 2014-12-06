<?php
// include_once "../php/config.php";
?>

<!-- NAV -->
<nav>
    <div class="container">

        <ul class="nav" onmouseleave="clearColumns();">
            <li>
                <a href="#">Shop</a>

                <div>
                    <div class="nav-column" id="categories">
                        <a href="#"><h3 class="category" id="Accessories"
                                        onmouseover="showSubcategories('Accessories');">Accessories</h3></a>
                        <a href="#"><h3 class="category" id="Art" onmouseover="showSubcategories('Art');">Art</h3></a>
                        <a href="#"><h3 class="category" id="Gadgets" onmouseover="showSubcategories('Gadgets');">
                                Gadgets</h3></a>
                        <a href="#"><h3 class="category" id="Home" onmouseover="showSubcategories('Home');">Home</h3>
                        </a>
                        <a href="#"><h3 class="category" id="Jewelry" onmouseover="showSubcategories('Jewelry');">
                                Jewelry</h3></a>
                        <a href="#"><h3 class="category" id="Novelty" onmouseover="showSubcategories('Novelty');">
                                Novelty</h3></a>
                    </div>
                    <div class="nav-line"></div>

                    <div class="nav-column" id="subcategories">
                    </div>

                    <div class="nav-line"></div>

                    <div class="nav-column img-column">
                        <a href="#"><img src="placeholder1.jpg" width="210px" height="170px"/>
                            <span class="nav-img-text">UNIQUE</span></a>
                    </div>
                    <div class="nav-column img-column">
                        <a href="#"><img src="placeholder2.jpg" width="210px" height="170px"/>
                            <span class="nav-img-text">DESIGN</span></a>
                    </div>
                    <a href="#"><span class="nav-img-text" id="nav-all-text">ALL</span></a>
                </div>
            </li>
            <li>
                <a href="#">Collections</a>

                <div>
                    <div class="nav-column">
                        <a href="#"><h3 style="color:#888">Launch Collection</h3></a>
                    </div>
                </div>
            </li>
            <li><a href="#">Designers</a></li>
        </ul>

        <!--
        <div id="nav-type">
            <div id="nav-shop" class="nav-btn nav-btn-active ml-1">
                <a href="#shop">SHOP</a><div class="nav-br"></div>
            </div>
            <div class="nav-btn">
                <a href="#collection">COLLECTION</a><div class="nav-br"></div>
            </div>
            <div class="nav-btn">
                <a href="#designer">DESIGNER</a>
            </div>
        </div>

        -->

        <div id="nav-search">
            <form method="get" action="<?php //echo DIR; ?>/home/">
                <input class="ml-3" type="text" name="search" placeholder="Search..."/>
                <button type="sumbit">
                    <div id="magnifying-glass"></div>
                </button>
            </form>
        </div>

        <div id="nav-sort">
            <div class="nav-btn nav-btn-active">
                <a href="#newest">Newest</a>
            </div>
            <div class="nav-btn">
                <a href="#popular">Popular</a>
            </div>
        </div>


    </div>
    <!-- end div.container -->
</nav><!-- end nav -->


<!-- <div style="clear:both"></div> -->

<!--
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


<div id="main-nav2" class="nav">
        <a href="#" name="latest" onclick="alert('Database call to sort by ' + this.name)">LATEST</a> &nbsp;|&nbsp;
        <a href="#" name="popular" onclick="alert('Database call to sort by most ' + this.name)">POPULAR</a>
</div>

<form name="search-field" id="search-field" method="GET" action="<?php //echo $Dir;?>/php/search.php">
        <input name="query"/>
        <button type="submit"><img src="http://localhost:8080/itp460/ITP_EmblemObjects/images/icon_search.png" alt="Search" height="15px" width="15px"/></button>
</form>
-->