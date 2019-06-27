<?php
/**
 * 耦合使用 Database 物件進行資料庫驗證 username 與 email 是否已存在於資料庫
 */
class UserVeridator {

    private $error;

    /**
     * 驗證是否已登入
     */
    public static function isLogin($username){
        if($username != ''){
            return true;
        } else{
            return false;
        }
    }
    /**
    ** check user level
    */
    public function isAdmin($userlevel)
    {
        if($userlevel == "admin"){
            return true;
        } else{
            return false;
        }
    }

    /**
     * 可取出錯誤訊息字串陣列
     */
    public function getErrorArray(){
        return $this->error;
    }

    /**
     * 驗證二次密碼輸入是否相符
     */
    public function isPasswordMatch($password, $passwrodConfirm){
		if ($password != $passwrodConfirm){
            $this->error[] = '<div class="alert alert-danger">Passwords do not match.</div>';
            return false;
        }
		return true;
    }

    /**
     * 驗證帳號密碼是否正確可登入
     */
    public function loginVerification($username, $password){

        $result = Database::get()->execute('SELECT * FROM users WHERE username = :username', array(':username' => $username));
        if(isset($result[0]['id']) and !empty($result[0]['id'])) {
            $passwordObject = new Password();
            if($passwordObject->password_verify($password,$result[0]['password'])){
                return true;
            }
        }
        $this->error[] = '<div class="alert alert-danger">Wrong username or password.</div>';
        return false;
    }

    /**
     * 驗證帳號是否已存在於資料庫中
     */
    public function isUsernameDuplicate($username){
        $result = Database::get()->execute('SELECT username FROM users WHERE username = :username', array(':username' => $username));
        if(isset($result[0]['username']) and !empty($result[0]['username'])){
          $this->error[] = '<div class="alert alert-danger">Username provided is already in use.</div>';
          return false;
        }
		return true;
    }

    /**
     * 驗證信箱是否已存在於資料庫中
     */
    public function isEmailDuplicate($email){
        $result = Database::get()->execute('SELECT email FROM users WHERE email = :email', array(':email' => $email));
        if(isset($result[0]['email']) AND !empty($result[0]['email'])){
            $this->error[] = '<div class="alert alert-danger">Email provided is already in use.</div>';
            return false;
        }
		return true;
    }

    /**
    *   驗證帳戶是否存在於資料庫中
    **/
    public function isAccountExist($wallet_account){
        $result = Database::get()->execute('SELECT wallet_account FROM users WHERE wallet_account = :wallet_account', array(':wallet_account' => $wallet_account));
        if(isset($result[0]['wallet_account']) AND !empty($result[0]['wallet_account'])){
            return true;
        } else{
            $this->error[] = 'This account doesn\'t exist';
            return false;
        }
    }
}
?>
