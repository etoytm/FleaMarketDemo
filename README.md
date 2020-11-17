# FleaMarketDemo
## API接口
### Base
    除非特殊说明，数据传输格式皆为json;
    如果未登陆，一切请求涉密操作都会返回 : {'status':'notLogin'}
### 登录接口
#### url
    api/checkLogin.php
#### method: 
    post
#### args:
    uid : 用户名
    password : 密码
#### returns:
    校验成功返回{'status':'isLogin'}
    校验失败返回{'status':'notLogin'}
    
### 注册接口
#### url
    api/register.php
#### method
    post
#### args
    uid : 用户名
    password : 密码
#### returns
    nameRepetition : 是否名字重复
    regSuccess : 是否注册成功 
    username : 最终注册的用户名
    

### 获取用户信息接口
#### url
    api/getUserInfo.php
#### method
    post
#### args
    uid : 用户名
#### returns
    info : 包含该用户全部信息的json
