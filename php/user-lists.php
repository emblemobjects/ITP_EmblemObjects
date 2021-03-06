<?php


class user_lists
{

    public static function getDesignerID($con, $enable_id)
    {

    }

    /*
    * getDesigerRequests
    *
    * Input: $con: the database connection, $designer_id: the id of the user
    * Output: An array containing the $user_id's enable requests
    */
    public static function getDesignerRequests($con, $designer_id)
    {
        $sql = "SELECT enable_id, due_date, date_submitted, item_name, image_filepath, status
                FROM enable e, item i
                WHERE e.item_id = i.item_id
				AND item_designer = " . $designer_id .
            " ORDER BY enable_id DESC";

        $arr = array();
        $r = mysqli_query($con, $sql);
        if (!$r) {
            echo mysqli_error($con);
        } else {
            while ($row = mysqli_fetch_assoc($r)) {
                // Add it to the array
                $arr[] = $row;
            }
        }
        mysqli_close($con);
        return $arr;
    }


    /*
    * getAllRequests
    *
    * Input: $con: the database connection
    * Output: An array containing all the enable requests for staff
    */
    public static function getAllRequests($con)
    {
        //include_once 'config.php';
        $sql = "SELECT enable_id, due_date, date_submitted, item_name, image_filepath, status
                FROM enable e, item i
                WHERE e.item_id = i.item_id
                ORDER BY enable_id DESC";


        $arr = array();
        $r = mysqli_query($con, $sql);
        if (!$r) {
            echo mysqli_error($con);
        } else {
            while ($row = mysqli_fetch_assoc($r)) {
                // Add it to the array
                $arr[] = $row;
            }
        }
        mysqli_close($con);
        return $arr;
    }


    public static function makeIdCell($id, $ml)
    {
        return '<div class="cell-w200 cell-h50 ' . $ml . '">#' . $id . '</div>';
    }

    public static function makeDateCell($date)
    {
        $date_time = new DateTime($date);
        return '<div class="cell-w200 cell-h50">' . $date_time->format("m/d/y g:i A") . '</div>';
    }

    public static function makeDueDate($due)
    {
        return '<div class="cell-w150 cell-h50">' . createDate(new DateTime($due)) . '</div>';
    }

    public static function makeNameCell($name)
    {
        return '<div class="cell-w250 cell-h50">' . $name . '</div>';
    }

    public static function makeArtworkCell($artwork)
    {
        return '<div class="cell-w100 cell-h50"><img class="cell-img" src="' . DIR . "/" . $artwork . '"/></div>';
    }

    public static function makeButton($link, $class, $text)
    {
        return '<div class="cell-w90 cell-h50"><a href="' . $link . '"><span class="' . $class . '">' . $text . '</span></a></div>';
    }

}


function createDate($datetime)
{
	$datetime1 = new DateTime();
	$interval = $datetime1->diff($datetime);		
	$mins = $interval->i;
	$hours = $interval->h + ($interval->d*24);			
	if ($hours) {
		$hours = $hours . " hr ";
	} else {
		$hours - "";
	}
	return $interval->format('%r') . $hours . $mins . " min";
}

?>