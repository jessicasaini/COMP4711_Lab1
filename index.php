<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content='text/html; charset=UTF-8'>
              <title>Tic-Tac-Toe</title>
    </head>
    <body>
       <?php
         if(isset($_GET['board'])){
                $position = $_GET['board'];
                echo $position;
               //$squares = str_split($position);
               // print_r($squares);
            
                $game = new Game($position);
                if($game->winner('x')){
                     echo 'You win. Lucky guesses!';
                 }
                 else if($game->winner('o')){
                     echo 'I win. Muahahahaha';
                 }
                 else{
                     echo 'No winner yet, but you are losing.';
                 }
        }
            class Game{
                var $position;
                
                function __construct($squares){
                    print_r($squares);
                    $this->position = str_split($squares);
                    
                }
                public function winner ($token){ 
                    $colcheck = true;
                    for($row=0; $row<3; $row++){
                        if(($this->position[3*$row]==$token) && ($this->position[3*$row+1]==$token) && ($this->position[3*$row+2]==$token)){
                            return true;
                        }
                    }
                    for($y = 0; $y < 3; $y++){
                        for($x = $y; $x < 9; $x+= 3){
                            if($this->position[$x] != $token){
                                $colcheck = false;
                            }
                        }
                        if($colcheck){
                            return true;
                        }
                    }
                    return false;
                }

            }     
        ?>   
    </body>
</html>
