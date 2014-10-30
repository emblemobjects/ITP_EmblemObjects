<?php
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
    //
    //
    //
    public function get_items($con){
        //
        // $sql = "SELECT item_id, item_tag, subcategory_desc, item_name, user_first_name, user_last_name, item_description, category_desc, item_type, collection_desc
        // FROM item, item_category, item_subcategory, user_table, collection
        // WHERE item.subcategory_id = item_subcategory.subcategory_id AND item_subcategory.category_id = item_category.category_id AND item.item_designer = user_table.user_ID AND item.collection_id = collection.collection_id";
        
        // $items_results = mysqli_query($con, $sql);
    } // end function get_items()

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
}
//items::display_grid($GLOBALS['items_array']);

