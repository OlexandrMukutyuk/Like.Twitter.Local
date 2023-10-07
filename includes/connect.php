<?php
    $connections = mysqli_connect('localhost','root','','Twitter');
    if(!$connections){
        die('Error: Connect to data base');
    }