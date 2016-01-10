<!-- Jagjot Saini Lab1 A00891437 -->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content='text/html; charset=UTF-8'>
              <title>Tic-Tac-Toe</title>
    </head>
    <body>
       <?php
        // check if the board is set
         if(isset($_GET['board'])){
                $position = $_GET['board'];
                $game = new Game($position);
                // check different states of the board
                if($game->winner('x')){
                    $won = true;
                    echo 'You win. Lucky guesses!';
                 }
                 else if($game->winner('o')){
                    $won = true;
                    echo 'I win. Muahahahaha';
                }
                else{
                    $won = false;
                    echo 'No winner yet, but you are losing.'; 
                    $game->pick_move(); // no winner so the computer is picking a move 
                }
                $game->display();
        }
            class Game{
                var $position;
                
                function __construct($squares){
                    $this->position = str_split($squares);
                    
                }
                public function winner ($token){ //check if there is a win
                    $col_check = true;
                    $diagonal_check = true;
                    //check if there is a horizontal win
                    for($row=0; $row<3; $row++){
                        if(($this->position[3*$row]==$token) && ($this->position[3*$row+1]==$token) && ($this->position[3*$row+2]==$token)){
                            return true;
                        }
                    }
                    //check if there is a vertical win
                    for($y = 0; $y < 3; $y++){
                        for($x = $y; $x < 9; $x+= 3){
                            if($this->position[$x] != $token){
                                $col_check = false;
                            }
                        }
                        if($col_check){
                            return true;
                        }
                    }
                    //check for diagonal wins 
                    for($z = 0; $z < 9; $z+=4){
                         if($this->position[$z] != $token){
                             $diagonal_check = false;
                         }   
                    }
                    if($diagonal_check){
                        return true;
                    }
                    $diagonal_check = true;
                    for($z = 2; $z < 7; $z+=2){
                        if($this->position[$z] != $token){
                            $diagonal_check = false;
                        }
                    }
                    if($diagonal_check){
                        return true;
                    }
                    return false;
                }
                function display() {
                    echo "<table cols='3' style='fontsize:
                    large; fontweight:
                    bold'>";
                    echo '<tr>'; // open the first row
                    for($pos=0; $pos<9; $pos++){
                        echo $this->show_cell($pos);
                        if ($pos %3 == 2){
                            echo '</tr><tr>'; // start a new row for the next square   
                        }
                    }
                    echo '</tr>'; // close the last row
                    echo '</table>';
                }
                function show_cell($which) {
                    $token = $this->position[$which];// deal with the easy case
                    if($token<>'-'){
                        return '<td>'.$token.'</td>';
                    } // now the hard case
                    $this->newposition = $this->position; // copy the original
                    $this->newposition[$which] = 'o'; // this would be their move
                    $move = implode($this->newposition); // make a string from the board array
                    $link = '/?board='.$move; // this is what we want the link to be
                    // so return a cell containing an anchor and showing a hyphen
                    return '<td><a href="'.$link.'">-<a></td>';
                }
                // pick a move if there is no winner yet 
                function pick_move(){
                    for($pos=0; $pos< 9; $pos++){
                        if($this->position[$pos] == '-'){
                            $this->position[$pos] = 'o';
                            break;
                        }
                    }
                }
            }
        ?>   
    </body>
</html>
