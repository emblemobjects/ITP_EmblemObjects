<?php
    
//if (empty($_REQUEST["query"])) {
//    header("location: $Dir/home");
//} else {
    
   // readfile("http://localhost:8080/itp460/ITP_EmblemObjects/home");
    
    function getUserRequests($user_id) {
        include_once '../../php/config.php';
        
        $sql = "SELECT e.enable_id, e.due_date, i.item_name, e.image_filepath
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
                foreach($row as $name => $value) {
                    
                }
                // Add it to the array
                $arr[] = $row;
            }
        }
        mysqli_close($con);
        return $arr;
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