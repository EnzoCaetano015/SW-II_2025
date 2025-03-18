<?php

    $empregados = array('empregados' => array(
        array(
            'nome' => 'caetano',
            'idade' => 17,
            'sexo' => 'muito macho'
        ),
        array(
            'nome' => 'caspirro',
            'idade' => 17,
            'sexo' => 'macho' 
        ),
        array(
            'nome' => 'kevin',
            'idade' => 18,
            'sexo' => 'quase macho' 
        ),

    ));

    $json_str = json_encode($empregados);

    echo "$json_str";


?>