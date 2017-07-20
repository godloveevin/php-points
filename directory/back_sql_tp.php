    /**
     * 导出数据库备份
     * @author godloveevin@yeah.net
     * @d/t     2017-07-18
     */
    public function exportDatabase(){
        header("Content-type:text/html;charset=utf-8");
        $path = C('ROOT_MYSQL_PATH');
        $model = M();
        //查询所有表
        $sql = "show tables";
        $result = $model->query($sql);
        // print_r($result);exit;
        // echo "运行中，请耐心等待...<br/>";
        $info = "-- ----------------------------\r\n";
        $info .= "-- 日期：".date("Y-m-d H:i:s",time())."\r\n";
        $info .= "-- MySQL - 5.1.73 : Database - ".C('DB_NAME')."\r\n";
        $info .= "-- ----------------------------\r\n\r\n";
        $info .= "CREATE DATAbase IF NOT EXISTS `".C('DB_NAME')."` DEFAULT CHARACTER SET utf8 ;\r\n\r\n";
        $info .= "USE `".C('DB_NAME')."`;\r\n\r\n";
        // 检查目录是否存在
        if(is_dir($path)){
            //echo '目录存在';
            // 检查目录是否可写
            if(is_writable($path)){
                //echo '目录可写';exit;
            }else{
                echo '目录不可写';exit;
                //chmod($path,0777);
            }
        }else{
            //echo '目录不存在';exit;
            // 新建目录
            mkdir($path, 0777, true);
            //chmod($path,0777);
        }
        // 检查文件是否存在
        $file_name = $path.C('DB_NAME').'-'.date("Y-m-d",time()).'.sql';
        if(file_exists($file_name)){
            echo "数据备份文件已存在！";
            exit;
        }
        file_put_contents($file_name,$info,FILE_APPEND);
        foreach ($result as $k=>$v) {
            //查询表结构
            $val = $v['Tables_in_'.C('DB_NAME')];
            $sql_table = "show create table ".$val;
            $res = $model->query($sql_table);
            // print_r($res);exit;
            $info_table = "-- ----------------------------\r\n";
            $info_table .= "-- Table structure for `".$val."`\r\n";
            $info_table .= "-- ----------------------------\r\n\r\n";
            $info_table .= "DROP TABLE IF EXISTS `".$val."`;\r\n\r\n";
            $info_table .= $res[0]['Create Table'].";\r\n\r\n";
            //查询表数据
            $info_table .= "-- ----------------------------\r\n";
            $info_table .= "-- Data for the table `".$val."`\r\n";
            $info_table .= "-- ----------------------------\r\n\r\n";
            file_put_contents($file_name,$info_table,FILE_APPEND);
            $sql_data = "select * from ".$val;
            $data = $model->query($sql_data);
            // var_dump($data);exit;
            $count= count($data);
            //print_r($count);exit;
            if($count<1) continue;
            foreach ($data as $key => $value){
                $sqlStr = "INSERT INTO `".$val."` VALUES (";
                foreach($value as $v_d){
                    if(is_array($v_d))
                        $v_d = '';
                    $v_d = str_replace("'","\'",$v_d);
                    $sqlStr .= "'".$v_d."', ";
                }
                //需要特别注意对数据的单引号进行转义处理
                //去掉最后一个逗号和空格
                $sqlStr = substr($sqlStr,0,strlen($sqlStr)-2);
                $sqlStr .= ");\r\n";
                // echo $sqlStr;exit;
                file_put_contents($file_name,$sqlStr,FILE_APPEND);
            }
            $info = "\r\n";
            file_put_contents($file_name,$info,FILE_APPEND);
        }
        echo "OK!";
    }
