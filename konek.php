<?php
    date_default_timezone_set('Asia/Jakarta');
    $hostname = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'db_gereja';

    $konek = mysqli_connect($hostname,$username,$password,$database);
