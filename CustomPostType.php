<?php
namespace Vendor_Name\Plugin_Name\Abs;

abstract class CustomPostType{

    private $post_type_name;
    private $post_type_args;
	private $post_type_labels;
	function __construct(){
		$this->post_type_name = self::uglify($this->set_post_type_name());
		$this->post_type_args = $this->set_post_type_args() ?? array() ;
		$this->post_type_labels = $this->set_post_type_labels() ?? array();
	}
	/**
	 * init $post_type_name
	 *
	 * @return set $post_type_name
	 */
	abstract function set_post_type_name();
	/**
	 * set_post_type_args
	 *
	 * @param [type] array
	 * @return set post_type_args
	 */
	protected function set_post_type_args(){}
	/**
	 * post_type_labels
	 *
	 * @param [type] array
	 * @return set $post_type_labels;
	 */
	protected function set_post_type_labels( ){}
	/**
	 * Set Post Type Name
	 *
	 * @param [type] $string
	 * @return $string
	 */

	// protected function _set(){
	// 	$this->post_type_name = self::uglify($this->set_post_type_name());
	// 	$this->post_type_args = $this->set_post_type_args() ?? array() ;
	// 	$this->post_type_labels = $this->set_post_type_labels() ?? array();
	// }
	/**
	 * Beautify string
	 *
	 * @param [type] $string
	 * @return string
	 */
	public static function beautify( $string ){
		return ucwords( str_replace( '_', ' ', $string ) );
	}
	/**
	 * Beautify string
	 *
	 * @param [type] $string
	 * @return $string
	 */
	public static function uglify( $string ){
		return strtolower( str_replace( ' ', '_', $string ) );
	}

	/**
	 * Pluralize String
	 * @param [type] $string
	 * @return $Plural_string
	 */

	public static function pluralize( $string='' ){
		$last = $string[strlen( $string ) - 1];
		if( $last == 'y' ){
			$cut = substr( $string, 0, -1 );
			//convert y to ies
			$plural = $cut . 'ies';
		}else{
			// just attach an s
			$plural = $string . 's';
		}
		return $plural;
	}

	// function
    /* Method which registers the post type */
	public function register_post_type(){

		//Capitilize the words and make it plural
		$name       = self::beautify( $this->post_type_name );//ucwords( str_replace( '_', ' ', $this->post_type_name ) );
		$plural     = self::pluralize( $name );
		// We set the default labels based on the post type name and plural. We overwrite them with the given labels.
		$defaults_labels = array(
			'name'                  => _x( $plural, 'post type general name' ),
			'singular_name'         => _x( $name, 'post type singular name' ),
			'add_new'               => _x( 'Add New', strtolower( $name ) ),
			'add_new_item'          => __( 'Add New ' . $name ),
			'edit_item'             => __( 'Edit ' . $name ),
			'new_item'              => __( 'New ' . $name ),
			'all_items'             => __( 'All ' . $plural ),
			'view_item'             => __( 'View ' . $name ),
			'search_items'          => __( 'Search ' . $plural ),
			'not_found'             => __( 'No ' . strtolower( $plural ) . ' found'),
			'not_found_in_trash'    => __( 'No ' . strtolower( $plural ) . ' found in Trash'), 
			'parent_item_colon'     => '',
			'menu_name'             => $plural
		);

		$labels = wp_parse_args( $this->post_type_labels, $defaults_labels );
		// $labels = wp_parse_args( $this->set_post_type_labels( ), $defaults_labels );
		// Same principle as the labels. We set some defaults and overwrite them with the given arguments.
		$defaults_args = array(
				'label'                 => $plural,
				// 'labels'                => $labels,
				'public'                => true,
				'show_ui'               => true,
				'supports'              => array( 'title', 'editor' ),
				'show_in_nav_menus'     => true,
				'has_archive'        	=> true,
			);
		$args = wp_parse_args( $this->post_type_args, $defaults_args );
		$args['labels']= $labels;
		// Register the post type
		register_post_type( $this->post_type_name, $args );
	}


}