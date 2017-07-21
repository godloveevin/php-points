<?php
namespace src\request\body;

class orderPay {
    public $orderCode;//商户订单号
    public $totalAmount;//订单金额
    public $subject;//订单标题
    public $body;//订单描述
    public $txnTimeOut;//订单超时时间
    public $payMode;//支付模式
    public $payExtra;//支付扩展域
    public $clientIp;//客户端IP
    public $notifyUrl;//异步通知地址
    public $frontUrl;//前台通知地址
    public $storeId;//商户门店编号
    public $terminalId;//商户终端编号
    public $operatorId;//操作员编号
    public $bizExtendParams;//业务扩展参数
    public $merchExtendParams;//商户扩展参数
    public $extend;//扩展域
}