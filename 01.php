<?php
$possibleAmounts = [0.10, 0.20, 0.30];
$field = [
    [''],[''],[''],[''],[''],
    [''],[''],[''],[''],[''],
    [''],[''],[''],[''],[''],
];
$wallet = 10;
$symbols = [
  "A","B","C","D","E"// It is almost impossible to win with this amount of symbols and only 5 paylines
];// first element of array is the most expensive one
function randomSymbol(array $field, array $symbols) : array{
    for($i = 0 ; $i<=14;$i++){
        $field[$i] = $symbols[array_rand($symbols,1)];
    }
    return $field;
}
function display_board(array $field):void
{
    echo " $field[0] | $field[1] | $field[2] | $field[3] | $field[4] |\n";
    echo "---+---+---+---+---|\n";
    echo " $field[5] | $field[6] | $field[7] | $field[8] | $field[9] |\n";
    echo "---+---+---+---+---|\n";
    echo " $field[10] | $field[11] | $field[12] | $field[13] | $field[14] |\n";
}
function winnerCheck(array $field,array $symbols):float{
    $winingTimes = 0;
    if($field[0]==$field[1] && $field[0]==$field[2] && $field[0]==$field[3] && $field[0]==$field[4]){
        $winingTimes += 1;
        for($i = 0; $i<count($symbols);$i++){
        if($field[0]==$symbols[$i]){
            $winingTimes *=10/($i+1);
    }}}
    if($field[5]==$field[6] && $field[5]==$field[7] && $field[5]==$field[8] && $field[5]==$field[9]){
    $winingTimes += 1;
        for($i = 0; $i<count($symbols);$i++){
            if($field[5]==$symbols[$i]){
                $winingTimes *=10/($i+1);
}}}
    if($field[10]==$field[11] && $field[10]==$field[12] && $field[10]==$field[13] && $field[10]==$field[14]){
        $winingTimes += 1;
        for($i = 0; $i<count($symbols);$i++){
            if($field[10]==$symbols[$i]){
                $winingTimes *=10/($i+1);
    }}}
    if($field[0]==$field[6] && $field[0]==$field[12] && $field[0]==$field[8] && $field[0]==$field[4]){
        $winingTimes += 1;
        for($i = 0; $i<count($symbols);$i++){
            if($field[0]==$symbols[$i]){
                $winingTimes *=10/($i+1);
    }}}
    if($field[10]==$field[6] && $field[10]==$field[2] && $field[10]==$field[8] && $field[10]==$field[14]) {
        $winingTimes += 1;
        for ($i = 0; $i < count($symbols); $i++) {
            if ($field[10] == $symbols[$i]) {
                $winingTimes *= 10 / ($i+1);
            }
        }
    }
    return $winingTimes;
}
$welcome = readline("Hello! This is scam machine. Do you want to be scammed? yes or no? ");
while($welcome == "yes") {
    foreach ($possibleAmounts as $price){
        echo "$price$ | ";
    }
    $insertedAmount = (float)readline("Enter betting price: ");
    $field1 = randomSymbol($field, $symbols);
    if ($insertedAmount == $possibleAmounts[0]) {
        $wallet -= $insertedAmount;
        display_board($field1);
        $result = winnerCheck($field1,$symbols)*$insertedAmount;
       if(winnerCheck($field1,$symbols)){
           echo "Congratulations you won : $result$" . PHP_EOL . "Your bet was $insertedAmount$  | ";
           $wallet += $result;
       }
       echo "$wallet$ is left in your wallet |";
    } elseif ($insertedAmount == $possibleAmounts[1]) {
        $wallet -= $insertedAmount;
        display_board($field1);
        $result = winnerCheck($field1,$symbols)*$insertedAmount;
        if(winnerCheck($field1,$symbols)){
            echo "Congratulations you won : $result$" . PHP_EOL . "Your bet was $insertedAmount$  | ";
            $wallet += $result;
        }
        echo "$wallet$ is left in your wallet |";
    } elseif ($insertedAmount == $possibleAmounts[2]) {
        display_board($field1);
        $wallet -= $insertedAmount;
        $result = winnerCheck($field1,$symbols)*$insertedAmount;
        if(winnerCheck($field1,$symbols)){
            echo "Congratulations you won : $result$" . PHP_EOL . "Your bet was $insertedAmount$  | ";
            $wallet += $result;
        }
        echo "$wallet$ is left in your wallet | ";
    } else {
        echo "Invalid inserted amount, try again |";
    }
    $welcome = readline( "Are you scammed enough? Continue? yes or no? ");
}
echo "Thanks for playing! Goodbye :)";
