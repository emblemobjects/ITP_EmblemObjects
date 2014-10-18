<?php

include '../../php/json-store-objects.php';
//include 'http://localhost:8080/itp460/ITP_EmblemObjects/php/json-store-objects.php';

?>

if (!$items_results){
    echo mysqli_error($con);
}
else {
    $i = 0; // This keeps the first one separate from the rest
    while ($row = mysqli_fetch_array($r)){
        if ($i == 0){//if first one
            $object = array(array('id'=>$row['item_id'], 'tag'=>$row['item_tag'], 'subcategory'=>$row['subcategory_desc'], 'name'=>$row['item_name'], 'designer_first_name'=>$row['user_first_name'], 'designer_last_name'=>$row['user_last_name'], 'description'=>$row['item_description'], 'category'=>$row['category_desc'], 'type'=>$row['item_type'], 'collection_name'=>$row['collection_desc']));
            $i++; //no longer the "first" one
        }
        else { //pushing another array to the second dimension
            array_push($object, array('id'=>$row['item_id'], 'tag'=>$row['item_tag'], 'subcategory'=>$row['subcategory_desc'], 'name'=>$row['item_name'], 'designer_first_name'=>$row['user_first_name'], 'designer_last_name'=>$row['user_last_name'], 'description'=>$row['item_description'], 'category'=>$row['category_desc'], 'type'=>$row['item_type'], 'collection_name'=>$row['collection_desc']));
        }
  }
}