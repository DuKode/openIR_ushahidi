

<?php

/*

 * 
 */

class layers {
    /*
     * Generate Map layer definition javascript code.   
     */

    public static function get_layer($var_name, $layer_name, $layer_title, $is_base_Layer="false") {

		// echo "<!-- $var_name--!>";
		        return $var_name .
			                // "= new OpenLayers.Layer.TMS( \"$layer_name\" , \"http://dukodestudio.com/openIR_tileMaps_Wdc/$layer_title/\", { type: 'png', displayOutsideMaxExtent: true, attribution: '<a href=http://www.openstreetmap.org/>OpenStreetMap</a>'} );
  "= new OpenLayers.Layer.TMS( \"$layer_name\" , \"http://dukodestudio.com/openIR_tileMaps_Wdc/$layer_title/\", { type: 'png', attribution: '<a href=http://www.openstreetmap.org/>OpenStreetMap</a>'} );
			                        \n\n
			                        ";
	//	return null;
    }

    /*
     * Generate a Layer object to mock ushahidi layers Objects 
     * in [applicatio/helpers/map] 
     * (only useful for layer name recognition)
     */

    public static function get_layer_object($layer_name) {
        $layer = new stdClass();
        $layer->active = TRUE;
        $layer->name = "{$layer_name}";
        $layer->openlayers = "TMS";
        $layer->title = "{$layer_name}";
        $layer->description = 'OPENIR Layer';
        $layer->api_url = '';
        $layer->data = array(
            'baselayer' => TRUE,
            'attribution' => 'dukodestudio',
            'url' => "http://dukodestudio.com/openIR_tileMaps_Wdc/",
            'type' => 'image/png',
		    //'serviceVersion'=> "1.0.0",
		    'layername'=> "{$layer_name}",
		    'isBaseLayer'=> true,
		    //'tileOrigin'=> '',
		    //'serverResolutions' => '',
		    'zoomOffset' => 0,
        );
		// $layer->layername = "{$layer_name}";
		// $layer->type = "image/png";
        // $layer->wms_params = array(
        //      'format' => 'image/png',
        //      'layers' => '',
        //      'tiled' => TRUE
        //  );
        
        return $layer;
    }

}

?>
