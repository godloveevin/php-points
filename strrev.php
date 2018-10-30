<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/25
 * Time: 18:38
 */
/**
 *  功能，实现字符串反转
 *  例如：$str = 'abc';
 *       输出：cba;
 */

/* 第一种方案：直接用strrev字符串函数实现 */
$str = 'abc';
// echo strrev($str);

/* 第二种方案：利用递归调用，效率很低 */
$str = 'abc';
function reverse_r($str) {
    if(strlen($str) > 0){
        reverse_r(substr($str,1));
    }
    echo substr($str,0,1);
    return;
}
// echo reverse_r($str);

/* 第三种方案：利用循环，效率比递归要高 */
$str = 'abc';
function reverse_i($str) {
    for($i=1; $i <= strlen($str); $i++) {
        echo substr($str, -$i, 1);
    }
    return;
}
// echo reverse_i($str);

/** 第四种方案：
 * 使用二分法实现，效率更大的提高
 * 注：其实按照二分法来实现，理论上效率会提升一半，但是这个涉及
 * 到数组的指针操作，实际效率会怎样？难说。
 * 1. ceil()函数：进一法取整。如:5/4=1.25，ceil(5/4)=2，不管小数位是否大于0.5，均进一取整。
 * 2. 字符串当成数组访问，如$str[0],$str[1]...可以访问字符串$str的第一个字符、第二个字符...
 * 3. 二分法。方法3需要循环的次数是字符串的长度，而方法4则是字符串长度的一半，所以效率会提高一倍(理论上)。
 */
$str = 'abc';
function reverse_a($str) {
    $forNum = ceil(strlen($str)/2);
    $strlen = strlen($str);
    for($i=1; $i<= $forNum; $i++){
        if($i <= $strlen-$i) {
            $tmp = $str[$i - 1];
            $str[$i - 1] = $str[$strlen - $i];
            $str[$strlen - $i] = $tmp;
        }
    }
    return $str;
}
echo reverse_a($str);
