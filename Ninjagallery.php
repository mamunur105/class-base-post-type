<?php

namespace Vendor_Name\Plugin_Name\Admin;

use Vendor_Name\Plugin_Name\Abs\CustomPostType;

class Ninjagallery extends CustomPostType{
    function __construct(){
        parent::__construct();
    }
    function set_post_type_name(){
        return 'News';
    }
    // function set_post_type_labels(){
    //     return array(
    //         'menu_name'             => 'News'
    //     );
    // }
    // function set_post_type_args(){
    //     return array(
    //         'has_archive'        => false,
    //         'publicly_queryable' => false,
    //     );
    // }
}