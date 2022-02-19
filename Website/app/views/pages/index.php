
<?php
    //this page is the home page showing reservation,  reservations need loging in
    //APPROOT is a contant defined in config.php file
    // echo APPROOT;   
    // echo "<br>" . URLROOT;
    // echo '<br>'. SITENAME;
    // echo "<br>" .  __FILE__;

    // header('location : home.php');
    foreach($data['flights'] as $flight){
        echo "Flight departure : " . $flight->departureAdress;
        echo '<br>';
    }

?>

