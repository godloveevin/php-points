<?php

const API_HOST = 'http://61.129.71.103:8003/gateway/api';
const PUB_KEY_PATH = __DIR__.'../../api/cert/sand-test.cer';//公钥.cer结尾
const PRI_KEY_PATH = __DIR__.'../../api/cert/mid-test.pfx';//私钥.pfx结尾
const CERT_PWD = '123456';//私钥密码

const SUCCESS_RESP_CODE = "000000";
const DEFAULT_VERSION = "1.0";

const GATEWAY_ORDERPAY = "sandpay.trade.pay"; //	统一下单
const GATEWAY_ORDERQUERY = "sandpay.trade.query"; //	订单查询
const GATEWAY_ORDERCANCEL = "sandpay.trade.cancel";//	订单撤销
const GATEWAY_ORDERREFUND = "sandpay.trade.refund"; //	退货
const GATEWAY_ORDERDOWNLOAD = "sandpay.trade.download"; //	对账单下载

const GATEWAYPAY_PRODUCTID = "00000007";  // 网关支付
const H5BANKCARD_PRODUCTID = "00000008";  // H5银行卡支付
const QUICKPAY_PRODUCTID = "00000009";  // 快捷支付

