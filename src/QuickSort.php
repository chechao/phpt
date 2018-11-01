<?php

namespace Phpt;

function sawp(&$arr, $i, $j)
{
    $temp = $arr[$j];
    $arr[$j] = $arr[$i];
    $arr[$i] = $temp;
    unset($temp);

    var_export(implode(',', $arr));
    echo PHP_EOL;
}

function partition(&$arr, $left, $right)
{
    $povit = $left;
    $index = $povit + 1;
    for ($i = $povit + 1; $i < $right; $i++) {
        if ($arr[$i] < $arr[$povit]) {
            sawp($arr, $i, $index);
            $index++;
        }
    }
    sawp($arr, $index - 1, $povit);
    return $index;
}

function quickSort(&$arr, $left = 0, $right = 0)
{
    $right = $right ?: count($arr);
    $povit = partition($arr, $left, $right);
    if (($left + 1) < $povit) {
        quickSort($arr, $left, $povit);
    }

    if (($povit + 1) < $right) {
        quickSort($arr, $povit, $right);
    }
    return $arr;
}
