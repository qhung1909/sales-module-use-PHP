<?php

class UserModel extends CoreModel{
    public function login($Email, $Password) {
        return $this->db->pdo_query_one('SELECT * FROM taikhoan WHERE email = ? and matkhau = ?', $Email, $Password);
    }
    
    public function register($Email, $Password) {
        return $this->db->pdo_query("INSERT INTO taikhoan (email, matkhau) VALUES (?, ?)", $Email, $Password);
    }
    public function checkMail($email){
        return $this->db->pdo_query_one('SELECT * FROM taikhoan WHERE email = ?', $email);
    }
    public function genOTP($email){
        $OTP = rand(100000,999999);
        $now = new DateTime();
        $now->add(new DateInterval("PT5M"));
        $HanOTP = $now->format("Y-m-d H:i:s");
        $this->db->pdo_execute("UPDATE taikhoan SET OTP = ?, HanOTP = ? WHERE email = ?", $OTP,$HanOTP,$email);
        return $OTP;
    }
    public function resetPassword($password,$OTP){
        $now = date("Y-m-d H:i:s");
        $kq = $this->db->pdo_query_one('SELECT * FROM taikhoan WHERE OTP = ? and HanOTP >=?', $OTP, $now);
        if($kq){
            $this->db->pdo_execute("UPDATE taikhoan SET matkhau = ? WHERE OTP = ?", $password,$OTP);
            return true;
        }
        else{
            return false;
        }
    }
}