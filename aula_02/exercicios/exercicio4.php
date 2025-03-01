<?php

$optionA = 1;
$optionB = 2;
$optionC = 3;

$selecionei = $optionB;

switch ($selecionei) {
    case 1:
        echo "vc escolheu a opção A";
        break;
    
    case 2:
        echo "vc escolheu a opção B";
        break;
    case 3:
        echo "vc escolheu a opção C";
        break;
    
    default:
        echo "escolha uma opção";
        break;
}

?>