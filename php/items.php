<?php
include_once 'config.php';
/* items.php
 *
 * all php functions related items generation from DB
 *
 * USING:
 * include this file after config.php
 * <?php include '../php/items.php' ?>
 * 
 * FUNCTION LIST:
 * search_DB - search for items and write to items php array
 * convert_JSON - convert items php array into json
 * display_grid - display items php array on page in grid layout
 */
// echo 'items.php<hr/>'; // debug line - comment out for prod

// include_once 'config.php';
// include_once 'json-store-objects.php';

// CLASS items - to call items::function_name();
class items  {
    //Function
    //Required: items_array from json-store-objects.php
    //Output: store items in grid layout
    public static function display_grid($items){
        for ($i = 0; $i < count($items); $i++): ?>
            
            <?php // restart after alt syntx
            $primaryImage = 0;//Default to 0 if there's an error or whatever

            for ($j = 0; $j < count($items[$i]['images']); $j++){
                if ($items[$i]['images'][$j]['is_primary']==1){
                    $primaryImage = $j;
                } // end if ($items[$i]['images'][$j]['is_primary']==1)
            } // end for ($j = 0; $j < count($items[$i]['images']); $j++)

            $image_filepath = DIR."/objects/".$items[$i]['images'][$primaryImage]['image_filepath'];
            $designer = $items[$i]['designer_first_name']." ".$items[$i]['designer_last_name'];
            $collection_name = $items[$i]['collection_name'];
            $configurations = count($items[$i]['details']);
            $lowest_price = 0;

            for ($j = 0; $j < count ($items[$i]['details']); $j++){
                if ($j == 0){
                    $lowest_price = $items[$i]['details'][$j]['price'];
                } else {
                    if ($items[$i]['details'][$j]['price'] < $lowest_price){
                        $lowest_price = $items[$i]['details'][$j]['price'];
                    } // end if ($items[$i]['details'][$j]['price'] < $lowest_price)
                } // end  if else ($j == 0)
            } // end for ($j = 0; $j < count ($items[$i]['details']); $j++)

            $description = $items[$i]['description'];
            $item_name = $items[$i]['name'];
            $item_type = "Unique";

            if ($items[$i]['type'] == 1){
                $item_type = "Custom";
            } // end if ($items[$i]['type'] == 1)
            else {
                $item_type = "Solo";
            }
            ?>

            <!-- H TML BLOCK -->
            <a class="no-go" href="#" data-item-id="<?php echo $items[$i]['id']?>">
            <div class="item-container">
                    <div class="item-image">
                        <img src="<?php echo $image_filepath ?>" />
                    </div>
                    <div class="item-hover">
                        <div class="hover-designer">
                            by <span class="white cap"><?php echo $designer ?></span>
                        </div>
                        <div class="hover-collection">
                            from <span class="white cap"><?php echo $collection_name ?></span> Collection
                        </div>
                        <div class="hover-configuration">
                            <span class="white"><?php echo $configurations ?></span> configurations
                        </div>
                        <div class="hover-price">
                            starting at $<span class="white"><?php echo $lowest_price ?></span>
                        </div>
                        <div class="hover-description">
                            <?php echo $description ?>
                        </div>
                        ...
                    </div>
                    <div class="item-description">
                        <div class="description-name"><?php echo $item_name ?></div>
                        <div class="description-type"><?php echo $item_type ?></div>
                    </div>
                    <div class="clear"></div>
            </div>
            </a>
            <!--END HTML BLOCK-->

        <?php endfor; // end for ($i = 0; $i < count($items); $i++)
    } // end function display_grid()


    //Function: getPrimaryImage
    //Required: $items_array from json-store-objects.php
    //Required: $id of the specific object
    //Return: the image filepath for the primary image of the object
    public static function getPrimaryImage($items, $id){
        $primaryImage = 0;//Default to 0 if there's an error or whatever
        for ($j = 0; $j < count($items[$id]['images']); $j++){
            if ($items[$id]['images'][$j]['is_primary']==1){
                $primaryImage = $j;
            }
        }
        $image_filepath = DIR."/objects/".$items[$id]['images'][$primaryImage]['image_filepath'];
        return $image_filepath;
    }


    //Function: get_field_value
    //Required: $id of the specific object, the field name to look for
    //Return: the value of the field
    public static function get_field_value($id, $field_name){
        $value = $GLOBALS['items_array'][$id][$field_name];
        return $value;
    }


    //Function: get_detail_info
    //Similar to get_field_value, but needs to go one more array deep to retrieve detail information
    //Required: $id of the object
    //Required: the detail id
    //Required: the field name
    //Return: the value of the field
    public static function get_detail_info($id, $detail_id, $field_name){
        $value = $GLOBALS['items_array'][$id]['details'][$detail_id][$field_name];
        return $value;
    }
    public static function get_items($category_id, $subcategory_id, $type, $order_by, $search_text){
        global $con;
        //sql statement to select -basic
        $sql = "SELECT item_id, item_tag, subcategory_desc, item_name, user_first_name, user_last_name, item_description, category_desc, item_type, collection_desc
        FROM item, item_category, item_subcategory, user_table, collection
        WHERE item.subcategory_id = item_subcategory.subcategory_id AND item_subcategory.category_id = item_category.category_id AND item.item_designer = user_table.user_ID AND item.collection_id = collection.collection_id ";
        if ($category_id != 0){
            $sql = $sql . "AND item_category.category_id = $category_id ";
        }
        if ($subcategory_id != 0){
            $sql = $sql . "AND item.subcategory_id = $subcategory_id ";
        }
        if ($type != 2){
            $sql = $sql . "AND item.item_type = $type ";
        }
        if ($search_text != ""){
            $sql = $sql . "AND item.item_name LIKE '%$search_text%' OR item.item_tag LIKE '%$search_text%' OR item_subcategory.subcategory_desc LIKE '%$search_text%' OR user_table.user_first_name LIKE '%$search_text%' OR user_table.user_last_name LIKE '%$search_text%' OR item_category.category_desc LIKE '%$search_text%' OR collection.collection_desc LIKE '%$search_text%' ";
        }
        if ($order_by !=0){
            if ($order_by == 1){
                //Order by popular
                $sql = $sql . "ORDER BY purchase_count ";
            }
            else {
                //Order by latest
                $sql = $sql . "ORDER BY item_id DESC";
            }
        }
        $items_results = mysqli_query($con, $sql);

        $items_array = array();

        // Error Check - items results
        if (!$items_results) {
            exit('$items_results error: ' . mysqli_error($con));
        }

        while ($items_row = mysqli_fetch_array($items_results)) {
            // current item_id
            $item_id = $items_row['item_id'];

            /*
             * image of current item_id
             */
            //reset image array
            $image_array = array();

            // Select all images with current item_id
            $image_sql = "SELECT material_id, image_filepath, item_id, is_primary FROM item_image WHERE item_id = $item_id";

            $image_results = mysqli_query($con, $image_sql);
            // Error Check - image results
            if (!$image_results) {
                exit('$image_results error: ' . mysqli_error($con));
            }

            while ($image_row = mysqli_fetch_array($image_results)) {
                array_push($image_array, array('material_id' => $image_row['material_id'], 'image_filepath' => $image_row['image_filepath'], 'is_primary' => $image_row['is_primary']));//image array
            }


            /*
             * detail of current item_id
             */
            //reset details array
            $detail_array = array();

            // Select all details with current item_id
            $detail_sql = "SELECT item_detail_id, item_raw_price, item_detail.material_id, material_desc, item_size FROM item_detail, material WHERE item_detail.material_id = material.material_id AND item_detail.item_id = $item_id";

            $detail_results = mysqli_query($con, $detail_sql);
            // Error Check - detail results
            if (!$detail_results) {
                exit('$detail_results error: ' . mysqli_error($con));
            }

            while ($detail_row = mysqli_fetch_array($detail_results)) {
                array_push($detail_array, array('detail_id' => $detail_row['item_detail_id'],'material_id'=>$detail_row['material_id'],'price' => $detail_row['item_raw_price'], 'material' => $detail_row['material_desc'], 'size' => $detail_row['item_size']));
            }
            $material_array = [];
            for ($i = 0; $i < count($detail_array); $i++) {
                $insertOption = 1;
                for ($j = 0; $j < count($material_array); $j++) {
                    if ($detail_array[$i]['material_id'] == $material_array[$j]['mat_id']) {
                        $insertOption = 0;
                    }
                }
                if ($insertOption == 1) {
                    array_push($material_array, array('mat_id'=>$detail_array[$i]['material_id'], 'mat_name'=>$detail_array[$i]['material']));
                }
            }
            $size_array = [];
            for ($i = 0; $i < count($detail_array); $i++) {
                $insertOption = 1;
                for ($j = 0; $j < count($size_array); $j++) {
                    if ($detail_array[$i]['size'] == $size_array[$j]) {
                        $insertOption = 0;
                    }
                }
                if ($insertOption == 1) {
                    array_push($size_array, $detail_array[$i]['size']);
                }
            }

            //pushing another array to the second dimension
            array_push($items_array, array('id' => $items_row['item_id'], 'tag' => $items_row['item_tag'], 'subcategory' => $items_row['subcategory_desc'], 'name' => $items_row['item_name'], 'designer_first_name' => $items_row['user_first_name'], 'designer_last_name' => $items_row['user_last_name'], 'description' => $items_row['item_description'], 'category' => $items_row['category_desc'], 'type' => $items_row['item_type'], 'collection_name' => $items_row['collection_desc'], 'details' => $detail_array, 'images' => $image_array, 'material_array' => $material_array, 'size_array' => $size_array));
        }
        return $items_array;
    }
    public static function items_encode($items_array){
        $items_json = json.encode($items_array);
        ?>
        <script>
            var store = window.store || {};

            store.items = <?php echo $items_json; ?>; // this creates the JSON
            console.log(store.items); //temporary, to look at the object
        </script>
        <?php
    }
}

