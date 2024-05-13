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

/**
 * @param String $s
 * @return String[]
 */
function cellsInRange($s)
{
    $arr = str_split($s);
    $range = range($arr[0], $arr[3]);
    $number = range($arr[1], $arr[4]);
    $rows = count($range);
    $columns = count($number);
    $newArr = [];

    for ($i = 0; $i < $rows; $i++) {
        for ($j = 0; $j < $columns; $j++) {
            $newArr[] = $range[$i] . $number[$j];
        }
    }

    return $newArr;
}

/**
 * @param String $s
 * @return String
 */
function finalString($s)
{
    $result = '';
    $split = str_split($s);
    foreach ($split as $sp) {
        if ($sp !== 'i') {
            $result .= $sp;
        } else {
            $result = strrev($result);
        }
    }
    return $result;
}

/**
 * @param String $s
 * @return String
 */
function toLowerCase($s)
{
    return strtolower($s);
}

/**
 * @param String $sentence
 * @return Boolean
 */
function checkIfPangram($sentence)
{
    $range = range('a', 'z');
    $arr = str_split($sentence);
    $ans = [];
    foreach ($arr as $s) {
        if (in_array($s, $range)) {
            if (!array_key_exists($s, $ans)) {
                $ans[$s] = 1;
            }
        }
    }
    return count($ans) === count($range);
}

/**
 * @param String $s
 * @return String
 */
function reverseWords($s)
{
    $arr = explode(' ', $s);
    for ($i = 0; $i < count($arr); $i++) {
        $arr[$i] =  strrev($arr[$i]);
    }

    return implode(' ', $arr);
}

/**
 * @param String $allowed
 * @param String[] $words
 * @return Integer
 */
function countConsistentStrings($allowed, $words)
{
    $result = 0;
    for ($i = 0; $i < count($words); $i++) {
        for ($j = 0; $j < strlen($words[$i]); $j++) {
            if (str_contains($allowed, $words[$i][$j])) {
                $is_allowed = true;
            } else {
                $is_allowed = false;
                break;
            }
        }

        if ($is_allowed) {
            $result++;
        }
    }

    return $result;
}

/**
 * @param String $s
 * @return String
 */
function sortSentence($s)
{
    $arr = explode(' ', $s);
    for ($i = 0; $i < count($arr); $i++) {
        $number = strlen($arr[$i]) - 1;
        $key = $arr[$i][$number];
        $result[$key] = substr($arr[$i], 0, $number);
    }
    ksort($result);
    return implode(' ', $result);
}

/**
 * @param String $s
 * @return String
 */
/*function maximumOddBinaryNumber($s)
{
    $a = intval($s);
    return $a << 2;
}*/

/**
 * @param String[] $words
 * @param String $s
 * @return Boolean
 */
function isAcronym($words, $s)
{
    $num_words = count($words);
    $num_acro = strlen($s);
    if ($num_acro != $num_words) {
        return false;
    }
    for ($i = 0; $i < $num_words; $i++) {
        if ($words[$i][0] !== $s[$i]) {
            return false;
        }
    }

    return true;
}

/**
 * @param String[] $words
 * @return Integer
 */
function uniqueMorseRepresentations($words)
{
    $morse_code = [
        'a' => ".-", 'b' => "-...", 'c' => "-.-.",
        'd' => "-..", 'e' => ".", 'f' => "..-.", 'g' => "--.",
        'h' => "....", 'i' => "..", 'j' => ".---", 'k' => "-.-",
        'l' => ".-..", 'm' => "--", 'n' => "-.", 'o' => "---",
        'p' => ".--.", 'q' => "--.-", 'r' => ".-.", 's' => "...",
        't' => "-", 'u' => "..-", 'v' => "...-", 'w' => ".--",
        'x' => "-..-", 'y' => "-.--", 'z' => "--.."
    ];
    $trans = [];
    $num_words = count($words);

    for ($i = 0; $i < $num_words; $i++) {
        $num_chars = strlen($words[$i]);
        $word = '';
        for ($j = 0; $j < $num_chars; $j++) {
            $word .= $morse_code[$words[$i][$j]];
        }
        $trans[$word] = 1;
    }

    return count($trans);
}

/**
 * @param String[] $words
 * @return Integer
 */
function bestUniqueMorseRepresentations($words)
{
    $map = array_combine(range('a', 'z'), [".-", "-...", "-.-.", "-..", ".", "..-.", "--.", "....", "..", ".---", "-.-", ".-..", "--", "-.", "---", ".--.", "--.-", ".-.", "...", "-", "..-", "...-", ".--", "-..-", "-.--", "--.."]);
    foreach ($words as &$word) {
        $chars = str_split(strtolower($word));
        $word = '';
        foreach ($chars as $char) {
            $word .= $map[$char];
        }
    }
    return count(array_unique($words));
}

/**
 * @param String $s
 * @return Integer
 */
function countAsterisks($s)
{
    $num_chars = strlen($s);
    $result = 0;
    $pairs = 0;
    for ($i = 0; $i < $num_chars; $i++) {
        if ($s[$i] === '*' && ($pairs % 2) === 0) {
            $result += 1;
        } else if ($s[$i] === '|') {
            $pairs += 1;
        }
    }
    return $result;
}
