<?php

/* shortcode of this form: [events tags="Tag 1, Tag 2, Tag 3"] */
function sharan_events_shortcode( $atts ) {
  extract( shortcode_atts( array(
    'tags' => null,
  ), $atts ) );

  $tags = explode(',', $tags);
  $tags = array_map('trim', $tags);

  $tag_ids = array();
  foreach ($tags as $tag) :
    $term = get_term_by('name', $tag, 'event_tag');
    if ($term) :
      array_push($tag_ids, $term->term_id);
    endif;
  endforeach;

  ob_start();
  if ($tag_ids) :
    sharan_event_list(false, $tag_ids);
  endif;
  return ob_get_clean();
}
add_shortcode( 'events', 'sharan_events_shortcode' );


/* shortcode of this form: [button url="http://registartion-path/"]Register Now![/button] */
function sharan_button_shortcode( $atts, $content = null ) {
  extract( shortcode_atts( array(
    'url' => null,
  ), $atts ) );

  return '<a class="button" href="' . $url . '">' . $content . '</a>';
}
add_shortcode( 'button', 'sharan_button_shortcode' );