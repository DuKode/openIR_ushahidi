

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
		return $var_name . // "= new OpenLayers.Layer.TMS( \"$layer_name\" , \"http://dukodestudio.com/openIR_tileMaps_Wdc/$layer_title/\", { type: 'png', displayOutsideMaxExtent: true, attribution: '<a href=http://www.openstreetmap.org/>OpenStreetMap</a>'} );
   "= new OpenLayers.Layer.TMS( \"$layer_name\" , \"http://openir.media.mit.edu/main/prototypes/jakarta-AutoGen/$layer_title/\", { getURL: this.getOSMURL , serviceVersion: '.', layername: '.', type: 'png', updateWhenIdle:'true', unloadInvisibleTiles: 'true' 
} );
  \n\n";
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
           	//'url' => 'this.getURL',
            'type' => 'image/png',
		    //'serviceVersion'=> "1.0.0",
		    //'layername'=> "{$layer_name}",
		    //'isBaseLayer'=> true,
		 	//'serverResolutions' => '',
		    //'zoomOffset' => 0,
        );
		// $layer->layername = "{$layer_name}";
		// $layer->type = "image/png";
         // $layer->wms_params = array(
         //               'format' => 'image/png',
         //               'layers' => '',
         //               'tiled' => true
         //            );
         	// $layer->tms_params = array(
       	// 					//'projection'=> 'EPSG:900913', 
       	//                      'format' => 'image/png',
       	//                      'layers' => '',
       	//                      'tiled' => true
       	//                   );
        return $layer;
    }

}

?>
