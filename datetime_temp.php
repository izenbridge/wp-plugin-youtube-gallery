    date_default_timezone_set("Asia/Kolkata");
    echo date('d-m-Y H:i:s'); //Returns IST 

$date=date("Y-m-d g:i:s",time());
wp_die($date);

