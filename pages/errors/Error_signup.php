<?php
class FormError 
{
    public $fname,
            $lname,
            $username,
            $password,
            $email,
            $sql,
            $excep;
    

    public function __construct() {
        $this->fname = [];
        $this->lname = [];
        $this->username = [];
        $this->email = [];
        $this->password = [];
        $this->sql = [];
        $this->excep = [];
    }

    public function haserror()
    {
        return count($this->fname) > 0 || count($this->lname) > 0 || count($this->username) > 0 || count($this->email) > 0 || count($this->password) > 0;
    }
}

?>