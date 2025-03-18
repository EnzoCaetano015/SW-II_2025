<?php

$json_str = '{"Jason":38,"Ada":35,"Delphino":26}';


$json_arr = json_decode($json_str, true);


var_dump($json_arr);

?>