<?php
    //Data base params
    define ('DB_HOST', 'localhost');
    define ('DB_USER', 'root');
    define ('DB_PASS', '');
    define ('DB_NAME', 'flights_platform');
    define('DB_PORT', '4000');

    // echo __FILE__ . "<br>" ;
    // echo dirname(dirname(__FILE__));
    //app root
    define('APPROOT', dirname(dirname(__FILE__)));
    //url root
    define('URLROOT', 'http://localhost/Flight Reservation Platform/Website/');
    //css root
    // define ('CSSROOT', dirname(dirname(dirname(__FILE__))) . '\public\css');
    //img src root
    // define ('IMGROOT', dirname(dirname(dirname(__FILE__))) . '\public\img');

    //sitename
    define('SITENAME', 'Flight Reservation Platform');
    
    session_start();
?>