
<?php

//Hakime Havel

class HakimeHavel{

    public function __construct(){
        $this->counter = 0; # Counter to help
        $this->highestValue = 0;// Get the highest value of vector
    }

    public function rearrangeVector($vector){ // Rearrange list in decrescente order
        rsort($vector);
        return $vector;
    }

    public function showVector($vector){ // Print in the terminal
        echo "[" . implode(", ", $vector) . "]\n";
    }

    public function subtractPositions($vector){
        for ($j = 0; $j < $this->highestValue; $j++){
            $vector[$j] = $vector[$j] - 1; // Will subtract 1 from each position
        }
        return $vector;
    }

    public function checksPostion($vector){ // Checks whether it is a vector graphic or not
        for ($k = 0; $k < count($vector); $k++){
            if ($vector[$k] == 0){ // # Checks if all the other positions are equal to the zero as well
                $this->counter += 1;
                if ($this->counter == count($vector)){ // Checks the counting of zeros
                    echo "É um vetor gráfico: ";
                    $this->showVector($vector);
                    break;
                }
            }
            if ($vector[$k] == -1){ // # Checks if there is any value in the from vector that is equal to "-1"
                echo "Não é um vetor gráfico: ";
                $this->showVector($vector);
                break;
            }
        }
    }

    // The function that checks if is a graphic vector using Hakime Havel's principles
    public function graphicVector($vector){
        $decrescenteVector = $this->rearrangeVector($vector);
        // Applying all necessary iterations to reach a satisfactory conclusion
        // Checks if there is any vertices with a degree greater than the size of the vector
        if (count($decrescenteVector) > $decrescenteVector[0]){
            $this->showVector($decrescenteVector);
            for ($i = 0; $i < count($vector); $i++){
                $this->highestValue = $decrescenteVector[0];
                array_shift($decrescenteVector); // Deletes the first item from the vector
                $vectorSubtract = $this->subtractPositions($decrescenteVector);
                $this->showVector($vectorSubtract);
                $decrescenteVector = $this->rearrangeVector($vectorSubtract);
                $this->showVector($decrescenteVector);
                if ($decrescenteVector[0] == 0){ // Checks if the first position is "0"
                    $this-> checksPostion($decrescenteVector);
                    break;
                }
            }
        }else{
            echo "\nTipo de lista inválida\n";
        }
    }
}

$hakime = new HakimeHavel();
$hakime->graphicVector(array(3,2,2,2,2)); // # input list

//test value = 3,2,2,2,2

//not graphic
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

// it's graphic
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
