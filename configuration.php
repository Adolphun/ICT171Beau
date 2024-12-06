<?php
session_start();

if (!isset($_SESSION['blogEntries'])) {
    $_SESSION['blogEntries'] = array();
}
?>