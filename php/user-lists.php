<?php
    

class user_lists {
	
	/*
	* getDesigerRequests
	* 
	* Input: $con: the database connection, $user_id: the id of the user
	* Output: An array containing the $user_id's enable requests
	*/
    public static function getDesignerRequests($con, $user_id) {       
		//include_once 'config.php';
        $sql = "SELECT e.enable_id, e.due_date, e.date_submitted, i.item_name, e.image_filepath, e.status
                FROM enable e
                INNER JOIN item i
                ON e.item_id = i.item_id
                WHERE e.user_id = " . $user_id .
                " ORDER BY e.enable_id ASC";
        
        $arr = array();      
        $r = mysqli_query($con, $sql);
        if (!$r){
            echo mysqli_error($con);
        } else {
            while($row = mysqli_fetch_assoc($r)) {
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
	public static function getAllRequests($con) {       
		//include_once 'config.php';
        $sql = "SELECT e.enable_id, e.due_date, e.date_submitted, i.item_name, e.image_filepath, e.status
                FROM enable e
                INNER JOIN item i
                ON e.item_id = i.item_id
                ORDER BY e.enable_id ASC";
        
        $arr = array();      
        $r = mysqli_query($con, $sql);
        if (!$r){
            echo mysqli_error($con);
        } else {
            while($row = mysqli_fetch_assoc($r)) {
                // Add it to the array
                $arr[] = $row;
            }
        }
        mysqli_close($con);
        return $arr;
    }
    
    
    
    public static function makeIdCell($id, $ml) {
		return '<div class="cell-w200 cell-h50 ' . $ml . '">#' . $id. '</div>';
    }
    public static function makeDateCell($date) {
        $date_time = new DateTime($date);
		return '<div class="cell-w200 cell-h50">' . $date_time->format("m/d/y g:i A") . '</div>';
    }
    public static function makeDueDate($due){
        return '<div class="cell-w150 cell-h50">' . ago(new DateTime($due)) . '</div>';
    }
    public static function makeNameCell($name) {
        return '<div class="cell-w250 cell-h50">' . $name . '</div>';
    }
    public static function makeArtworkCell($artwork){
        return '<div class="cell-w100 cell-h50"><img class="cell-img" src="'. DIR . "/" . $artwork .'"/></div>';
    }
    public static function makeButton($link, $class, $text) {
        return '<div class="cell-w90 cell-h50"><a href="' . $link . '"><span class="' . $class . '">' . $text . '</span></a></div>';
    } 
    
}



function pluralize($count, $text) {
	return $count . ( ( $count == 1 ) ? ( " $text" ) : ( " ${text}s" ) );
}

function ago($datetime) {
	$interval = date_create('now')->diff( $datetime );
	$suffix = ( $interval->invert ? ' ago' : '' );
	if ( $v = $interval->y >= 1 ) return pluralize( $interval->y, 'year' ) . $suffix;
	if ( $v = $interval->m >= 1 ) return pluralize( $interval->m, 'month' ) . $suffix;
	if ( $v = $interval->d >= 1 ) return pluralize( $interval->d, 'day' ) . $suffix;
	if ( $v = $interval->h >= 1 ) return pluralize( $interval->h, 'hour' ) . $suffix;
	if ( $v = $interval->i >= 1 ) return pluralize( $interval->i, 'minute' ) . $suffix;
	return pluralize( $interval->s, 'second' ) . $suffix;
}

?>