<?php
include_once '../php/navigation_categories.php';
navigation::categories_to_JS(navigation::get_categories());
?>

<!-- NAV -->
<nav>
<div class="container">

<ul class="nav" onmouseleave="clearColumns();">
    <li>
        <a href="#">Shop</a>
        <div>
            <div class="nav-column" id="categories">
                <?php
                $array_categories = navigation::get_categories();
                for ($i = 0; $i < count($array_categories); $i++){
                    $category_id = $array_categories[$i]['category_id'];
                    $category_desc = $array_categories[$i]['category_desc'];
                    echo "<a href='#'><h3 class='category' id='$category_id' onmouseover='showSubcategories($category_id);'>$category_desc</h3></a>";
                }
                ?>

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

<?php
include_once '../php/navigation_categories.php';
navigation::get_categories();
?>