<?php
session_start();	
function tw_settings_page()
{
    add_settings_section("section", " ", null, "tw");
    add_settings_field("tw-file", "Select File", "tw_file_display", "tw", "section");  
    register_setting("section", "tw-file", "handle_file_upload");
}

function handle_file_upload($option)
{
	
  if(!empty($_FILES["tw-file"]["tmp_name"]))
  {
    $readjson = file_get_contents($_FILES['tw-file']['tmp_name']);
	//Decode JSON
	$data = json_decode($readjson, true);
	
	$updatedPosts = 0;
	$newPosts = 0;

	foreach( $data['words'] as $word ){
		
		$posts = get_posts([
			'post_type'  => 'word',
			'title' => $word['post_title'],
		]);
		$my_post = array(
			'post_title'   => $word['post_title'],
			'post_content' => $word['post_body'],
			'post_type' => 'word',
			'post_status'   => 'publish'
		);
		if(!empty($posts)){
			foreach($posts as $post){
				$my_post['ID'] = $post->ID;
				wp_update_post( $my_post );
			}
			$updatedPosts++;
			
		}else{
			
			wp_insert_post( $my_post );
			$newPosts++;
			
		}
	}
	
	$_SESSION['updatedPosts'] = $updatedPosts;
	$_SESSION['newPosts'] = $newPosts;
  }
 
  return $option;
}

function tw_file_display()
{
   ?>
        <input type="file" name="tw-file" />
        <?php echo get_option('tw-file'); ?>
   <?php
   if( $_SESSION['newPosts'] && $_SESSION['newPosts']>0 ){
	   echo '<p>Word Added : '.$_SESSION['newPosts'];
   }
   if( $_SESSION['updatedPosts'] && $_SESSION['updatedPosts']>0 ){
	   echo '<p>Words Updated : '.$_SESSION['updatedPosts'];
   }
}

add_action("admin_init", "tw_settings_page");

function tw_page()
{
  ?>
      <div class="wrap">
         <h1>Import menu item</h1>
		<p><i>Select a json format file</i></p>
         <form method="post" action="options.php" enctype="multipart/form-data">
            <?php
               settings_fields("section");
 
               do_settings_sections("tw");
                 
               submit_button('IMPORT');
            ?>
         </form>
      </div>
   <?php
}

function menu_item()
{
	add_menu_page('Import Menu Item', 'Today\'s Word', 'manage_options', 'todays-word', 'tw_page');
}
 
add_action("admin_menu", "menu_item");