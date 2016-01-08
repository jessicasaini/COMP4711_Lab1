<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content='text/html; charset=UTF-8'>
              <title>Tic-Tac-Toe</title>
    </head>
    <body>
       <?php
       
       
            class Game{
                var $position;
                
                function __construct($squares){
                    $this->position = str_split($squares);
                    
                }
                
                function winner($token){ 
                    for($row=0; $row<3; $row++){
                        if(($this->position[3*$row] == $token) && ($this->position[3*$row+1]== $token) && ($this->position[3*$row+2] == $token)){
                                $won = true;
                                $break;
                        }
                    }   
                }
            }
            
            
            if(isset($_GET['board'])){
                $position = $_GET['board'];
                echo $position;
                $squares = str_split($position);
            
                $game = new Game($squares);
                 if($game­>winner('x')){
                     echo 'You win. Lucky guesses!';
                 }
                 else if ($game­>winner('o')){
                     echo 'I win. Muahahahaha';
                 }
                 else{
                     echo 'No winner yet, but you are losing.';
                 }
            }

/*
            if(isset($_GET['board'])){
                $position = $_GET['board'];
                echo $position;
                $squares = str_split($position);
                print_r($squares);
                if(winner('x', $squares)){
                        echo 'You win.';
                }
                else if (winner('o',$squares)){
                     echo 'I win.';
                }
                else{
                    echo 'No winner yet.';
                }
            }                                                                                                                                                                                                                          
            function winner($token,$p){
                for($row=0; $row<3; $row++)
                    if(($p[3*$row] == $token) && ($p[3*$row+1]== $token) && ($p[3*$row+2] == $token)) $won = true;
            }
            
            
            /*
             for($row=0; $row<3; $row++) {
                    echo "first loop";
                    $result = false;
                    for($col=0; $col<3; $col++){
                        echo "second loop";
                        if ($position[3*$row+$col] == $token){
                            $result = true;
                        }//note the negative test
                    }
                    if($result == true){
                        break;
                    }
                } 
             */
        ?>   
    </body>
</html>
