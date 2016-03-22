<?php

add_action('init','of_options_pmc');
if (!function_exists('of_options_pmc')) {
function of_options_pmc(){
	
//Access the WordPress Categories via an Array
$of_categories = array();  
$of_categories_obj = get_categories('hide_empty=0');
foreach ($of_categories_obj as $of_cat) {
    $of_categories[$of_cat->cat_ID] = $of_cat->cat_name;}
$categories_tmp = array_unshift($of_categories, "Select a category:");    
       
//Access the WordPress Pages via an Array
$of_pages = array();
$of_pages_obj = get_pages('sort_column=post_parent,menu_order');    
foreach ($of_pages_obj as $of_page) {
    $of_pages[$of_page->ID] = $of_page->post_name; }
$of_pages_tmp = array_unshift($of_pages, "Select a page:");       
//Testing 
$of_options_pmc_select = array("one","two","three","four","five"); 
$of_options_pmc_radio = array("one" => "One","two" => "Two","three" => "Three","four" => "Four","five" => "Five");
$of_options_pmc_homepage_blocks = array( 
	"disabled" => array (
		"placebo" 		=> "placebo", //REQUIRED!
		"block_one"		=> "Block One",
		"block_two"		=> "Block Two",
		"block_three"	=> "Block Three",
	), 
	"enabled" => array (
		"placebo" => "placebo", //REQUIRED!
		"block_four"	=> "Block Four",
	),
);
//Stylesheets Reader
$alt_stylesheet_path = LAYOUT_PATH;
$alt_stylesheets = array();
if ( is_dir($alt_stylesheet_path) ) {
    if ($alt_stylesheet_dir = opendir($alt_stylesheet_path) ) { 
        while ( ($alt_stylesheet_file = readdir($alt_stylesheet_dir)) !== false ) {
            if(stristr($alt_stylesheet_file, ".css") !== false) {
                $alt_stylesheets[] = $alt_stylesheet_file;
            }
        }    
    }
}
//Background Images Reader
$bg_images_path = get_stylesheet_directory(). '/images/bg/'; // change this to where you store your bg images
$bg_images_url = get_template_directory_uri().'/images/bg/'; // change this to where you store your bg images
$images_url = get_template_directory_uri().'/images/'; // change this to where you store your bg images
$bg_images = array();
if ( is_dir($bg_images_path) ) {
    if ($bg_images_dir = opendir($bg_images_path) ) { 
        while ( ($bg_images_file = readdir($bg_images_dir)) !== false ) {
            if(stristr($bg_images_file, ".png") !== false || stristr($bg_images_file, ".jpg") !== false) {
                $bg_images[] = $bg_images_url . $bg_images_file;
            }
        }    
    }
}
//Background Images Reader
$bg_images_path_header = get_stylesheet_directory(). '/images/bg-footer/'; // change this to where you store your bg images
$bg_images_url_header  = get_template_directory_uri().'/images/bg-footer/'; // change this to where you store your bg images
$bg_images_header  = array();
if ( is_dir($bg_images_path_header ) ) {
    if ($bg_images_dir_header = opendir($bg_images_path_header) ) { 
        while ( ($bg_images_file_header = readdir($bg_images_dir_header)) !== false ) {
            if(stristr($bg_images_file_header, ".png") !== false || stristr($bg_images_file_header, ".jpg") !== false) {
                $bg_images_header[] = $bg_images_url_header . $bg_images_file_header;
            }
        }    
    }
}
//Background header Images Reader
$bg_images_path_header = get_stylesheet_directory() . '/images/bg-footer/'; // change this to where you store your bg images
$bg_images_url_header  = get_template_directory_uri().'/images/bg-footer/'; // change this to where you store your bg images
$bg_images_header  = array();
if ( is_dir($bg_images_path_header ) ) {
    if ($bg_images_dir_header = opendir($bg_images_path_header) ) { 
        while ( ($bg_images_file_header = readdir($bg_images_dir_header)) !== false ) {
            if(stristr($bg_images_file_header, ".png") !== false || stristr($bg_images_file_header, ".jpg") !== false) {
                $bg_images_header[] = $bg_images_url_header . $bg_images_file_header;
            }
        }    
    }
}
/*-----------------------------------------------------------------------------------*/
/* TO DO: Add options/functions that use these */
/*-----------------------------------------------------------------------------------*/
//More Options
$uploads_arr = wp_upload_dir();
$all_uploads_path = $uploads_arr['path'];
$all_uploads = get_option('of_uploads');
$other_entries = array("Select a number:","1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24");
$body_repeat = array("no-repeat","repeat-x","repeat-y","repeat");
$body_pos = array("top left","top center","top right","center left","center center","center right","bottom left","bottom center","bottom right");
$body_att = array("scroll","fixed");
$body_repeat = array("no-repeat","repeat-x","repeat-y","repeat");
$number_entries = array("Select a number:","1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19","20","25","30","35","40","45","50");
$slider_entries = array("sliceDown", "sliceDownLeft", "sliceUp", "sliceUpLeft", "sliceUpDown", "sliceUpDownLeft", "fold", "fade", "random", "slideInRight", "slideInLeft", "boxRandom", "boxRain", "boxRainReverse", "boxRainGrow", "boxRainGrowReverse");
$google_fonts = array("", "Allan:bold", "Allerta", "Allerta+Stencil", "Amaranth", "Anonymous+Pro", "Arimo", "Arvo", "Bentham", "Buda:light", "Cabin:bold", "Calligraffitti", "Cantarell", "Cardo", "opus+Cream+Soda", "Chewy","Coda:800", "Coming+Soon","Copse", "Corben:bold", "Cousine", "Covered+By+Your+Grace", "Crafty+Girls", "Crimson", "Crushed", "Cuprum", "Droid Sans", "Droid Sans Mono", "Droid Serif", "Fontdiner+Swanky", "Geo", "Gruppo", "Homemade+Apple", "IM Fell", "Inconsolata", "Irish+Growler", "Josefin Sans Std Light", "Josefin+Sans", "Josefin+Slab", "Just+Another+Hand", "Just+Me+Again+Down+Here", "Kenia", "Kranky", "Kreon", "Kristi", "Lato", "Lekton", "Lobster", "Luckiest+Guy", "Maven+Pro", "Merriweather", "Michroma", "Molengo", "Mountains+of+Christmas", "Neucha", "Neuton", "Nobile", "OFL Sorts Mill Goudy TT", "OFL Standard TT", "Orbitron", "Pacifico", "Permanent+Marker", "Philosopher", "PT Sans", "PT Sans Narrow", "Puritan", "Raleway:100", "Reenie Beanie", "Rock+Salt", "Schoolbell", "Six+Caps", "Slackey", "Sniglet:800", "Sunshiney", "Syncopate", "Tangerine", "Tinos", "Ubuntu", "UnifrakturCook:bold", "UnifrakturMaguntia", "Unkempt", "Vibur", "Vidaloka", "Vollkorn", "Walter+Turncoat", "Yanone Kaffeesatz");
$google_fonts_display = str_replace('+', ' ', $google_fonts);
$number_entries_display = array("Select a number:","4","8","12");
$number_entries_display_port = array("Select a number:","3","6","9");
$menus = get_registered_nav_menus();
// Image Alignment radio box
$of_options_pmc_thumb_align = array("alignleft" => "Left","alignright" => "Right","aligncenter" => "Center"); 
// Image Links to Options
$of_options_pmc_image_link_to = array("image" => "The Image","post" => "The Post"); 
// Set the Options Array
global $of_options_pmc;
$of_options_pmc = array();
$of_options_pmc[] = array( "name" => "General Settings",
                    "type" => "heading");
									
					
$of_options_pmc[] = array( "name" => "Allow responsive mode?",
					"desc" => "Check this if you wish to allow responsive mode.",
					"id" => "showresponsive",
					"std" => 1,
					"type" => "checkbox");						

$of_options_pmc[] = array( "name" => "Display the 3 posts block under the logo?",
					"desc" => "Check this if you wish to display first block with 3 posts under the logo.",
					"id" => "use_block1",
					"std" => 0,
					"type" => "checkbox");						
				
$of_options_pmc[] = array( "name" => "Display Instagram block?",
					"desc" => "Check this if you wish to display Instagram block just above the footer",
					"id" => "use_block3",
					"std" => 1,
					"type" => "checkbox");	

$of_options_pmc[] = array( "name" => "Display about us block under the three posts?",
					"desc" => "Check this if you wish to display the about us block",
					"id" => "use_block2",
					"std" => 1,
					"type" => "checkbox");						

$of_options_pmc[] = array( "name" => "Use full width blog and full width single page without sidebar?",
					"desc" => "Check this if you wish to have the blog and single pages in full width format.",
					"id" => "use_fullwidth",
					"std" => 0,
					"type" => "checkbox");		

$of_options_pmc[] = array( "name" => "Display logo at the top (menu under logo)?",
					"desc" => "Check this if you wish to display logo at the top",
					"id" => "logo_top",
					"std" => 1,
					"type" => "checkbox");			

$of_options_pmc[] = array( "name" => "Show recent posts slideshow at the top?",
					"desc" => "Check this if you wish to show recent posts.",
					"id" => "use_recent",
					"std" => 1,
					"type" => "checkbox");							
								
					
$of_options_pmc[] = array( "name" => "Logo settings",
                    "type" => "innerheading");						
					
					
$of_options_pmc[] = array( "name" => "Custom Logo",
					"desc" => "Upload a logo for your theme, or specify the image address of your online logo. (http://yoursite.com/logo.png)",
					"id" => "logo",
					"std" => "http://opus.premiumcoding.com/wp-content/uploads/2014/05/opus-play-logo.png",
					"type" => "upload");	
					
$of_options_pmc[] = array( "name" => "Custom Retina Logo",
					"desc" => "Upload a logo for your theme (retina dispplay), or specify the image address of your online logo. (http://yoursite.com/logo@2x.png)",
					"id" => "logo_retina",
					"std" => "http://opus.premiumcoding.com/wp-content/uploads/2014/05/opus-play-logo.png",
					"type" => "upload");
					
$of_options_pmc[] = array( "name" => "Custom Scroll Logo",
					"desc" => "Upload a scroll logo for your theme. This is not required logo.",
					"id" => "scroll_logo",
					"std" => "http://opus.premiumcoding.com/wp-content/uploads/2014/05/opus-play-logo.png",
					"type" => "upload");					
					

$of_options_pmc[] = array( "name" => "Home page",
                    "type" => "heading");	

$of_options_pmc[] = array( "name" => "Revolution slider",
                    "type" => "innerheading");	

$of_options_pmc[] = array( "name" => "Revolution slider alias",
					"desc" => "Add revolution slider alias for home page. If you don't wish Revolution slider leave field empty.",
					"id" => "rev_slider",
					"std" => "everest",
					"type" => "text"); 		
					
$of_options_pmc[] = array( "name" => "Show Revolution slider only on home page?",
					"desc" => "Check this if you wish to show Revolution slider only on home page.",
					"id" => "use_rev_home",
					"std" => 1,
					"type" => "checkbox");						
										
					
$of_options_pmc[] = array( "name" => "Upper Block (3 posts with images)",
                    "type" => "innerheading");						

$of_options_pmc[] = array( "name" => "Image for the first post (Recommended size 640px x 400px)",
					"desc" => "Upload your image.",
					"id" => "block1_img1",
					"std" => "http://everest.premiumcoding.com/wp-content/uploads/2015/09/everest-featured-post-small-3.jpg",
					"type" => "upload");	

$of_options_pmc[] = array( "name" => "Title for the first post",
					"desc" => "Set the title for the image.",
					"id" => "block1_text1",
					"std" => "IMAGE TEXT",
					"type" => "text"); 
					
$of_options_pmc[] = array( "name" => "Lower Title for the first post",
					"desc" => "Set the lower title for the image.",
					"id" => "block1_lower_text1",
					"std" => "IMAGE TEXT",
					"type" => "text");
					
$of_options_pmc[] = array( "name" => "Link for the first post",
					"desc" => "Set link of the post.",
					"id" => "block1_link1",
					"std" => "http://premiumcoding.com",
					"type" => "text"); 					
					
$of_options_pmc[] = array( "name" => "Image for the second post (Recommended size 640px x 400px)",
					"desc" => "Upload your image.",
					"id" => "block1_img2",
					"std" => "http://everest.premiumcoding.com/wp-content/uploads/2015/09/everest-featured-post-small-3.jpg",
					"type" => "upload");
					

$of_options_pmc[] = array( "name" => "Title for the second post",
					"desc" => "Set the title for the image.",
					"id" => "block1_text2",
					"std" => "IMAGE TEXT",
					"type" => "text"); 		

$of_options_pmc[] = array( "name" => "Lower Title for the second post",
					"desc" => "Set the lower title for the image.",
					"id" => "block1_lower_text2",
					"std" => "IMAGE TEXT",
					"type" => "text");
					

$of_options_pmc[] = array( "name" => "Link for the second post",
					"desc" => "Set link of the post.",
					"id" => "block1_link2",
					"std" => "http://premiumcoding.com",
					"type" => "text"); 					
					
$of_options_pmc[] = array( "name" => "Image for the third post (Recommended size 640px x 400px)",
					"desc" => "Upload your image.",
					"id" => "block1_img3",
					"std" => "http://everest.premiumcoding.com/wp-content/uploads/2015/09/everest-featured-post-small-3.jpg",
					"type" => "upload");	

$of_options_pmc[] = array( "name" => "Title for the third post",
					"desc" => "Set the title for the image.",
					"id" => "block1_text3",
					"std" => "IMAGE TEXT",
					"type" => "text"); 	

$of_options_pmc[] = array( "name" => "Lower Title for the third post",
					"desc" => "Set the lower title for the image.",
					"id" => "block1_lower_text3",
					"std" => "IMAGE TEXT",
					"type" => "text");					

$of_options_pmc[] = array( "name" => "Link for the third post",
					"desc" => "Set link of the post.",
					"id" => "block1_link3",
					"std" => "http://premiumcoding.com",
					"type" => "text"); 					
										
$of_options_pmc[] = array( "name" => "About us block",
                    "type" => "innerheading");			

$of_options_pmc[] = array( "name" => "Image for the quote block  (recommended size 300px x 300px)",
					"desc" => "Upload your image.",
					"id" => "block2_img",
					"std" => "http://everest.premiumcoding.com/wp-content/uploads/2015/09/everest-featured-post-small-3.jpg",
					"type" => "upload");
								

$of_options_pmc[] = array( "name" => "Content text for the quote block",
					"desc" => "Set the text for about us block.",
					"id" => "block2_text",
					"std" => "Text under title",
					"type" => "textarea"); 		

	
$of_options_pmc[] = array( "name" => "Quote block in the Footer",
                    "type" => "innerheading");

$of_options_pmc[] = array( "name" => "Content text for the quote block - above the footer",
					"desc" => "Set the text for quote footer block.",
					"id" => "block_footer_text",
					"std" => "Text under title",
					"type" => "textarea"); 
	
$of_options_pmc[] = array( "name" => "Instagram block",
                    "type" => "innerheading");

$of_options_pmc[] = array( "name" => "Instagram block Title",
					"desc" => "Title for the instagram block just above footer.",
					"id" => "block3_title",
					"std" => "everestirg",
					"type" => "text"); 						
					
$of_options_pmc[] = array( "name" => "Instagram block Username",
					"desc" => "The username that is displayed on the images.",
					"id" => "block3_username",
					"std" => "everestirg",
					"type" => "text"); 	

$of_options_pmc[] = array( "name" => "Instagram block Username Link",
					"desc" => "Link to your profile on Instagram.",
					"id" => "block3_url",
					"std" => "everesturl",
					"type" => "text"); 						
										
////////////////
$of_options_pmc[] = array( "name" => "Blog pages",
                    "type" => "heading");

$of_options_pmc[] = array( "name" => "Display post meta (date and author)?",
					"desc" => "Check this if you wish to display post meta such as date and author.",
					"id" => "display_post_meta",
					"std" => 1,
					"type" => "checkbox");
	
$of_options_pmc[] = array( "name" => "Display socials?",
					"desc" => "Check this if you wish to display social icons.",
					"id" => "display_socials",
					"std" => 1,
					"type" => "checkbox");
	
$of_options_pmc[] = array( "name" => "Single Blog Post",
                    "type" => "innerheading");

$of_options_pmc[] = array( "name" => "Display related posts?",
					"desc" => "Check this if you wish to display related posts.",
					"id" => "display_related",
					"std" => 1,
					"type" => "checkbox");
	
$of_options_pmc[] = array( "name" => "Display tags?",
					"desc" => "Check this if you wish to display tags below each post.",
					"id" => "single_display_tags",
					"std" => 1,
					"type" => "checkbox");

$of_options_pmc[] = array( "name" => "Display author info?",
					"desc" => "Check this if you wish to display author info.",
					"id" => "display_author_info",
					"std" => 1,
					"type" => "checkbox");
	
$of_options_pmc[] = array( "name" => "Display post meta (date and author) on single blog post?",
					"desc" => "Check this if you wish to display post meta such as date and author.",
					"id" => "single_display_post_meta",
					"std" => 1,
					"type" => "checkbox");
	
$of_options_pmc[] = array( "name" => "Display socials?",
					"desc" => "Check this if you wish to display social icons on single blog post.",
					"id" => "single_display_socials",
					"std" => 1,
					"type" => "checkbox");
	
$of_options_pmc[] = array( "name" => "Display post navigation?",
					"desc" => "Check this if you wish to enable prev/next navigation between posts.",
					"id" => "single_display_post_navigation",
					"std" => 1,
					"type" => "checkbox");
	

$of_options_pmc[] = array( "name" => "Styling Options",
					"type" => "heading");
					
$of_options_pmc[] = array( "name" =>  "Main Theme Color ",
					"desc" => "Set the main color for your theme.",
					"id" => "mainColor",
					"std" => "#EEC43D",
					"type" => "color");		
					
$of_options_pmc[] = array( "name" =>  "Lower border Color",
					"desc" => "Lower border color for Portfolio categories (best if it is set to darker version of Theme's main Color",
					"id" => "gradient_color",
					"std" => "#ffffff",
					"type" => "color");						
					
					
$of_options_pmc[] = array( "name" =>  "Box Color ",
					"desc" => "Set the box color for your theme.",
					"id" => "boxColor",
					"std" => "#2a2b2c",
					"type" => "color");		
						
$of_options_pmc[] = array( "name" =>  "Shadow Color ",
					"desc" => "Set the Shadow color for your fonts.",
					"id" => "ShadowColorFont",
					"std" => "#ffffff",
					"type" => "color");			
					
$of_options_pmc[] = array( "name" => "Shadow opacity",
					"desc" => "Set Shadow opacity (between 0 and 1).",
					"id" => "ShadowOpacittyColorFont",
					"std" => "0.15",
					"type" => "text"); 	

$of_options_pmc[] = array( "name" => "Styling for header",
                    "type" => "innerheading");
					
$of_options_pmc[] = array( "name" =>  "Menu background color",
					"desc" => "Pick a background color for the menu.",
					"id" => "menu_background_color",
					"std" => "#222",
					"type" => "color");

$of_options_pmc[] = array( "name" =>  "Header background color",
					"desc" => "Pick a background color for the Header.",
					"id" => "header_background_color",
					"std" => "#ffffff",
					"type" => "color");					
					
					
$of_options_pmc[] = array( "name" => "Body background",
                    "type" => "innerheading");
					
$of_options_pmc[] = array( "name" => "Use boxed version?",
					"desc" => "Check this if you wish to use boxed style.",
					"id" => "use_boxed",
					"std" => 0,
					"type" => "checkbox");					
					
$of_options_pmc[] = array( "name" =>  "Body Background Color",
					"desc" => "Pick a background color for the theme.",
					"id" => "body_background_color",
					"std" => "#ffffff",
					"type" => "color");

$of_options_pmc[] = array( "name" => "Enable Background image (for boxed style)",
					"desc" => "Displays image as background.",
					"id" => "background_image_full",
					"std" => 0,
					"type" => "checkbox");
					
$of_options_pmc[] = array( "name" => "Background Image (for boxed style)",
					"desc" => "Upload background image",
					"id" => "image_background",
					"std" => "http://munditia.premiumcoding.com/wp-content/uploads/2014/01/slideshow-2.jpg",
					"type" => "upload");	
					
		
$of_options_pmc[] = array( "name" => "Custom Style",
                    "type" => "innerheading");				
					
$of_options_pmc[] = array( "name" => "Custom Style",
                    "desc" => "Add your custom style.",
                    "id" => "custom_style",
                    "std" => " ",
                    "type" => "textarea");						
	
$of_options_pmc[] = array( "name" => "Typography",
                    "type" => "heading");
					
$of_options_pmc[] = array( "name" => "Body Typography Settings",
					"desc" => "Change body typography. Set the font family, size, color and style.",
					"id" => "body_font",
					"std" => array('size' => '13px','color' => '#2a2b2c','face' => 'arial'),
					"type" => "typography");

$of_options_pmc[] = array( "name" => "Custom Google font for body Typography",
					"desc" => "Change body typography. Here you can add custom <a target ='_blank' href = 'https://www.google.com/fonts'>Google font</a>.",
					"id" => "google_body_custom",
					"std" => "",
					"type" => "text"); 						
					
$of_options_pmc[] = array( "name" => "Heading Typography Settings",
					"desc" => "Change heading typography. Set the font family and style.",
					"id" => "heading_font",
					"std" => array('face' => 'Yanone%20Kaffeesatz:300','style' => 'normal'),
					"type" => "typography");	
					
$of_options_pmc[] = array( "name" => "Custom Google font for heading Typography",
					"desc" => "Change heading typography. Here you can add custom <a target ='_blank' href = 'https://www.google.com/fonts'>Google font</a>.",
					"id" => "google_heading_custom",
					"std" => "",
					"type" => "text"); 						
					
$of_options_pmc[] = array( "name" => "Menu Typography Settings",
					"desc" => "Change munu typography. Set the font family.",
					"id" => "menu_font",
					"std" => array('face' => 'Yanone%20Kaffeesatz:300','style' => 'normal','color' => '#000'),
					"type" => "typography");

$of_options_pmc[] = array( "name" => "Custom Google font for menu Typography",
					"desc" => "Change menu typography. Here you can add custom <a target ='_blank' href = 'https://www.google.com/fonts'>Google font</a>.",
					"id" => "google_menu_custom",
					"std" => "",
					"type" => "text"); 	

$of_options_pmc[] = array( "name" => "Custom Google font for Quote on front Page",
					"desc" => "Change menu typography. Here you can add custom <a target ='_blank' href = 'https://www.google.com/fonts'>Google font</a>.",
					"id" => "google_quote_custom",
					"std" => "",
					"type" => "text"); 					
					
$of_options_pmc[] = array( "name" => "Box Text Color (text on ribbons and boxes)",
					"desc" => "Change Box Text Color (text on ribbons and boxes).",
					"id" => "body_box_coler",
					"std" => "#ffffff",
					"type" => "color");	
					
$of_options_pmc[] = array( "name" => "Link Typography (color of text links)",
					"desc" => "Change Link Typography (color of text links).",
					"id" => "body_link_coler",
					"std" => "#2a2b2c",
					"type" => "color");			
									
$of_options_pmc[] = array( "name" => "H1 typography",
					"desc" => "Set H1 font size and color.",
					"id" => "heading_font_h1",
					"std" => array('size' => '30px','color' => '#2a2b2c'),
					"type" => "sizeColor");
$of_options_pmc[] = array( "name" => "H2 typography",
					"desc" => "Set H2 font size and color.",
					"id" => "heading_font_h2",
					"std" => array('size' => '22px','color' => '#2a2b2c'),
					"type" => "sizeColor");
					
$of_options_pmc[] = array( "name" => "H3 typography",
					"desc" => "Set H3 font size and color.",
					"id" => "heading_font_h3",
					"std" => array('size' => '20px','color' => '#2a2b2c'),
					"type" => "sizeColor");					
$of_options_pmc[] = array( "name" => "H4typography",
					"desc" => "Set H4 font size and color.",
					"id" => "heading_font_h4",
					"std" => array('size' => '16px','color' => '#2a2b2c'),
					"type" => "sizeColor");	
$of_options_pmc[] = array( "name" => "H5 typography",
					"desc" => "Set H5 font size and color.",
					"id" => "heading_font_h5",
					"std" => array('size' => '14px','color' => '#2a2b2c'),
					"type" => "sizeColor");		
$of_options_pmc[] = array( "name" => "H6 typography",
					"desc" => "Set H6 font size and color.",
					"id" => "heading_font_h6",
					"std" => array('size' => '12px','color' => '#2a2b2c'),
					"type" => "sizeColor");		
										
																							
$of_options_pmc[] = array( "name" => "Social Options",
					"type" => "heading");  
					
$of_options_pmc[] = array( "name" => "Social Icons",
					"desc" => "You can add unlimited number of social Icons and sort them with drag and drop .",
					"id" => "socialicons",
					"std" =>  array('title' => 'Facebook','url' => 'fa-facebook-official','link' => 'http://premiumcoding.com'),
					"social" => true,
					"sidebar" => false,
					"menu" => false,						
					"type" => "slider");
					
$of_options_pmc[] = array( "name" => "Error page",
					"type" => "heading");      
					
$of_options_pmc[] = array( "name" => "404 Error page Title",
                    "desc" => "Set the title of the Error page (404 not found error).",
                    "id" => "errorpagetitle",
                    "std" => esc_html__('OOOPS! 404','pmc-themes'),
                    "type" => "text");	
										
$of_options_pmc[] = array( "name" => "404 Error page Title Content Text",
                    "desc" => "Add a description for your 404 page.",
                    "id" => "errorpage",
                    "std" => esc_html__('Sorry, but the page you are looking for has not been found.<br/>Try checking the URL for errors, then hit refresh.</br>Or you can simply click the icon below and go home:)','pmc-themes'),
                    "type" => "textarea");	   	
					
	
$of_options_pmc[] = array( "name" => "Footer Options",
					"type" => "heading");      
		
					
$of_options_pmc[] = array( "name" => "Copyright info",
                    "desc" => "Add your Copyright or some other notice.",
                    "id" => "copyright",
                    "std" => esc_html__('&copy; 2011 All rights reserved. ','pmc-themes'),
                    "type" => "textarea");

$of_options_pmc[] = array( "name" => "Theme Updates",
					"type" => "heading");	

$of_options_pmc[] = array( "name" => "Envato Username",
                    "desc" => "Enter Envato Username.",
                    "id" => "username",
                    "std" => 'premiumcoding',
                    "type" => "text");	

$of_options_pmc[] = array( "name" => "API key",
                    "desc" => "Enter API key. <a target='_blank' href='http://themes.wearesupa.com/tf/misc/api-key-location.jpg'>Where to find this API key?</a>",
                    "id" => "code",
                    "std" => 'premiumcoding',
                    "type" => "text");							
					
					
	}
}
?>
