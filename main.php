<?php
/**
 * Created by PhpStorm.
 * User: gustavoweb
 * Date: 29/08/2018
 * Time: 17:51
 */
ob_start();
session_start();
echo "<h1>Finalizado o Form Wizard</h1>";

var_dump((object)$_SESSION['wizard']);

ob_end_flush();