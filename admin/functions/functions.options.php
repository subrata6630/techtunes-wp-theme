<?php

add_action('init','of_options');

if (!function_exists('of_options'))
{
	function of_options()
	{
		//Access the WordPress Categories via an Array
		$of_categories 		= array();  
		$of_categories_obj 	= get_categories('hide_empty=0');
		foreach ($of_categories_obj as $of_cat) {
		    $of_categories[$of_cat->cat_ID] = $of_cat->cat_name;}
		$categories_tmp 	= array_unshift($of_categories, "Select a category:");    
	       
		//Access the WordPress Pages via an Array
		$of_pages 			= array();
		$of_pages_obj 		= get_pages('sort_column=post_parent,menu_order');    
		foreach ($of_pages_obj as $of_page) {
		    $of_pages[$of_page->ID] = $of_page->post_name; }
		$of_pages_tmp 		= array_unshift($of_pages, "Select a page:");       
	
		//Testing 
		$of_options_select 	= array("one","two","three","four","five"); 
		$of_options_radio 	= array("one" => "One","two" => "Two","three" => "Three","four" => "Four","five" => "Five");
		
		//Sample Homepage blocks for the layout manager (sorter)
		$of_options_homepage_blocks = array
		( 
			"disabled" => array (
				"placebo" 		=> "placebo", //REQUIRED!
				"block_one"		=> "Block One",
				"block_two"		=> "Block Two",
				"block_three"	=> "Block Three",
			), 
			"enabled" => array (
				"placebo" 		=> "placebo", //REQUIRED!
				"block_four"	=> "Block Four",
			),
		);


		//Stylesheets Reader
		$alt_stylesheet_path = LAYOUT_PATH;
		$alt_stylesheets = array();
		
		if ( is_dir($alt_stylesheet_path) ) 
		{
		    if ($alt_stylesheet_dir = opendir($alt_stylesheet_path) ) 
		    { 
		        while ( ($alt_stylesheet_file = readdir($alt_stylesheet_dir)) !== false ) 
		        {
		            if(stristr($alt_stylesheet_file, ".css") !== false)
		            {
		                $alt_stylesheets[] = $alt_stylesheet_file;
		            }
		        }    
		    }
		}


		//Background Images Reader
		$bg_images_path = get_stylesheet_directory(). '/images/bg/'; // change this to where you store your bg images
		$bg_images_url = get_template_directory_uri().'/images/bg/'; // change this to where you store your bg images
		$bg_images = array();
		
		if ( is_dir($bg_images_path) ) {
		    if ($bg_images_dir = opendir($bg_images_path) ) { 
		        while ( ($bg_images_file = readdir($bg_images_dir)) !== false ) {
		            if(stristr($bg_images_file, ".png") !== false || stristr($bg_images_file, ".jpg") !== false) {
		            	natsort($bg_images); //Sorts the array into a natural order
		                $bg_images[] = $bg_images_url . $bg_images_file;
		            }
		        }    
		    }
		}
		

		/*-----------------------------------------------------------------------------------*/
		/* TO DO: Add options/functions that use these */
		/*-----------------------------------------------------------------------------------*/
		
		//More Options
		$uploads_arr 		= wp_upload_dir();
		$all_uploads_path 	= $uploads_arr['path'];
		$all_uploads 		= get_option('of_uploads');
		$other_entries 		= array("Select a number:","1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19");
		$body_repeat 		= array("no-repeat","repeat-x","repeat-y","repeat");
		$body_pos 			= array("top left","top center","top right","center left","center center","center right","bottom left","bottom center","bottom right");
		
		// Image Alignment radio box
		$of_options_thumb_align = array("alignleft" => "Left","alignright" => "Right","aligncenter" => "Center"); 
		
		// Image Links to Options
		$of_options_image_link_to = array("image" => "The Image","post" => "The Post"); 


/*-----------------------------------------------------------------------------------*/
/* The Options Array */
/*-----------------------------------------------------------------------------------*/

// Set the Options Array
global $of_options;
$of_options = array();

$of_options[] = array( 	"name" 		=> "Home Settings",
						"type" 		=> "heading"
				);
					
$of_options[] = array( 	"name" 		=> "Hello there!",
						"desc" 		=> "",
						"id" 		=> "introduction",
						"std" 		=> "<h3 style=\"margin: 0 0 10px;\">Welcome to techtunes Options Framework.</h3>
						Yout can easily customize your blog by using this options framework. To set custom logo and background please go to Appearance -> Customize .",
						"icon" 		=> true,
						"type" 		=> "info"
				);
$of_options[] = array( 	"name" 		=> "Site favicon",
						"desc" 		=> "Upload your site favicon here. keep width 75px and height 75px.",
						"id" 		=> "favicon",
						"type" 		=> "upload"
				);
$of_options[] = array( 	"name" 		=> "Display back to top button",
						"desc" 		=> "You can show or hide back to top button by using this switch options",
						"id" 		=> "top",
						"std" 		=> 1,
						"on" 		=> "Yes Show it",
						"off" 		=> "No Hide it",
						"type" 		=> "switch"
				);
//Category selection				
$of_options[] = array( 	"name" 		=> "Categories",
						"type" 		=> "heading"
				);
$of_options[] = array( 	"name" 		=> "Featured post category",
						"desc" 		=> "select a category to show post as featured post.",
						"id" 		=> "h_b_c",
						"std" 		=> "Select a category:",
						"type" 		=> "select",
						"options" 	=> $of_categories
				);				
//Comments options				
$of_options[] = array( 	"name" 		=> "Comments",
						"type" 		=> "heading"
				);				
				
$of_options[] = array( 	"name" 		=> "enable comments on single post",
						"desc" 		=> "You can show or hide comment section by using this switch options",
						"id" 		=> "enable_disable_blog_comments",
						"std" 		=> 1,
						"on" 		=> "Yes Show it",
						"off" 		=> "No Hide it",
						"type" 		=> "switch"
				);
$of_options[] = array( 	"name" 		=> "enable comments on  page",
						"desc" 		=> "You can show or hide comment section by using this switch options",
						"id" 		=> "enable_disable_page_comments",
						"std" 		=> 0,
						"on" 		=> "Yes Show it",
						"off" 		=> "No Hide it",
						"type" 		=> "switch"
				);

//Single Page Settings
$of_options[] = array( 	"name" 		=> "Post Settings",
						"type" 		=> "heading"
				);
$of_options[] = array( 	"name" 		=> "Display Related post",
						"desc" 		=> "Display related post on bottom of the page ",
						"id" 		=> "relatopo",
						"std" 		=> 0,
						"on" 		=> "Yes Show it",
						"off" 		=> "No Hide it",
						"type" 		=> "switch"
				);				
//Advertisement Settings				
$of_options[] = array( 	"name" 		=> "Advertisement",
						"type" 		=> "heading"
				);		
$of_options[] = array( 	"name" 		=> "Single page ads space under post title",
						"desc" 		=> "Ads under post title",
						"id" 		=> "logo_ads",
						"type" 		=> "textarea"
				);
$of_options[] = array( 	"name" 		=> "Single page ads space in post footer",
						"desc" 		=> "Ads space on post footer",
						"id" 		=> "bogo_ads",
						"type" 		=> "textarea"
				);

//Seo Optimization
$of_options[] = array( 	"name" 		=> "Seo options",
						"type" 		=> "heading"
				);
$of_options[] = array( "name" => "Space before &lt;/head&gt;",
					"desc" => "Add code before the &lt;/head&gt; tag.",
					"id" => "code_head",
					"std" => "",
					"type" => "textarea");	
$of_options[] = array( "name" => "Tracking Code",
					"desc" => "Paste your Google Analytics (or other) tracking code here. This will be added into the footer template of your theme.",
					"id" => "google_analytics",
					"std" => "",
					"type" => "textarea");

// Backup Options
	$of_options[] = array( "name" => __('Backup Options', 'techtunes'),
						"type" => "heading");
						
	$of_options[] = array( "name" => __('Backup and Restore Option', 'techtunes'),
						"id" => "of_backup",
						"std" => "",
						"type" => "backup",
						"desc" => __('You can use the two buttons below to backup your current options, and then restore it back at a later time. This is useful if you want to experiment on the options but would like to keep the old settings in case you need it back.', 'techtunes'),
						);
						
	$of_options[] = array( "name" => __('Transfer Theme Options Data', 'techtunes'),
						"id" => "of_transfer",
						"std" => "",
						"type" => "transfer",
						"desc" => __('You can tranfer the saved options data between different installs by copying the text inside the text box. To import data from another install, replace the data in the text box with the one from another install and click "Import Options.', 'techtunes'),
					);	
	}//End function: of_options()
}//End chack if function exists: of_options()
?>
