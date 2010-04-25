<?php

/*
Plugin Name: Facebook Like Button plugin
Plugin URI: http://github.com/ayn/wp-facebook-like-button/
Description: a quick and dirty wordpress plugin to add FB Like button.
Version: v0.1
Author: Andrew Ng
Author URI: http://blog.andrewng.com

Copyright 2010  Andrew Ng

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as 
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

add_filter('the_content', 'add_iframe_source_to_post');    

function add_iframe_source_to_post($content = '') {
  global $wp_query;
  $permalink = get_permalink($wp_query->post->ID); //get post link
  $format = '<iframe src="http://www.facebook.com/plugins/like.php?href=%s&amp;layout=standard&amp;show_faces=true&amp;width=450&amp;action=like&amp;font=arial&amp;colorscheme=light" scrolling="no" frameborder="0" allowTransparency="true" style="border:none; overflow:hidden; width:450px; height:80px"></iframe>';
  
  return $content.sprintf($format, urlencode($permalink));
}
?>
