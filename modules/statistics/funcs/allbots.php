<?php

/**
 * @Project NUKEVIET 3.x
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2012 VINADES.,JSC. All rights reserved
 * @Createdate 16/6/2010, 10:23
 */

if( ! defined( 'NV_IS_MOD_STATISTICS' ) ) die( 'Stop!!!' );

$page_title = $lang_module['bot'];
$key_words = $module_info['keywords'];
$mod_title = $lang_module['bot'];

$result = $db->query( "SELECT COUNT(*), MAX(c_count) FROM " . NV_COUNTER_TABLE . " WHERE c_type='bot' AND c_count!=0" );
list( $all_page, $max ) = $result->fetch( 3 );

if( $all_page )
{
	$page = $nv_Request->get_int( 'page', 'get', 0 );
	$per_page = 50;
	$base_url = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $module_info['alias']['allbots'];

	$db->sqlreset()
		->select( 'c_val,c_count, last_update' )
		->from( NV_COUNTER_TABLE )
		->where( "c_type='bot' AND c_count!=0" )
		->order( 'c_count DESC' )
		->limit( $per_page )
		->offset( $page );

	$result = $db->query( $db->sql() );

	$bot_list = array();
	while( list( $bot, $count, $last_visit ) = $result->fetch( 3 ) )
	{
		$last_visit = ! empty( $last_visit ) ? nv_date( 'l, d F Y H:i', $last_visit ) : '';
		$bot_list[$bot] = array( $count, $last_visit );
	}

	if( ! empty( $bot_list ) )
	{
		$cts = array();
		$cts['thead'] = array( $lang_module['bot'], $lang_module['hits'], $lang_module['last_visit'] );
		$cts['rows'] = $bot_list;
		$cts['max'] = $max;
		$cts['generate_page'] = nv_generate_page( $base_url, $all_page, $per_page, $page );
	}
	if( $page > 1 )
	{
		$page_title .= ' ' . NV_TITLEBAR_DEFIS . ' ' . $lang_global['page'] . ' ' . $page;
	}
}

$contents = allbots();

include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme( $contents );
include NV_ROOTDIR . '/includes/footer.php';

?>