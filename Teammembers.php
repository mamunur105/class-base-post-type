<?php
namespace Vendor_Name\Plugin_Name\Admin;

use Vendor_Name\Plugin_Name\Abs\CustomPostType;

class Teammembers extends CustomPostType{
    public function initposttype(){
        $this->register_post_type();
    }
    // must use
    function set_post_type_name(){
        return 'Team Member';
    }
}