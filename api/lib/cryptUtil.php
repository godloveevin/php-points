<?php
namespace lib;

class cryptUtil {
    private $puk;
    private $prk;

    function __construct($puk, $prk) {
        $this->puk = $puk;
        $this->prk = $prk;
    }

    /**
     * 私钥签名
     * @param $plainText
     * @return string
     * @throws \Exception
     */
    public function sign($plainText) {
        try {
            $resource = openssl_pkey_get_private($this->prk);
            $result = openssl_sign($plainText, $sign, $resource);
            openssl_free_key($resource);

            if (!$result) {
                throw new \Exception('签名出错' . $plainText);
            }

            return base64_encode($sign);
        } catch (\Exception $e) {
            errorHandle::log($e);
            throw $e;
        }
    }

    /**
     * 公钥验签
     * @param $plainText
     * @param $sign
     * @return int
     * @throws \Exception
     */
    public function verify($plainText, $sign) {
        
        $resource = openssl_pkey_get_public($this->puk);
        $result = openssl_verify($plainText, base64_decode($sign), $resource);
        openssl_free_key($resource);
        
        if (!$result) {//todo cancel annotation
            errorHandle::throwException(new \Exception('签名验证未通过,plainText:' . $plainText . '。sign:' . $sign, '020002'));
        }

        return $result;
    }
}