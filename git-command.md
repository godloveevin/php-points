git常用基本命令总结：
1：ssh的配置
// ssh-keygen -t rsa -C "your https://github.com's emial"
公钥文件默认保存的路径：c:\User\Administrator\.ssh，打开id_rsa.pub文件，拷贝到github的ssh配置中，github上title任意取值，比如，wenhuayi；
2：配置提交者的账号和名称
打开本机git客户端
// git config --global user.email "github的邮箱"
// git config --global user.name "github的名字"
3：建立工作目录
// mkdir ~dev; 
// cd dev; 
// git clone 你自己的github项目git地址；
// git clone https://github.com/godloveevin/php-points.git（克隆）
4：连接远程git地址 git remote add origin https://github.com/godloveevin/php-points.git
5：添加文件	   git add 文件名
6：提交		   git commit -m "提交注释"
7：提交到远程	   git push -u origin master  账号/密码


解决向github提交代码不用总是输入账号密码
1:修改git配置
// git config --global credential.helper store
这一步，会在用户目录下的.gitconfig文件最后加上
[credential]
	helper = store
当配好之后的首次push代码时，需要输入账号密码，之后push就不用输入账号密码了

解决提交文件夹以及子文件夹
// git add *
// git commit -m "提交文件夹"
// git push origin master


分支相关命令
分支创建 // git checkout -b branch_name eg:git checkout -b branch001
删除分支 //git branch -d branch_name   eg:git branch -d branch001
git branch                        /*查看本地分支*/
git checkout -b daily/1.0.0   /*签出新分支*/
git checkout daily/1.0.1      /*切换到其他分支*/
git push origin daily/1.0.0   /*push到远程分支*/
git branch -d daily/1.0.0   /*删除本地分支*/
git push origin --delete daily/1.0.0 /*删除远程分支*/

查看历史提交记录 // git log --graph
查看分支的commit记录//git show-branch

