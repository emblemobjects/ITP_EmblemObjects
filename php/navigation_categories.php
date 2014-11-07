<?php
/**
 * Created by PhpStorm.
 * User: Angela
 * Date: 11/6/2014
 * Time: 4:46 PM
 */

include_once 'config.php';

class navigation{
    public static function get_categories(){
        global $con;
        $array_categories = [];
        $sql_categories = "SELECT * FROM item_category";
        $result_categories = mysqli_query($con, $sql_categories);
        if (!$result_categories){
            exit (mysqli_error($con));
        }
        while ($r = mysqli_fetch_array($result_categories)){
            $array_subcategories = [];
            $category_id = $r['category_id'];
            $sql_subcategories = "SELECT subcategory_id, subcategory_desc FROM item_subcategory WHERE category_id = $category_id";
            $result_subcategories = mysqli_query ($con, $sql_subcategories);
            if (!$result_subcategories){
                exit (mysqli_error($con));
            }
            while ($r2 = mysqli_fetch_array($result_subcategories)){
                array_push($array_subcategories, array('subcategory_id'=>$r2['subcategory_id'], 'subcategory_desc'=>$r2['subcategory_desc']));
            }
            array_push($array_categories, array('category_id'=>$r['category_id'], 'category_desc'=>$r['category_desc'], 'subcategory'=>$array_subcategories));
        }
        return $array_categories;
    }
    public static function categories_to_JS($array_categories){
        $categories_json = json_encode($array_categories);
        ?>
        <script>
            var store = window.store || {};
            store.categories = <?php echo $categories_json; ?>; // this creates the JSON
            console.log(store.categories); //temporary, to look at the array
        </script>
    <?php
    }
}