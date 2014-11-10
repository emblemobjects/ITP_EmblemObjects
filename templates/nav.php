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
                    echo "<a href='?category_id=$category_id&subcategory_id= 0'><h3 class='category' data-attr-id='$category_id' >$category_desc</h3></a>";
                }
                ?>

            </div>
            <div class="nav-line"></div>
            
            <div class="nav-column" id="subcategories">
            </div>
            
            <div class="nav-line"></div>
            
            <div class="nav-column img-column">
                <a href="?type=2"><img src="<?php echo DIR; ?>/images/placeholder1.jpg" width="210px" height="170px"/>
                <span class="nav-img-text">UNIQUE</span></a>
            </div>
            <div class="nav-column img-column">
                <a href="?type=1"><img src="<?php echo DIR; ?>/images/placeholder2.jpg" width="210px" height="170px"/>
                <span class="nav-img-text">DESIGN</span></a>
            </div>
            <a href="?type=all"><span class="nav-img-text" id="nav-all-text">ALL</span></a>
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
        <?php
        if ($_SESSION['search'] == ""){
            $search = "";
        }
        else {
            $search = $_SESSION['search'];
        }
        ?>
            <input class="ml-3" type="text" name="search" placeholder = "Search..." value="<?php echo $search ?>"/>
            <button type="sumbit"><div id="magnifying-glass"></div></button>
    </form>
</div>

<div id="nav-sort">
    <?php
    if ($_SESSION['order_by'] == 2){
        $newestClass = "nav-btn-active";
        $popularClass = "";
    }
    else {
        $popularClass = "nav-btn-active";
        $newestClass = "";
    }
    ?>
    <div class="nav-btn <?php echo $newestClass ?>">
        <a href="?order_by=2">Newest</a>
    </div>
    <div class="nav-btn <?php echo $popularClass ?>">
        <a href="?order_by=1">Popular</a>
    </div>
</div>


</div><!-- end div.container -->
</nav><!-- end nav -->
<!-- <div style="clear:both"></div> -->

<?php
include_once '../php/navigation_categories.php';
navigation::get_categories();
?>