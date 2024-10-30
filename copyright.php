<?php
/*
Plugin Name: Copyright for WP
Plugin URI:  https://wordpress.org/plugins/copyrights
Description: Copyright for WP is a simple plugin to help webmaster to add copyright in wordpress site, wordpress post, rss feed
Version: 1.0.0
Author:  tinygear
copyright content in backend
Author URI: https://wordpress.org/plugins/copyrights/
Text Domain: crt-copyright
License: GPLv3 or later
*/


if (!defined('ABSPATH'))
{
	exit;
}

function crt_site_origin_message_setting()
{
	global $wpdb;

	if (isset($_POST['crt_site_copyright_origin_submit']))
	{
		check_admin_referer( 'crt_site_copyright_origin_nonce' );
		if (isset($_POST['crt_site_copyright_origin_content']))
		{
			$crt_site_copyright_origin_content = sanitize_text_field(htmlentities($_POST['crt_site_copyright_origin_content']));
			update_option('crt_site_copyright_origin_content',$crt_site_copyright_origin_content);
		}
		else
		{
			delete_option('crt_site_copyright_origin_content');
		}

		if (isset($_POST['crt_enable_site_copyright']))
		{
			$crt_enable_site_copyright = sanitize_text_field(htmlentities($_POST['crt_enable_site_copyright']));
			update_option('crt_enable_site_copyright',$crt_enable_site_copyright);
		}
		else
		{
			delete_option('crt_enable_site_copyright');
		}

		$bpmoMessageString =  __( 'Your changes has been saved.', 'crt-copyright' );
		crt_copyright_submit_message($bpmoMessageString);
	}
	echo "<br />";
	?>

<div style='margin:10px 5px;'>
<div style='padding-top:5px; font-size:22px;'>Copyright Statement in WordPress Post Settings:</div>
</div>
<div style='clear:both'></div>		
		<div class="wrap">
			<div id="dashboard-widgetCopyright Stats-wrap">
			    <div id="dashboard-widgets" class="metabox-holder">
					<div id="post-body">
						<div id="dashboard-widgets-main-content">
							<div class="postbox-container" style="width:90%;">
								<div class="postbox">
									<h3 class='hndle' style='padding: 20px; !important'>
									<span>
									<?php 
											echo  __( 'Copyright in Site Panel:', 'crt-copyright' );
									?>
									</span>
									</h3>
								
									<div class="inside" style='padding-left:10px;'>
										<form id="bpmoform" name="bpmoform" action="" method="POST">
										<table id="bpmotable" width="100%">
										
										<tr style="margin-top:30px;">
										<td width="30%" style="padding: 20px;" valign="top">
										<?php 
											echo  __( 'Enable Copyright Statement at the Bottom of the WordPress Site:', 'crt-copyright' );
										?>
										</td>
										<td width="70%" style="padding: 20px;">
										<?php 
										$crt_enable_site_copyright = get_option('crt_enable_site_copyright'); 
										if (!(empty($crt_enable_site_copyright)))
										{
											
										}
										else
										{
											$crt_enable_site_copyright = '';
										}
										?>
										<?php 
										if (!(empty($crt_enable_site_copyright)))
										{
											echo '<input type="checkbox" id="crt_enable_site_copyright" name="crt_enable_site_copyright"  style="" value="yes"  checked="checked"> Enable Copyright Statement at the Bottom of WordPress Site ';
										}
										else 
										{
											echo '<input type="checkbox" id="crt_enable_site_copyright" name="crt_enable_site_copyright"  style="" value="yes" > Enable Copyright Statement at the Bottom of WordPress Site';
										}
										?>
										</td>
										</tr>
										<tr>
										<td width="30%" style="padding: 30px 20px 20px 20px; " valign="top">
										<?php 
											echo  __( 'Content of Copyright Statement in WordPress Site:', 'crt-copyright' );
										?>
										</td>
										<td width="70%" style="padding: 20px;">
										<?php 
										$crt_site_copyright_origin_content =  crt_site_copyright_origin_content();
										$crt_site_copyright_origin_content = html_entity_decode(stripcslashes($crt_site_copyright_origin_content));
										echo '<div>';
										wp_editor($crt_site_copyright_origin_content, 'crt_site_copyright_origin_content');
										echo '</div>';
										?>
										</td>
										</tr>

																				
										</table>
										<br />
										<?php
											wp_nonce_field('crt_site_copyright_origin_nonce');
										?>
										<input type="submit" id="crt_site_copyright_origin_submit" name="crt_site_copyright_origin_submit" value=" Submit " style="margin:1px 20px;">
										</form>
										
										<br />
									</div>
								</div>
							</div>
						</div>
					</div>
		    	</div>
			</div>
		</div>
		<div style="clear:both"></div>
		<br />
		<?php
}

function crt_post_copyright_origin_message_setting()
{
	global $wpdb;

	if (isset($_POST['crt_post_copyright_origin_submit']))
	{
		check_admin_referer( 'crt_post_copyright_origin_nonce' );
		if (isset($_POST['crt_post_copyright_origin_content']))
		{
			$crt_post_copyright_origin_content = sanitize_text_field(htmlentities($_POST['crt_post_copyright_origin_content']));
			update_option('crt_post_copyright_origin_content',$crt_post_copyright_origin_content);
		}
		else
		{
			delete_option('crt_post_copyright_origin_content');
		}

		if (isset($_POST['crt_enable_post_copyright']))
		{
			$crt_enable_post_copyright = sanitize_text_field(htmlentities($_POST['crt_enable_post_copyright']));
			update_option('crt_enable_post_copyright',$crt_enable_post_copyright);
		}
		else
		{
			delete_option('crt_enable_post_copyright');
		}

		$bpmoMessageString =  __( 'Your changes has been saved.', 'crt-copyright' );
		crt_copyright_submit_message($bpmoMessageString);
	}
	echo "<br />";
	?>

<div style='margin:10px 5px;'>
<div style='padding-top:5px; font-size:22px;'>Copyright Statement in WordPress Post Settings:</div>
</div>
<div style='clear:both'></div>		
		<div class="wrap">
			<div id="dashboard-widgetCopyright Stats-wrap">
			    <div id="dashboard-widgets" class="metabox-holder">
					<div id="post-body">
						<div id="dashboard-widgets-main-content">
							<div class="postbox-container" style="width:90%;">
								<div class="postbox">
									<h3 class='hndle' style='padding: 20px; !important'>
									<span>
									<?php 
											echo  __( 'Copyright in Post Panel:', 'crt-copyright' );
									?>
									</span>
									</h3>
								
									<div class="inside" style='padding-left:10px;'>
										<form id="bpmoform" name="bpmoform" action="" method="POST">
										<table id="bpmotable" width="100%">
										
										<tr style="margin-top:30px;">
										<td width="30%" style="padding: 20px;" valign="top">
										<?php 
											echo  __( 'Enable Copyright Statement in WordPress Post:', 'crt-copyright' );
										?>
										</td>
										<td width="70%" style="padding: 20px;">
										<?php 
										$crt_enable_post_copyright = get_option('crt_enable_post_copyright'); 
										if (!(empty($crt_enable_post_copyright)))
										{
											
										}
										else
										{
											$crt_enable_post_copyright = '';
										}
										?>
										<?php 
										if (!(empty($crt_enable_post_copyright)))
										{
											echo '<input type="checkbox" id="crt_enable_post_copyright" name="crt_enable_post_copyright"  style="" value="yes"  checked="checked"> Enable Copyright Statement in WordPress Post ';
										}
										else 
										{
											echo '<input type="checkbox" id="crt_enable_post_copyright" name="crt_enable_post_copyright"  style="" value="yes" > Enable Copyright Statement in WordPress Post';
										}
										?>
										</td>
										</tr>
										<tr>
										<td width="30%" style="padding: 30px 20px 20px 20px; " valign="top">
										<?php 
											echo  __( 'Content of Copyright Statement in WordPress Post:', 'crt-copyright' );
										?>
										</td>
										<td width="70%" style="padding: 20px;">
										<?php 
										
										$crt_post_copyright_origin_content =  crt_post_copyright_origin_content();
										$crt_post_copyright_origin_content = html_entity_decode(stripcslashes($crt_post_copyright_origin_content));
										echo '<div>';
										wp_editor($crt_post_copyright_origin_content, 'crt_post_copyright_origin_content');
										echo '</div>';
										?>
										</td>
										</tr>

																				
										</table>
										<br />
										<?php
											wp_nonce_field('crt_post_copyright_origin_nonce');
										?>
										<input type="submit" id="crt_post_copyright_origin_submit" name="crt_post_copyright_origin_submit" value=" Submit " style="margin:1px 20px;">
										</form>
										
										<br />
									</div>
								</div>
							</div>
						</div>
					</div>
		    	</div>
			</div>
		</div>
		<div style="clear:both"></div>
		<br />
		<?php
}


function crt_rss_origin_message_setting()
{
	global $wpdb;

	if (isset($_POST['crt_rss_origin_submit']))
	{
		check_admin_referer( 'crt_rss_origin_nonce' );
		if (isset($_POST['crt_rss_origin_content']))
		{
			$crt_rss_origin_content = sanitize_text_field(htmlentities($_POST['crt_rss_origin_content']));
			update_option('crt_rss_origin_content',$crt_rss_origin_content);
		}
		else
		{
			delete_option('crt_rss_origin_content');
		}

		if (isset($_POST['crt_enable_rssfeedcopyright']))
		{
			$crt_enable_rssfeedcopyright = sanitize_text_field(htmlentities($_POST['crt_enable_rssfeedcopyright']));
			update_option('crt_enable_rssfeedcopyright',$crt_enable_rssfeedcopyright);
		}
		else
		{
			delete_option('crt_enable_rssfeedcopyright');
		}

		$bpmoMessageString =  __( 'Your changes has been saved.', 'crt-copyright' );
		crt_copyright_submit_message($bpmoMessageString);
	}
	echo "<br />";
	?>

<div style='margin:10px 5px;'>
<div style='padding-top:5px; font-size:22px;'>Rss Feed Copyright Settings:</div>
</div>
<div style='clear:both'></div>		
		<div class="wrap">
			<div id="dashboard-widgets-wrap">
			    <div id="dashboard-widgets" class="metabox-holder">
					<div id="post-body">
						<div id="dashboard-widgets-main-content">
							<div class="postbox-container" style="width:90%;">
								<div class="postbox">
									<h3 class='hndle' style='padding: 20px; !important'>
									<span>
									<?php 
											echo  __( 'RSS Feed Copyright Panel:', 'crt-copyright' );
									?>
									</span>
									</h3>
								
									<div class="inside" style='padding-left:10px;'>
										<form id="bpmoform" name="bpmoform" action="" method="POST">
										<table id="bpmotable" width="100%">
										
										<tr style="margin-top:30px;">
										<td width="30%" style="padding: 20px;" valign="top">
										<?php 
											echo  __( 'Enable RSS Copyright:', 'crt-copyright' );
										?>
										</td>
										<td width="70%" style="padding: 20px;">
										<?php 
										$crt_enable_rssfeedcopyright = get_option('crt_enable_rssfeedcopyright'); 
										if (!(empty($crt_enable_rssfeedcopyright)))
										{
											
										}
										else
										{
											$crt_enable_rssfeedcopyright = '';
										}
										?>
										<?php 
										if (!(empty($crt_enable_rssfeedcopyright)))
										{
											echo '<input type="checkbox" id="crt_enable_rssfeedcopyright" name="crt_enable_rssfeedcopyright"  style="" value="yes"  checked="checked"> Enable RSS Copyright ';
										}
										else 
										{
											echo '<input type="checkbox" id="crt_enable_rssfeedcopyright" name="crt_enable_rssfeedcopyright"  style="" value="yes" > Enable RSS Copyright ';
										}
										?>
										</td>
										</tr>
										<tr>
										<td width="30%" style="padding: 30px 20px 20px 20px; " valign="top">
										<?php 
											echo  __( 'Content of Copyright Display in RSS Feed:', 'crt-copyright' );
										?>
										</td>
										<td width="70%" style="padding: 20px;">
										<?php 
										$crt_rss_origin_content =  crt_get_crt_copyright_rss_feed();
										$crt_rss_origin_content = html_entity_decode(stripcslashes($crt_rss_origin_content));
										echo '<div>';
										wp_editor($crt_rss_origin_content, 'crt_rss_origin_content');
										echo '</div>';
										?>
										</td>
										</tr>

																				
										</table>
										<br />
										<?php
											wp_nonce_field('crt_rss_origin_nonce');
										?>
										<input type="submit" id="crt_rss_origin_submit" name="crt_rss_origin_submit" value=" Submit " style="margin:1px 20px;">
										</form>
										
										<br />
									</div>
								</div>
							</div>
						</div>
					</div>
		    	</div>
			</div>
		</div>
		<div style="clear:both"></div>
		<br />
		<?php
	
	
}

function crt_feed_add_copyright($content) {
	if(!(is_feed()))
	{
		return $content;
	}
	$crt_enable_rssfeedcopyright = get_option ( 'crt_enable_rssfeedcopyright' );

	if (strtolower ( $crt_enable_rssfeedcopyright ) == 'yes') 
	{
		$crt_rss_origin_content = get_option ( 'crt_rss_origin_content' );
		$crt_rss_origin_content = html_entity_decode(stripcslashes($crt_rss_origin_content));
		
		$content = $content.$crt_rss_origin_content;
		
		return $content;
	} else {
		return $content;
	}
}


add_filter ( 'the_excerpt_css', 'crt_feed_add_copyright', 100 );
add_filter ( 'the_content', 'crt_feed_add_copyright', 100 );

function crt_show_copyright_in_post($content)
{
	$crt_enable_post_copyright = get_option('crt_enable_post_copyright');
	if (empty($crt_enable_post_copyright))
	{
		return $content;
	}
	
	$crt_post_copyright_origin_content = get_option('crt_post_copyright_origin_content');
	
	$crt_post_copyright_origin_content = get_option('crt_post_copyright_origin_content');
	if (empty($crt_post_copyright_origin_content))
	{
		$original_name = get_bloginfo('name');
		$original_url = get_bloginfo('url');
	
		$crt_post_copyright_origin_content = "<div class='crt_copyright_wp_footer' style='text-align:center'>original link:<a href='$original_url' target='_blank'>$original_name</a></div>";
		
	}
	$crt_post_copyright_origin_content = html_entity_decode(stripcslashes($crt_post_copyright_origin_content));
	return $content.$crt_post_copyright_origin_content;
}

add_filter('the_content', crt_show_copyright_in_post);

function crt_copyright_credits()
{
	$crt_copyright_credits = get_option('crt_copyright_credits');
	
	return $crt_copyright_credits;
}


function crt_copyright_wp_footer()
{
	$crt_enable_site_copyright =  get_option('crt_enable_site_copyright');
	if ($crt_enable_site_copyright !== 'yes')
	{
		return '';
	}
	
	$crt_copyright_wp_footer = crt_site_copyright_origin_content();
	echo $crt_copyright_wp_footer;
}

if (has_filter('footer_credits'))
{
	add_filter('footer_credits', 'crt_copyright_credits');
}
else 
{
	add_action('wp_footer', 'crt_copyright_wp_footer', 1);
}	

function crt_get_crt_copyright_rss_feed()
{
	$crt_rss_origin_content = get_option('crt_rss_origin_content');
	if (empty($crt_rss_origin_content))
	{
		$original_name = get_bloginfo('name');
		$original_url = get_bloginfo('url');

		$crt_rss_origin_content = "<div class='crt_copyright_wp_footer' style='text-align:center'>original link:<a href='$original_url' target='_blank'>$original_name</a></div>";
	}
	return $crt_rss_origin_content;
}

function crt_post_copyright_origin_content()
{
	$crt_post_copyright_origin_content = get_option('crt_post_copyright_origin_content');
	if (empty($crt_post_copyright_origin_content))
	{
		$original_name = get_bloginfo('name');
		$original_url = get_bloginfo('url');

		$crt_post_copyright_origin_content = "<div class='crt_copyright_in_post' style='text-align:center'>original link:<a href='$original_url' target='_blank'>$original_name</a></div>";
	}
	return $crt_post_copyright_origin_content;
}


function crt_site_copyright_origin_content()
{
	$crt_copyright_wp_footer = get_option('crt_site_copyright_origin_content');
	$crt_copyright_wp_footer = html_entity_decode(stripcslashes($crt_copyright_wp_footer));
	
	if (empty($crt_copyright_wp_footer))
	{
		$original_name = get_bloginfo('name');
		$original_url = get_bloginfo('url');
		
		$crt_copyright_wp_footer = "<div class='crt_copyright_wp_footer' style='text-align:center'>original link:<a href='$original_url' target='_blank'>$original_name</a></div>";
	}
	return $crt_copyright_wp_footer;
}

function crt_get_crt_copyright_credits()
{
	$crt_enable_site_copyright =  get_option('crt_enable_site_copyright');
	if ($crt_enable_site_copyright !== 'yes')
	{
		return '';
	}
	
	$crt_get_crt_copyright_credits = get_option('crt_site_copyright_origin_content');
	$crt_get_crt_copyright_credits = html_entity_decode(stripcslashes($crt_get_crt_copyright_credits));

	if (empty($crt_get_crt_copyright_credits))
	{
		$crt_get_crt_copyright_credits = '';

		$original_name = get_bloginfo('name');
		$original_url = get_bloginfo('url');
		
		$crt_get_crt_copyright_credits = "<div class='crt_copyright_wp_footer' style='text-align:center'>original link:<a href='$original_url' target='_blank'>$original_name</a></div>";
	}
	return $crt_get_crt_copyright_credits;
}


function crt_option_menu() {
	add_menu_page ( __ ( 'Copyright', 'crt-copyright' ), __ ( 'Copyright', 'crt-copyright' ), 'manage_options', 'crtpostcopyright', 'crt_post_copyright_origin_message_setting' );
	add_submenu_page ( 'crtpostcopyright', __ ( 'Post Copyright', 'crt-copyright' ), __ ( 'Post Copyright', 'crt-copyright' ), 'manage_options', 'crtpostcopyright', 'crt_post_copyright_origin_message_setting' );
	add_submenu_page ( 'crtpostcopyright', __ ( 'Site Copyright', 'crt-copyright' ), __ ( 'Site Copyright', 'crt-copyright' ), 'manage_options', 'crtsitecopyright', 'crt_site_origin_message_setting' );
	add_submenu_page ( 'crtpostcopyright', __ ( 'RSS Copyright', 'crt-copyright' ), __ ( 'RSS Copyright', 'crt-copyright' ), 'manage_options', 'crtrsscopyright', 'crt_rss_origin_message_setting' );
}


add_action('admin_menu', 'crt_option_menu');


function crt_copyright_submit_message($p_message) {
	echo "<div id='message' class='updated fade' style='line-height: 30px;margin-left: 0px;margin-top:10px; margin-bottom:10px;'>";

	echo $p_message;

	echo "</div>";
}


