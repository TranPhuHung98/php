<?php
session_start;
class User{
    var $username;
    var $password;
    var $fullname;
    
    function User($username,$password,$fullname)
    {
        $this->usermame = $username;
        $this->password = $password;
        $this->fullname = $fullname;
    }

    /** *
     * Xác thực người sử dụng.
     * @param $username string Tên đăng nhập.
     * @param $password string Mật khẩu.
     * @return User hoặc null nếu không tồn lại.
    **/
    static function authentication($username,$password)
    {
        if($username == "h@gm.com" && $password=="1"){
            return new User($username,$password,"A Hunga");
        }    
    }
}




?>