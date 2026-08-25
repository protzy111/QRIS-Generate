<?php
$p=$argv[1]??'';if($p==='')exit("Usage: php generate_admin_hash.php 'PASSWORD'\n");echo password_hash($p,PASSWORD_DEFAULT).PHP_EOL;
