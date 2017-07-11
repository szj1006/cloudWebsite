<?php
define('DB_HOST','localhost');
define('DB_USER','demo');
define('DB_PASS','987123000');
define('DB_NAME','demo');
$M = new mysql();
$M->connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
