<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/24
 * Time: 16:38
 */
header("Content-Type: text/html;charset=utf-8");

$imput = [
    ['value_id' => 1, 'value_name' => '红色','prop'=>['prop_id'=>1,'prop_name'=>'颜色']],
    ['value_id' => 2, 'value_name' => '超大','prop'=>['prop_id'=>2,'prop_name'=>'尺寸']],
    ['value_id' => 3, 'value_name' => '黄色','prop'=>['prop_id'=>1,'prop_name'=>'颜色']],
    ['value_id' => 4, 'value_name' => '中等','prop'=>['prop_id'=>2,'prop_name'=>'尺寸']],
    ['value_id' => 5, 'value_name' => '银色','prop'=>['prop_id'=>1,'prop_name'=>'颜色']],
    ['value_id' => 6, 'value_name' => '大'  ,'prop'=>['prop_id'=>2,'prop_name'=>'尺寸']],
    ['value_id' => 7, 'value_name' => '白色','prop'=>['prop_id'=>1,'prop_name'=>'颜色']],
    ['value_id' => 8, 'value_name' => '很小','prop'=>['prop_id'=>2,'prop_name'=>'尺寸']],
];

$output = [
    ['prop_id'=>1, 'prop_name'=>'颜色',
        'prop_value_list'=>[
         ['value_id'=>1,'value_name'=>'红色'],
         ['value_id'=>3,'value_name'=>'黄色'],
         ['value_id'=>5,'value_name'=>'银色'],
         ['value_id'=>7,'value_name'=>'白色'],
     ]
    ],
    ['prop_id'=>2, 'prop_name'=>'尺寸',
        'prop_value_list'=>[
            ['value_id'=>2,'value_name'=>'超大'],
            ['value_id'=>4,'value_name'=>'中等'],
            ['value_id'=>6,'value_name'=>'大'],
            ['value_id'=>8,'value_name'=>'很小'],
        ]
    ],
];

// var_dump($imput);
// var_dump($output);exit;

/*
 * 思路：
 * 1：先确定结果集有几个元素
 * 2：
 * */

function Z(array $arr) {
    $return = [];
    foreach ($arr as $k => $v) {
        foreach ($arr as $k1 => $v1) {
            $return[$k]['prop_id'] = $v['prop']['prop_id'];
            $return[$k]['prop_name'] = $v['prop']['prop_name'];
        }
    }
    return $return;
}
$a = Z($imput);
var_dump($a);


