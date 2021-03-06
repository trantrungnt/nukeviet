<?php

/**
 * @Project NUKEVIET 3.x
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2012 VINADES.,JSC. All rights reserved
 * @Createdate 2-2-2010 12:55
 */

if( ! defined( 'NV_IS_FILE_THEMES' ) ) die( 'Stop!!!' );

$select_options = array();
$theme_array = nv_scandir( NV_ROOTDIR . '/themes', array( $global_config['check_theme'], $global_config['check_theme_mobile'] ) );
if( $global_config['idsite'] )
{
	$theme = $db->query( 'SELECT theme FROM ' . $db_config['dbsystem'] . '.' . $db_config['prefix'] . '_site_cat t1 INNER JOIN ' . $db_config['dbsystem'] . '.' . $db_config['prefix'] . '_site t2 ON t1.cid=t2.cid WHERE t2.idsite=' . $global_config['idsite'] )->fetchColumn();
	if( ! empty( $theme ) )
	{
		$array_site_cat_theme = explode( ',', $theme );
		$result = $db->query( 'SELECT DISTINCT theme FROM ' . NV_PREFIXLANG . '_modthemes WHERE func_id=0' );
		while( list( $theme ) = $result->fetch( 3 ) )
		{
			$array_site_cat_theme[] = $theme;
		}
		$theme_array = array_intersect( $theme_array, $array_site_cat_theme );
	}
}

if( ! defined( 'SHADOWBOX' ) )
{
	$my_head = "<link type=\"text/css\" rel=\"Stylesheet\" href=\"" . NV_BASE_SITEURL . "js/shadowbox/shadowbox.css\" />\n";
	$my_footer = "<script type=\"text/javascript\" src=\"" . NV_BASE_SITEURL . "js/shadowbox/shadowbox.js\"></script>\n";
	$my_footer .= "<script type=\"text/javascript\">Shadowbox.init();</script>";
	define( 'SHADOWBOX', true );
}

foreach( $theme_array as $themes_i )
{
	if( file_exists( NV_ROOTDIR . '/themes/' . $themes_i . '/config.ini' ) )
	{
		$select_options[NV_BASE_ADMINURL . 'index.php?' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=blocks&amp;selectthemes=' . $themes_i] = $themes_i;
	}
}

$selectthemes_old = $nv_Request->get_string( 'selectthemes', 'cookie', $global_config['site_theme'] );
$selectthemes = $nv_Request->get_string( 'selectthemes', 'get', $selectthemes_old );

if( ! in_array( $selectthemes, $theme_array ) )
{
	$selectthemes = $global_config['site_theme'];
}
if( $selectthemes_old != $selectthemes )
{
	$nv_Request->set_Cookie( 'selectthemes', $selectthemes, NV_LIVE_COOKIE_TIME );
}

if( file_exists( NV_ROOTDIR . '/themes/' . $selectthemes . '/config.ini' ) )
{
	$page_title = $lang_module['blocks'] . ':' . $selectthemes;

	$xtpl = new XTemplate( 'blocks.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file );
	$xtpl->assign( 'LANG', $lang_module );
	$xtpl->assign( 'GLANG', $lang_global );

	$xtpl->assign( 'MODULE_NAME', $module_name );

	$xtpl->assign( 'NV_BASE_SITEURL', NV_BASE_SITEURL );
	$xtpl->assign( 'NV_BASE_ADMINURL', NV_BASE_ADMINURL );
	$xtpl->assign( 'NV_NAME_VARIABLE', NV_NAME_VARIABLE );
	$xtpl->assign( 'NV_OP_VARIABLE', NV_OP_VARIABLE );

	$result = $db->query( 'SELECT title, custom_title FROM ' . NV_MODULES_TABLE . ' ORDER BY weight ASC' );
	while( list( $m_title, $m_custom_title ) = $result->fetch( 3 ) )
	{
		$xtpl->assign( 'MODULE', array( 'key' => $m_title, 'title' => $m_custom_title ) );
		$xtpl->parse( 'main.module' );
	}

	$a = 0;
	//load position file
	$xml = simplexml_load_file( NV_ROOTDIR . '/themes/' . $selectthemes . '/config.ini' );
	$content = $xml->xpath( 'positions' );
	$positions = $content[0]->position;

	$blocks_positions = array();
	$sth = $db->prepare( 'SELECT position, COUNT(*) FROM ' . NV_BLOCKS_TABLE . '_groups WHERE theme = :theme GROUP BY position' );
	$sth->bindParam( ':theme', $selectthemes, PDO::PARAM_STR );
	$sth->execute();
	while( list( $position, $numposition ) = $sth->fetch( 3 ) )
	{
		$blocks_positions[$position] = $numposition;
	}

	$sth = $db->prepare( 'SELECT * FROM ' . NV_BLOCKS_TABLE . '_groups WHERE theme = :theme ORDER BY position ASC, weight ASC' );
	$sth->bindParam( ':theme', $selectthemes, PDO::PARAM_STR );
	$sth->execute();
	while( $row = $sth->fetch() )
	{
		$xtpl->assign( 'ROW', array(
			'bid' => $row['bid'],
			'title' => $row['title'],
			'module' => $row['module'],
			'file_name' => $row['file_name'],
			'active' => $row['active'] ? $lang_global['yes'] : $lang_global['no']
		) );

		$numposition = $blocks_positions[$row['position']];

		for( $i = 1; $i <= $numposition; ++$i )
		{
			$xtpl->assign( 'WEIGHT', array( 'key' => $i, 'selected' => ( $row['weight'] == $i ) ? ' selected="selected"' : '' ) );
			$xtpl->parse( 'main.loop.weight' );
		}

		for( $i = 0, $count = sizeof( $positions ); $i < $count; ++$i )
		{
			$xtpl->assign( 'POSITION', array(
				'key' => ( string )$positions[$i]->tag,
				'selected' => ( $row['position'] == $positions[$i]->tag ) ? ' selected="selected"' : '',
				'title' => ( string )$positions[$i]->name
			) );
			$xtpl->parse( 'main.loop.position' );
		}

		if( $row['all_func'] == 1 )
		{
			$xtpl->parse( 'main.loop.all_func' );
		}
		else
		{
			$result_func = $db->query( 'SELECT a.func_id, a.in_module, a.func_custom_name FROM ' . NV_MODFUNCS_TABLE . ' a INNER JOIN ' . NV_BLOCKS_TABLE . '_weight b ON a.func_id=b.func_id WHERE b.bid=' . $row['bid'] );
			while( list( $funcid_inlist, $func_inmodule, $funcname_inlist ) = $result_func->fetch( 3 ) )
			{
				$xtpl->assign( 'FUNCID_INLIST', $funcid_inlist );
				$xtpl->assign( 'FUNC_INMODULE', $func_inmodule );
				$xtpl->assign( 'FUNCNAME_INLIST', $funcname_inlist );

				$xtpl->parse( 'main.loop.func_inmodule' );
			}
		}

		$xtpl->parse( 'main.loop' );
	}

	$xtpl->assign( 'BLOCKREDIRECT', nv_base64_encode( $client_info['selfurl'] ) );
	$xtpl->assign( 'CHECKSS', md5( $selectthemes . $global_config['sitekey'] . session_id() ) );

	$xtpl->parse( 'main' );
	$contents = $xtpl->text( 'main' );
}

include NV_ROOTDIR . '/includes/header.php';
echo nv_admin_theme( $contents );
include NV_ROOTDIR . '/includes/footer.php';

?>