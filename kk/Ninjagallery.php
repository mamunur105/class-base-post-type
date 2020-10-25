<?php

namespace Vendor_Name\Plugin_Name\Admin;

use Vendor_Name\Plugin_Name\Abs\CustomPostType;
use Vendor_Name\Plugin_Name\Abs\Taxonomies;

class Ninjagallery extends CustomPostType{

    use Taxonomies;

    /**
     * Run post type and taxonomy
     *
     * @return Post type name And taxonomy init
     */
    public function initposttype(){
        $this->register_post_type();
        $this->add_taxonomy();
    }
    /**
     * Post type name
     *
     * @return Post type name
     */
    function set_post_type_name(){
        return 'News';
    }

    /**
     * Post type labels
     *
     * @return Post type labels
     */
    function set_post_type_labels(){
        return array(
            'name'      => _x( 'News', 'post type general name' ),
            'menu_name' => 'News',
            'all_items' => __( 'All News' ),
            'search_items'          => __( 'Search News' ),
			'not_found'             => __( 'No News found'),
			'not_found_in_trash'    => __( 'No News found in Trash'),
        );
    }

    /**
     * Post type args
     *
     * @return Post type args
     */
    function set_post_type_args(){
        return array(
            'has_archive'        => false,
            'rewrite'            => array( 'slug' => 'news-list' ),
            // 'publicly_queryable' => false,
            // 'label'                 => 'News',
        );
    }
    /**
     * Texonomy Name
     *
     * @return Texonomy Name
     */
    public function set_taxonomy_name(){
        return "News Type";
    }
    /*
    * texonomy set_taxonomy_labels
    * @return set_taxonomy_labels
    */
    function set_taxonomy_labels(){
        return array(
            'name'          => _x( 'Writers', 'taxonomy general name', 'textdomain' ),
            'menu_name'     => __( 'Writers' ),
        );
    }
    /*
    * texonomy set_taxonomy_args
    * @return set_taxonomy_labels
    */
    function set_taxonomy_args(){
        return array(
            'label'                 => 'XXX',
            'rewrite'               => array( 'slug' => 'news-writer' ),
        );
    }
}