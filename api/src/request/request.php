<?php
namespace src\request;

class request {
    public $head;
    public $body;

    public function __construct() {
        $this->head = new head();
    }

    public function setDefaultHead($method, $productId, $mid) {
        $head = &$this->head;

        $head->version = '1.0';
        $head->method = $method;
        $head->productId = $productId;
        $head->accessType = '1';
        $head->mid =$mid;

        $head->channelType = '07';
        $head->reqTime = date('YmdHis', time());
    }
}