<?php

ob_start();
session_start();
echo "<h1>Finalizado o Form Wizard</h1>";
var_dump((object)$_SESSION);

ob_end_flush();