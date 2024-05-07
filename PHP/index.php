<?php
/**
 * @param String $s
 * @return Integer
 */
function romanToInt($s) {
    $romanArray = [
        'I' => 1,
        'V' => 5,
        'X' => 10,
        'L' => 50,
        'C' => 100,
        'D'=> 500,
        'M' => 1000
    ];
    $result = 0;
    
    for($i = 0; $i < strlen($s); $i++ ) {
        $currentValue = $s[$i];
        $nextValue = $s[$i+1];
        $concatValue = $currentValue.$nextValue;
        switch($concatValue) {
            case 'IV':
                $result += 4;
                $i++;
            break;
            case 'IX':
                $result += 9;
                $i++;
            break;
            case 'XL':
                $result += 40;
                $i++;
            break;
            case 'XC':
                $result += 90;
                $i++;
            break;
            case 'CD':
                $result += 400;
                $i++;
            break;
            case 'CM':
                $result += 900;
                $i++;
            break;
            default:
                $result += $romanArray[$currentValue];
            break;
        }
    }
    return $result;
}