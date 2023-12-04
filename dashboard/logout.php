<?php
session_start();
session_destroy();
unset($_SESSION['username']);
unset($_SESSION['nik']);
header("Location:http://localhost:8080/gpdi/");
