<?php
namespace src\request\body;

class orderCancel {
    public $orderCode;//商户订单号
    public $oriOrderCode;//原商户订单号
    public $oriTotalAmount;//原订单金额
    public $extend;//扩展域
}