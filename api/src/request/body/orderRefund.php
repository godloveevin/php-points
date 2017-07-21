<?php
namespace src\request\body;

class orderRefund {
    public $orderCode;//商户订单号
    public $oriOrderCode;//原商户订单号
    public $refundAmount;//退货金额
    public $refundReason;//退货原因
    public $extend;//扩展域
}