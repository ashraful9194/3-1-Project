<?php
class EditProfilePasswordChange 
{
    public  $oldpassword,
            $newpassword,
            $c_newpassword;
    

    public function __construct() {
        $this->oldpassword = [];
        $this->newpassword = [];
        $this->c_newpassword = [];
        
    }

    public function haserror()
    {
        return count($this->oldpassword) > 0 || count($this->newpassword) > 0 || count($this->c_newpassword) > 0;
    }
}

?>