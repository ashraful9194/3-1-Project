<?php
class EditProfileFnameLname
{
    public  $fname,
            $lname;
            
    

    public function __construct() {
        $this->fname = [];
        $this->lname = [];
       
        
    }

    public function haserror()
    {
        return count($this->fname) > 0 || count($this->lname) > 0;
    }
}

?>