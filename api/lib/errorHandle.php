<?php
namespace lib;

class errorHandle {
    public static function log($msg) {
        error_log(date("[Y-m-d H:i:s]") . " -[ error : " . $msg . " \n", 3, "../temp/sd_plug_err.log");
    }

    public static function throwException(\Exception $e) {
        echo json_encode(
            array(
                'respCode' => $e->getCode(),
                'respDesc' => $e->getMessage()
            )
        );
        exit;
    }
}