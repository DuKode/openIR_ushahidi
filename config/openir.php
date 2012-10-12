<?php

/*
 * Author: @kigen
 * Config file
 */


/*
 * Define all layers to be added to ushahidi maps
 * @title : Title of the map
 * @name: if WMS Layer from geoserver :- It is the name of the layer 
 * @base: True if it is a base layer
 */
 
$config['layers'] = array(
    'OPENIR_1' => array(
            'title' => "openir_title_1",
            'name' => "openir_name_1",
            'base' => TRUE
        )     		
                     	,
  	 'OPENIR_2' => array(
	            'title' => "openir_title_2",
	            'name' => "openir_name_2",
	            'base' => FALSE
	        )
	,
 	    'OPENIR_3' => array(
	         'title' => "openir_title_3",
	         'name' => "openir_name_3",
	         'base' => FALSE
	        )
	
);


//WMS server url:
//default: Opengeo's geoserver demo
$config['service_url'] ="http://dukodestudio.com/openIR_tileMaps_Wdc/";

?>
