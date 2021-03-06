<?php

/*
 * Author: @kigen
 * Config file
 */


/*
 * Define all layers to be added to ushahidi maps
 * @title : Title of the map
 * @name: the name of the layer used in the viewer as layer description.
 * @base: True if it is a base layer
 */
 
$config['layers'] = array(
		'OPENIR_1' => array(
		'title' => "321",
		'name' => "True Color ",
		'base' => FALSE
		)     		
		       	,
		'OPENIR_2' => array(
		'title' => "432",
		'name' => "vegetation",
		'base' => FALSE
		)
		,
		'OPENIR_3' => array(
		'title' => "453",
		'name' => "soil",
		'base' => FALSE
		)
		,
		'OPENIR_4' => array(
		'title' => "543",
		'name' => "urban",
		'base' => FALSE
		)
		,   
		'OPENIR_5' => array(
		'title' => "754",
		'name' => "moisture",
		'base' => FALSE
		)
   // riskmap_autogen
		,   
		'OPENIR_6' => array(
		'title' => "riskmap_autogen",
		'name' => "riskmap",
		'base' => FALSE
		)
		// ,   
		// 'osm' => array(
		// 'title' => "riskmap_autogen",
		// 'name' => "osm",
		// 'base' => TRUE
		// )
);


//WMS server url:
//default: Opengeo's geoserver demo
$config['service_url'] ="http://dukodestudio.com/openIR_tileMaps_Wdc/";

?>
