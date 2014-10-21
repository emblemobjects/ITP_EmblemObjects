<?php
/**
 * Created by PhpStorm.
 * User: Angela
 * Date: 10/19/2014
 * Time: 9:55 PM
 */

include_once 'db-connect-con.php';
//sql statement to select (maybe do a view?)
$sql = "SELECT item_id, item_tag, subcategory_desc, item_name, user_first_name, user_last_name, item_description, category_desc, item_type, collection_desc
        FROM item, item_category, item_subcategory, user_table, collection
        WHERE item.subcategory_id = item_subcategory.subcategory_id AND item_subcategory.category_id = item_category.category_id AND item.item_designer = user_table.user_ID AND item.collection_id = collection.collection_id";
$items_results = mysqli_query($con, $sql);

$items_array = array();

if (!$items_results){
    echo mysqli_error($con);
}
else {
    while ($row = mysqli_fetch_array($items_results)) {
        $item_id = $row['item_id'];
        $details_array = array();//this is creating the array that will be used to add to the 3rd dimension
        $sql_details = "SELECT item_detail_id, item_raw_price, material_id, material_desc, item_size FROM item_detail, material WHERE item_detail.material_id = material.material_id AND item_detail.item_id = $item_id";
        $sql_images = "SELECT material_id, image_filepath, item_id, is_primary FROM item_image WHERE item_id = $item_id";//selects all the images associated with the specific detail id
        $image_array = array();//this is the image array to be pushed into $items_array
        $image_results = mysqli_query($con, $sql_images);
        if (!$image_results) {
            echo mysqli_error($con);
        } else {
            while ($row3 = mysqli_fetch_array($image_results)) {
                array_push($image_array, array('material_id' => $row3['material_id'], 'image_filepath' => $row3['image_filepath'], 'is_primary' => $row3['is_primary']));//4th dimension array
            }
        }
        $detail_results = mysqli_query($con, $sql_details);
        if (!$detail_results) {
            echo mysqli_error($con);
        } else {
            while ($row2 = mysqli_fetch_array($detail_results)) {
                array_push($details_array, array('detail_id' => $row2['item_detail_id'],'material_id'=>$row2['material_id'],'price' => $row2['item_raw_price'], 'material' => $row2['material_desc'], 'size' => $row2['item_size']));
            }
        }
        //pushing another array to the second dimension
        array_push($items_array, array('id' => $row['item_id'], 'tag' => $row['item_tag'], 'subcategory' => $row['subcategory_desc'], 'name' => $row['item_name'], 'designer_first_name' => $row['user_first_name'], 'designer_last_name' => $row['user_last_name'], 'description' => $row['item_description'], 'category' => $row['category_desc'], 'type' => $row['item_type'], 'collection_name' => $row['collection_desc'], 'details' => $details_array, 'images' => $image_array));
    }
}

$items_json = json_encode($items_array);

?>
<script>
    var store = window.store || {};

    store.items = <?php echo $items_json; ?>; // this creates the JSON
    console.log(store.items); //temporary, to look at the object
</script>


