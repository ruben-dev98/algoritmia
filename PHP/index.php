<?php

/**
 * @param String $s
 * @return Integer
 */
function romanToInt($s)
{
    $romanArray = [
        'I' => 1,
        'V' => 5,
        'X' => 10,
        'L' => 50,
        'C' => 100,
        'D' => 500,
        'M' => 1000
    ];
    $result = 0;

    for ($i = 0; $i < strlen($s); $i++) {
        $currentValue = $s[$i];
        $nextValue = $s[$i + 1];
        $concatValue = $currentValue . $nextValue;
        switch ($concatValue) {
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

function scoreOfString($s)
{
    $result = 0;
    $len_string = strlen($s);
    for ($i = 0; $i < $len_string; $i++) {
        if ($i + 1 === $len_string) {
            break;
        }
        $result += abs(ord($s[$i]) - ord($s[$i + 1]));
    }

    return $result;
}

/**
 * @param String $address
 * @return String
 */
function defangIPaddr($address)
{
    return str_replace('.', '[.]', $address);
}

/**
 * @param String[] $operations
 * @return Integer
 */
function finalValueAfterOperations($operations)
{
    $array = ['X++' => +1, '++X' => +1, 'X--' => -1, '--X' => -1];
    $result = 0;
    foreach ($operations as $key => $op) {
        $result += $array[$op];
    }
    return $result;
}

/**
 * @param String $jewels
 * @param String $stones
 * @return Integer
 */
function numJewelsInStones($jewels, $stones)
{
    $max_len_stones = strlen($stones);
    $max_len_jewels = strlen($jewels);
    $result = 0;

    for ($i = 0; $i < $max_len_jewels; $i++) {
        for ($j = 0; $j < $max_len_stones; $j++) {
            if ($jewels[$i] === $stones[$j]) {
                $result += 1;
            }
        }
    }
    return $result;
}

/**
 * @param String[] $words
 * @param String $x
 * @return Integer[]
 */
function findWordsContaining($words, $x)
{
    $result = [];
    foreach ($words as $key => $value) {
        if (str_contains($value, $x)) {
            $result[] = $key;
        }
    }
    return $result;
}
