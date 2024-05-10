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

/**
 * @param String $command
 * @return String
 */
function interpret($command)
{
    $replacedCommand = str_replace('(al)', 'al', $command);
    $result = str_replace('()', 'o', $replacedCommand);
    return $result;
}

/**
 * @param String[] $sentences
 * @return Integer
 */
function mostWordsFound($sentences)
{
    $max_number_words = 0;
    foreach ($sentences as $sentence) {
        $arraySentence = explode(' ', $sentence);
        $numberOfWords = count($arraySentence);
        if ($max_number_words < $numberOfWords) {
            $max_number_words = $numberOfWords;
        }
    }

    return $max_number_words;
}

/**
 * @param String $word
 * @param String $ch
 * @return String
 */
function reversePrefix($word, $ch)
{
    $arrayCh = str_split($word);
    $firstKey = -1;
    foreach ($arrayCh as $key => $value) {
        if ($value === $ch) {
            $firstKey = $key;
            break;
        }
    }
    if ($firstKey === -1) {
        return $word;
    }

    $a = substr($word, 0, $firstKey + 1);
    $b = substr($word, $firstKey + 1);
    $aReversed = array_reverse(str_split($a));
    return implode($aReversed) . $b;
}


/**
 * @param String $s
 * @return Integer
 */
function balancedStringSplit($s)
{
    //same number of L and R in same substring
    $numsOfL = 0;
    $numsOfR = 0;
    $numsOfAns = 0;

    $split = str_split($s);

    foreach ($split as $key => $val) {
        if ($val === 'R') {
            $numsOfR++;
        }
        if ($val === 'L') {
            $numsOfL++;
        }
        if ($numsOfL === $numsOfR) {
            $numsOfAns++;
        }
    }
    return $numsOfAns;
}

/**
 * @param String[] $word1
 * @param String[] $word2
 * @return Boolean
 */
function arrayStringsAreEqual($word1, $word2)
{
    $firstWord = implode($word1);
    $secondWord = implode($word2);

    return $firstWord === $secondWord;
}

/**
 * @param String $s
 * @param Integer $k
 * @return String
 */
function truncateSentence($s, $k)
{
    $arr = explode(' ', $s);
    $result = '';
    foreach ($arr as $key => $val) {
        if ($key === $k) {
            break;
        }

        $result .= $val;
        if ($key !== $k - 1) {
            $result .= ' ';
        }
    }

    return $result;
}

/**
 * @param String[][] $items
 * @param String $ruleKey
 * @param String $ruleValue
 * @return Integer
 */
function countMatches($items, $ruleKey, $ruleValue)
{
    $keys = ['type' => 0, 'color' => 1, 'name' => 2];
    $ans = 0;
    $keyType = $keys[$ruleKey];

    foreach ($items as $key => $item) {
        if ($item[$keyType] === $ruleValue) {
            $ans++;
        }
    }
    return $ans;
}

/**
 * @param String $s
 * @param Integer[] $indices
 * @return String
 */
function restoreString($s, $indices)
{
    $newArray = [];
    $arrayStr = str_split($s);
    for ($i = 0; $i < count($arrayStr); $i++) {
        $newArray[$indices[$i]] = $arrayStr[$i];
    }
    ksort($newArray);
    return implode($newArray);
}

/**
 * @param String[] $words
 * @return String
 */
function firstPalindrome($words)
{
    $numberOfWords = count($words);
    $palin = false;
    for ($i = 0; $i < $numberOfWords; $i++) {
        $numberOfChars = strlen($words[$i]);
        if ($numberOfChars === 1) {
            return $words[$i];
        }
        for ($j = 0; $j < $numberOfChars; $j++) {
            $last = $numberOfChars - 1 - $j;
            if ($j === $last) {
                break;
            }
            if ($words[$i][$j] == $words[$i][$last]) {
                $palin = true;
            } else {
                $palin = false;
                break;
            }
        }
        if ($palin) {
            return $words[$i];
        }
    }
    return '';
}

function bestFirstPalindrome($words)
{
    foreach ($words as $word) {
        if ($word == strrev($word)) {
            return $word;
        }
    }
    return '';
}
