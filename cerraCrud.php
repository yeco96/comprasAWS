<?php
session_start();
$_SESSION["datos-usuario"] = null;
header("Location: ../index.php");