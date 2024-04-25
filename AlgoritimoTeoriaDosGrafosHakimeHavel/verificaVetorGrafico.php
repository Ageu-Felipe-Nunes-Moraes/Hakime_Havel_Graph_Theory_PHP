
<?php

//Hakime Havel

function reorganizar_vetor($vetor){ // Organiza a lista em ordem decrescente
    rsort($vetor);
    return $vetor;
}

function mostra_vetor($vetor){
    echo "[" . implode(", ", $vetor) . "]\n";
}

// Função que verifica se é um vetor gráfico por meio dos princípios de Hakime Havel
function vetor_grafico($vetor){
    $contador = 0;
    $maior_valor = 0;// Vai receber o maior valor do vetor
    $vetor_decrescente = reorganizar_vetor($vetor);

    // APLICANDO TODAS AS ITERAÇÕES NECESSÁRIAS PARA CHEGAR A UMA CONCLUSÃO SATISFATÓRIA
    // Verificando se há algum vértice de grau maior que o tamanho do vetor
    if (count($vetor_decrescente) > $vetor_decrescente[0]){
        mostra_vetor($vetor_decrescente);
        for ($i = 0; $i < count($vetor); $i++){
            $maior_valor = $vetor_decrescente[0];
            array_shift($vetor_decrescente); // Deleta o primeiro item do vetor
            for ($j = 0; $j < $maior_valor; $j++){
                $vetor_decrescente[$j] = $vetor_decrescente[$j] - 1; // Subtrai 1 de cada posição
            }
            mostra_vetor($vetor_decrescente);
            $vetor_decrescente = reorganizar_vetor($vetor_decrescente);
            mostra_vetor($vetor_decrescente);
            if ($vetor_decrescente[0] == 0){ // Verifica se a primeira posição é igual a "0"
                for ($k = 0; $k < count($vetor_decrescente); $k++){
                    if ($vetor_decrescente[$k] == 0){ // Verfica se todas as outras posições também são iguais a "0"
                        $contador += 1;
                        if ($contador == count($vetor_decrescente)){ // Cofere a contagem dos zeros
                            echo "É um vetor gráfico: ";
                            mostra_vetor($vetor_decrescente);
                            break;
                        }
                    }
                    if ($vetor_decrescente[$k] == -1){ // Verifica se há algum valor dentro do vetor igual a "-1"
                        echo "Não é um vetor gráfico: ";
                        mostra_vetor($vetor_decrescente);
                        break;
                    }
                }
                break;
            }
        }
    }else{
        echo "\nTipo de lista inválida\n";
    }
}

vetor_grafico(array(3,2,2,2,2)); // Lista de entrada

//valor teste = 3,2,2,2,2

//não gráfico
//[6, 5, 4, 4, 4, 4, 4, 2]
//[4, 3, 3, 3, 3, 3, 2]
//[2, 2, 2, 2, 3, 2]
//[3, 2, 2, 2, 2, 2]
//[1, 1, 1, 2, 2]
//[2, 2, 1, 1, 1]
//[1, 0, 1, 1]
//[1, 1, 1, 0]
//[0, 1, 0]
//[1, 0, 0]
//[-1, 0]
//[0, -1]

// gráfico
//[5, 4, 3, 3, 3, 3, 3, 2]
//[3, 2, 2, 2, 2, 3, 2]
//[3, 3, 2, 2, 2, 2, 2]
//[2, 1, 1, 2, 2, 2]
//[2, 2, 2, 2, 1, 1]
//[1, 1, 2, 1, 1]
//[2, 1, 1, 1, 1]
//[0, 0, 1, 1]
//[1, 1, 0, 0]
//[0, 0, 0]
//[0, 0, 0]

?>
