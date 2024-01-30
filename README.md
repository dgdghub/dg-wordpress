# Dghub-wordpress

## 目标
该项目可实现一键部署nginx, wordpress, mysql, phpadmin
## 部署

```
1. git clone https://github.com/dgdghub/dghub-wordpress.git
2. cd dghub-wordpress
3. docker-compose up -d
```
## 前置条件
1. 配置域名解析
2. 申请ssl证书
3. 修改根目录.env配置
4. 注意，nginx，wordpress，mysql之间是docker网络，通过容器名互联


## 如果出现database connection问题，请按以下步骤解决
```
1. 进入容器
docker exec -it dghub-mysql bash

2. 进入mysql数据库--password
mysql -u root -p

3. 设置mysql允许远程访问
GRANT ALL PRIVILEGES ON *.* TO 'root'@'%' WITH GRANT OPTION;
FLUSH PRIVILEGES;

4. 创建数据库
create database wordpress;
5.查看mysql 容器地址（如果wordpress和mysql部署在同一个机器
docker inspect <mysql-container-name> | grep IPAddress

```