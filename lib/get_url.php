<?php
$phpSelf  = $_SERVER['PHP_SELF'];

function get_url($dest)
{
    global $BASE_PATH;
    global $phpSelf;

//    if (str_starts_with($dest, "/")) {  //not supported in PHP 7
    if (preg_match('/^\//', $dest)) {
        //handle absolute path
        return $dest;
    }
    //handle relative path
    $idx = strpos($phpSelf, $BASE_PATH);
    $baseURL = substr($phpSelf, 0, ($idx+strlen($BASE_PATH)));
    //return "$BASE_PATH/$dest"; //NJIT server doesn't work with this
    return "$baseURL/$dest";
}