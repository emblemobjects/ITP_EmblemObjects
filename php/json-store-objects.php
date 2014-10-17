<?php
/**
 * Created by PhpStorm.
 * User: Angela
 * Date: 10/16/2014
 * Time: 6:48 PM
 */
include_once 'db-connect-con.php';
$sql = "SELECT item_id, item_tag, subcategory_desc, item_name, user_first_name, user_last_name, item_description, category_desc, item_type, collection_desc
        FROM item, item_category, item_subcategory, user_table, collection
        WHERE item.subcategory_id = item_subcategory.subcategory_id AND item_subcategory.category_id = item_category.category_id AND item.item_designer = user_table.user_ID AND item.collection_id = collection.collection_id";
$r = mysqli_query($con, $sql);
if (!$r){
    echo mysqli_error($con);
}
else {
    $i = 0;
    while ($row = mysqli_fetch_array($r)){
        if ($i == 0){
            $object = array(array($row['item_id'], $row['item_tag'], $row['subcategory_desc'], $row['item_name'], $row['user_first_name'], $row['user_last_name'], $row['item_description'], $row['category_desc'], $row['item_type'], $row['collection_desc']));
            $i++;
        }
        else {
            array_push($object, array($row['item_id'], $row['item_tag'], $row['subcategory_desc'], $row['item_name'], $row['user_first_name'], $row['user_last_name'], $row['item_description'], $row['category_desc'], $row['item_type'], $row['collection_desc']));
        }
  }
}
?>
<script>
    var object = <?php echo json_encode($object, JSON_FORCE_OBJECT); ?>;
    console.log(object);
</script>
