<?php

$alunos = [
    "Ana" => 8.5,
    "Bruno" => 7.2,
    "Carlos" => 9.1,
    "Diana" => 6.8,
    "Eduardo" => 7.9
];

$soma = 0;
$maiorNota = -1;
$melhorAluno = "";

foreach ($alunos as $nome => $nota) {
    $soma += $nota;

    if ($nota > $maiorNota) {
        $maiorNota = $nota;
        $melhorAluno = $nome;
    }
}

$media = $soma / count($alunos);

echo "A média das notas dos alunos é: " . number_format($media, 2) . "\n";
echo "O aluno com a maior nota é: $melhorAluno, sua nota: $maiorNota\n";


?>