<?php
function users_check_duplicate($errorInfo)
{
    if ($errorInfo[1] === 1062) {
        //https://www.php.net/manual/en/function.preg-match.php
        //NOTE: this assumes your table name is `User`, edit it accordingly
        preg_match("/Duplicate.(\w+)/", $errorInfo[2], $matches);
        if (isset($matches[1])) {
            flash("The chosen " . $matches[1] . " is not available.", "warning");
        } else {
            //TODO come up with a nice error message
            flash("Duplicate type: An unhandled error occured", "danger");  //lori
            //this will log the output to the terminal/console that's running the php server
            error_log(var_export($errorInfo, true));
        }
    } else {
        //TODO come up with a nice error message
        flash("Not 1062: An unhandled error occured", "danger");  //lori
        //this will log the output to the terminal/console that's running the php server
        error_log(var_export($errorInfo, true));
    }
}