<?php

class SpeSkillTest
{
    public $number, $string = null;
    public $array = array();
    private static function countNum($number)
    {
        return strlen($number);
    }

    private static function setArray($number)
    {
        return array_map('intval', str_split($number));
    }

    public function narcissistic($number)
    {
        $obj = new SpeSkillTest();
        $res = 0;
        $count = $obj->countNum($number);
        if ($number) {
            $array = $obj->setArray($number);
            for ($a = 0; $a < $count; $a++) {
                $res += pow($array[$a], $count);
            }
            return ($number == $res) ? 'true' : 'false';
        }
        return 'false';
    }

    private static function isOdd($number)
    {
        return ($number % 2) ? false : true;
    }

    public function parityOutlier($array)
    {
        $arrayOdd = array();
        $arrayEven = array();
        $idxEven = 0;
        $idxOdd = 0;
        $res = null;
        foreach ($array as $key => $value) {
            if (($value % 2) != 0) {
                array_push($arrayOdd, $value);
                $idxOdd = $key;
            } else if (($value % 2) == 0) {
                array_push($arrayEven, $value);
                $idxEven = $key;
            }
        }

        if (sizeof($arrayOdd) == 1) {
            $res = $array[$idxOdd] . " (the only odd number) ";
        } else if (sizeof($arrayEven) == 1) {
            $res = $array[$idxEven] . " (the only even number)";
        } else if (sizeof($arrayEven) == sizeof($array)) {
            $res = "false (all even integer, no outlier)";
        } else if (sizeof($arrayOdd) == sizeof($array)) {
            $res = "false (all odd integer, no outlier)";
        } else {
            $res = "false";
        }

        return $res;
    }

    public function findNeedle($array, $string)
    {
        $res = array_search($string, $array);

        return $res;
    }

    public function blueOcean($array, $number)
    {
        foreach ($array as $key => $value) {
            echo $number[0];
            if ($value == $number[0]) {
                unset($array[$key]);
            }
            return $array;
        }
    }
}
$obj = new SpeSkillTest();
echo 'ini run narcisstic number : ';
echo '<br/>';
echo $obj->narcissistic(153);
echo '<br/>';
echo $obj->narcissistic(111);
echo '<br/>';
echo 'ini run parityOutlier : ';
echo "<br/>";
print_r($obj->parityOutlier([2, 4, 0, 100, 4, 11, 2602, 36]));
echo "<br/>";
print_r($obj->parityOutlier([160, 3, 1719, 19, 11, 13, -21]));
echo "<br/>";
print_r($obj->parityOutlier([11, 13, 15, 19, 9, 13, -21]));
echo "<br/>";
echo 'ini run findNeedle : ';
echo "<br/>";
print_r($obj->findNeedle(["red", "blue", "yellow", "black", "grey"], "blue"));
echo 'ini run blueOcean : ';
echo "<br/>";
print_r($obj->blueOcean([1, 2, 3, 4, 6, 10], [1]));
echo "<br/>";
print_r($obj->blueOcean([1, 5, 5, 5, 5, 3], [5]));
