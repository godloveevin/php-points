使用redis数据库处理用户是session数据
修改php-fpm的配置文件
字段：session.save_handler session.save_path
/etc/php-fpm.d/www.conf的文件末尾行
   php_value[session.save_handler] = redis
   php_value[session.save_path]    = "tcp://127.0.0.1:6379"
