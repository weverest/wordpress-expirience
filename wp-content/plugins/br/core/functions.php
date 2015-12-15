<?php

function br_install(){
    global $wpdb;
    //Create Estate and City tables
    $ec_path = __DIR__.'/files/estate-city.sql';
    if( file_exists($ec_path) ){
        $fcontents = file_get_contents($ec_path);
        //$wpdb->query($fcontents);
    }
}