
<?php

function flash($message, $level = 'text-info'){
    //session()->flash('flash_message', $message);
    //session()->flash('flash_message_level', $level);
    Session::flash("flash_message", $message);
    Session::flash("flash_message_level", $level);
}
//flash notifications and messages with all requests
?>