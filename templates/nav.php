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
                <a href="#"><h3 class="category" id="Accessories" onmouseover="showSubcategories('Accessories');">Accessories</h3></a>
                <a href="#"><h3 class="category" id="Art" onmouseover="showSubcategories('Art');">Art</h3></a>
                <a href="#"><h3 class="category" id="Gadgets" onmouseover="showSubcategories('Gadgets');">Gadgets</h3></a>
                <a href="#"><h3 class="category" id="Home" onmouseover="showSubcategories('Home');">Home</h3></a>
                <a href="#"><h3 class="category" id="Jewelry" onmouseover="showSubcategories('Jewelry');">Jewelry</h3></a>
                <a href="#"><h3 class="category" id="Novelty" onmouseover="showSubcategories('Novelty');">Novelty</h3></a>
            </div>
            <div class="nav-line"></div>
            
            <div class="nav-column" id="subcategories">
            </div>
            
            <div class="nav-line"></div>
            
            <div class="nav-column img-column">
                <a href="#"><img src="<?php echo DIR; ?>/images/placeholder1.jpg" width="210px" height="170px"/>
                <span class="nav-img-text">UNIQUE</span></a>
            </div>
            <div class="nav-column img-column">
                <a href="#"><img src="<?php echo DIR; ?>/images/placeholder2.jpg" width="210px" height="170px"/>
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


<div id="nav-search">
    <form method="get" action="<?php echo DIR; ?>/home/">
            <input class="ml-3" type="text" name="search" placeholder="Search..."/>
            <button type="sumbit"><div id="magnifying-glass"></div></button>
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


</div><!-- end div.container -->
</nav><!-- end nav -->
<!-- <div style="clear:both"></div> -->

