<?php
// Custom News Archive
function template_parties($template) {
  global $wp_query;
  $post_type = get_query_var('post_type');
  if( $wp_query->is_search && $post_type == 'parties') {
    return locate_template('archive-parties');
  }
  return $template;
}
add_filter('template_include', 'template_parties');