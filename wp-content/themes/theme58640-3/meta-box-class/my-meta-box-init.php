<?php
require_once("my-meta-box-class.php");

if (is_admin()){
  
  $prefix = 'tm_';

  $config = array(
    'id'             => 'meta_box',
    'title'          => 'Simple Meta Box fields',
    'pages'          => array('events'),
    'context'        => 'normal',
    'priority'       => 'high',
    'fields'         => array(),
    'local_images'   => false,
    'use_with_theme' => true
  );

  $my_meta =  new AT_Meta_Box($config);
  //date
  $my_meta->addDate($prefix.'date_field_id',array('name'=> __('Date', CURRENT_THEME), 'desc' => __('Choose date of event', CURRENT_THEME) ));

  
  $my_meta->Finish();

}
