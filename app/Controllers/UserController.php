<?php

class UserController extends CoreController{
    public function login(){
        $this->loadCategories(); 
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $user = $this->loadModel('User');
            $kq = $user->Login($_POST['Email'],$_POST['Password']);
            
            if($kq){
                $_SESSION['user'] = $kq;
                header('Location: '.APPURL);
                return;
            }
            else{
                showNoti("Sai Email hoặc Pass", "danger");
            }
        }
        $this->loadView('page_login');
    }

    public function register(){
        $this->loadCategories();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $user = $this->loadModel('User');
            $email = $_POST['Email'];
            $password = $_POST['Password'];
            $confirmPassword = $_POST['ConfirmPassword'];
    
            if (!$email || !$password || !$confirmPassword) {
                showNoti("Vui lòng nhập đầy đủ thông tin.", "danger");
                return;
            }
    
            if ($password != $confirmPassword) {
                showNoti("Mật khẩu không khớp", "danger");
                return;
            }
       
            $result = $user->register($email, $password);   
            if ($result) {
                header('Location: '.APPURL.'user/login');
            } else {
                showNoti("Đăng ký thất bại", "danger");
            }
        }
    
        // Load view đăng ký
        $this->loadView('page_register');
    }
    

    public function logout(){
        unset($_SESSION['user']);
        header('Location:'.APPURL);
    }

    public function forgotPass(){
        $user = $this->loadModel('User');
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $kq = $user->checkMail($_POST['email']);
            if($kq){
                $_SESSION['reset_email'] = $_POST['email'];
                // Gửi mail    
                $OTP = $user ->genOTP($_POST['email']);
                $senderName = "HSE";
                $senderEmail = "hunglexjinnox@gmail.com";
                $senderEmailPassword = "rpqm kkek irgf sovw";
                $recieverEmail = $_POST['email'];
                $subject = "Thay đổi mật khẩu tài khoản!";
                $body = "Sử dụng mã OTP sau đây để đặt lại mật khẩu của bạn. OTP của bạn là: <strong>".$OTP."</strong>.
                Mã có hiệu lực trong 5 phút!";
                $mailer = new Mail($senderName,$senderEmail,$senderEmailPassword);
                $mailer->sendMail($recieverEmail,$subject,$body);
                showNoti("Đã gửi email, hãy kiểm tra email trong hộp thư.",'success');
                unset($_SESSION['reset_email']);
                header('Location: '.APPURL.'user/resetPassword');
            }
            else{
                // Thông báo không có mail
                showNoti('Email không tồn tại');
            }
        }
        
        $this->loadView('page_forgotPassword');
    }

    public function resetPassword(){
        $user = $this->loadModel('User');
        if(!isset($_SESSION['reset_email'])){
            header('Location: '.APPURL.'user/forgotPass');
            exit;
        }
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $kq = $user->resetPassword($_POST['password'],$_POST['OTP']);
            if($kq){
                header('Location: '.APPURL.'user/login');
            }
            else{
                showNoti("Mã OTP không đúng hoặc đã hết hạn! ", "warning");
            }
        }
    
        $this->loadView('page_resetPassword');
    }
    
}