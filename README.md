# class-base-post-type

Step 1 :

include abstract class 'CustomPostType'

Step 2 :

extends The class 'CustomPostType'

You must need overwrite this method,

1. set_post_type_name

2. Call parent __construct in your __construct function

you can overwrite  set_post_type_labels,set_post_type_args function too.

Example

namespace Vendor_Name\Plugin_Name\Admin;// You can remove this line if you are not using namespace

use Vendor_Name\Plugin_Name\Abs\CustomPostType;// You can remove this line if you are not using namespace

`
namespace Vendor_Name\Plugin_Name\Admin;

use Vendor_Name\Plugin_Name\Abs\CustomPostType;

class Ninjagallery extends CustomPostType{

    function __construct(){
    
        parent::__construct();
        
    }
    
    // must use 
    
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
`
