<?php
if (empty($_SESSION['isStarted'])) {
    $_SESSION['isStarted'] = 1;
    $_SESSION['category_id'] = 0;
    $_SESSION['subcategory_id'] = 0;
    $_SESSION['type'] = 0;
    $_SESSION['order_by'] = 0;
    $_SESSION['search'] = "";
}
if (!empty($_REQUEST['category_id'])) {
    if ($_REQUEST['category_id'] == "all") {
        $_SESSION['category_id'] = 0;
    }
    $_SESSION['category_id'] = helper::escape_str($con, $_REQUEST['category_id']);
}
if (!empty($_REQUEST['subcategory_id'])) {
    if ($_REQUEST['subcategory_id'] == "all") {
        $_SESSION['subcategory_id'] = 0;
    }
    $_SESSION['subcategory_id'] = helper::escape_str($con, $_REQUEST['subcategory_id']);
}
if (!empty($_REQUEST['type'])) {
    if ($_REQUEST['type'] == "all") {
        $_SESSION['type'] = 0;
    }
    $_SESSION['type'] = helper::escape_str($con, $_REQUEST['type']);
}
if (!empty($_REQUEST['order_by'])) {
    $_SESSION['order_by'] = helper::escape_str($con, $_REQUEST['order_by']);
}
if (!empty($_REQUEST['search'])) {
    $_SESSION['search'] = helper::escape_str($con, $_REQUEST['search']);
}

$store_items_result = items::get_items($_SESSION['category_id'], $_SESSION['subcategory_id'], $_SESSION['type'], $_SESSION['order_by'], $_SESSION['search']);
navigation::categories_to_JS(navigation::get_categories());
items::to_JS($store_items_result);
?>

    <!-- NAV -->
    <script>
        var directory = '<?php echo DIR ?>';
    </script>
    <script type="text/javascript" src="<?php echo DIR; ?>/js/nav.js"></script>


    <nav>
        <div class="container">

            <ul class="nav" onmouseleave="clearColumns();">
                <li>
                    <a href="<?php echo DIR ?>/home/index.php">Shop</a>

                    <div>
                        <div class="nav-column dark-nav-color" id="categories">
                            <?php
                            $array_categories = navigation::get_categories();
                            for ($i = 0; $i < count($array_categories); $i++) {
                                $category_id = $array_categories[$i]['category_id'];
                                $category_desc = $array_categories[$i]['category_desc'];
                                echo "<a href='" . DIR . "/home/index.php?category_id=$category_id&subcategory_id= 0'><h3 class='category' data-attr-id='$category_id' >$category_desc</h3></a>";
                            }
                            ?>

                        </div>
                        <div class="nav-line"></div>

                        <div class="nav-column" id="subcategories">
                        </div>

                        <div class="nav-line"></div>

                        <div class="nav-column img-column">
                            <a href="?type=2"><img src="<?php echo DIR; ?>/images/placeholder1.jpg" width="190px"
                                                   height="150px" class="nav-object-image"/>
                                <span class="nav-img-text">UNIQUE</span></a>
                        </div>
                        <div class="nav-column img-column">
                            <a href="?type=1"><img src="<?php echo DIR; ?>/images/placeholder2.jpg" width="190px"
                                                   height="150px" class="nav-object-image"/>
                                <span class="nav-img-text">DESIGN</span></a>
                        </div>
                        <a href="?type=all"><span class="nav-img-text" id="nav-all-text">ALL</span></a>
                    </div>
                </li>
                <li>
                    <a href="#">Collections</a>

                    <div>
                        <div class="nav-column dark-nav-color">
                            <a href="#"><h3>Launch Collection</h3></a>
                        </div>
                    </div>
                </li>
                <li>
                    <a href="#">Designers</a>

                    <div>
                        <div class="nav-column dark-nav-color">
                            <a href="#"><h3>Jacob Blitzer</h3></a>
                        </div>
                    </div>
                </li>
            </ul>


            <div id="nav-search">
                <form method="get" action="<?php echo DIR; ?>/home/">
                    <?php
                    if ($_SESSION['search'] == "") {
                        $search = "";
                    } else {
                        $search = $_SESSION['search'];
                    }
                    ?>
                    <input class="ml-3" type="text" name="search" placeholder="Search..."
                           value="<?php echo $search ?>"/>
                    <button type="sumbit">
                        <div id="magnifying-glass"></div>
                    </button>
                </form>
            </div>

            <div id="nav-sort">
                <?php
                if ($_SESSION['order_by'] == 2) {
                    $newestClass = "nav-btn-active";
                    $popularClass = "";
                } else {
                    $popularClass = "nav-btn-active";
                    $newestClass = "";
                }
                ?>
                <a href="?order_by=2">
                    <div class="nav-btn <?php echo $newestClass ?>">
                        Newest
                    </div>
                </a>
                <a href="?order_by=1">
                    <div class="nav-btn <?php echo $popularClass ?>">
                        Popular
                    </div>
                </a>
            </div>


        </div>
        <!-- end div.container -->
    </nav><!-- end nav -->
    <!-- <div style="clear:both"></div> -->

<?php
navigation::get_categories();
?>