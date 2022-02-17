<?php
    // var_dump($data);
    // echo 'hello from showusers';
    foreach($data['users'] as $user){
    echo 'Name of user ' . $user->id . ' : ' . $user->user_name . '<br>';
    echo 'Pass of user ' . $user->id . ' : ' . $user->user_pass . '<br>';
    }
?>