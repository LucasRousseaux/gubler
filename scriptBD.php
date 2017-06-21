<?php

$comando = 'mysql --user=root --password=  mysql < sql/Dump20170604.sql';

system( $comando, $error);

?>
