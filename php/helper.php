<?php
/* helper.php
 * 
 * DESCRIPTION:
 * helper file - basic php functions for easier access / manipulation
 * ALL helper function will go in helper class
 * can be called by "helper::function_name();"
 * please document your function by adding it function list below and commenting the function
 *
 * TESTING:
 * Test you code in sandbox by creating a new private function - follow example
 * Add you function to sandbox::run
 * your addec function will auto execute on load
 *
 * USING:
 * incude this file after config.php
 * <?php include DIR.'/php/helper.php' ?>
 *
 * FUNCTION LIST:
 * secure_file - prevent access to file directly
 * get_file - return current file name
 * escape_str - strings - return escaped string
 * redirect_page - redirect use to page from parameter
 */

// echo 'helper.php<hr/>'; // debug line - comment out for prod

// MUST Include config.php
include_once 'config.php';

// CLASS helper - to call helper::functtion_name();
class helper
{
    // functions, const

    // Prevent direct access to file
    // @param __FILE__, $_SERVER['SCRIPT_NAME']
    // @require DIR must be set
    public static function secure_file($file)
    {
        $file = helper::get_file($file);
        $path = $_SERVER['SCRIPT_NAME'];

        if (strpos($path, $file)) {
            header('location: ' . DIR . '/home/index.php');
        }
    }

    // Get curernt file name
    // @param __FILE__, file extension str if you want extension removed.
    public static function get_file($file, $extension = NULL)
    {
        // function
        if (isset($extension)) {
            return basename($file, $extension);
        } else {
            return basename($file);
        }
    }

    // Get escaped value
    // @param $con = mysqli_connect, str need to be escaped
    // @require function must be called after $con = mysqli_connect
    public static function escape_str($con, $value)
    {
        return mysqli_real_escape_string($con, $value);
    }

    // Redirect to page
    // @param $valid allow access to page, false for redirect
    // @param $page must contain "/" and extendsion
    // @require must be called after DIR
    public static function redirect_page($valid, $page)
    {
        if ($valid == false) {
            header('location: ' . DIR . $page);
        } else {
            return;
        }
    }
}


// Test your code HERE
class sandbox
{

    // Run your sandbox function here
    public function run()
    {
        // Run your test function
        echo 'helper.php exec sandbox::run();<hr/>'; // debug line
        // sandbox::test_function();

        // sandbox::test_secure_file();
        // sandbox::test_get_file();
        // sandbox::test_escape_str();
    }

    // Example Function
    private function test_function()
    {
        // Test code
        // echo "I am test code!";
    }


    private function test_secure_file()
    {
        helper::secure_file(__FILE__);
    }

    private function test_get_file()
    {
        echo helper::get_file(__FILE__, '.php');
    }

    private function test_escape_str()
    {
        include_once 'db-con.php';

        if (!$con) {
            exit(mysqli_error($con));
        }

        $sql = "There's a";

        echo $sql;

        echo '<br/>';

        echo helper::escape_str($con, $sql);
    }

}

// Run
// sandbox::run(); // comment out for prod

## END OF FILE ##