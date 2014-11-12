<?php
session_start();

unset($_SESSION['pseudo']);

session_unset();

session_destroy();

header ('Location: ../index.php');