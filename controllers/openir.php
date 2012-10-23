
<?php
/*

 */

class OpenIR_Controller extends Controller {

     
    public function register_map_layers() {
        
 		$layers = Event::$data;

		//Reset ushahidi default layer object definitions
		//$layers = array();

		// //Read layer config values from [plugin config]
		$layer_list = Kohana::config('openir.layers');       
		//echo "\n\n<!-- ${layer_list}--!>\n\n";
		//               
		//               //biuld dummy layer objects 
		//               // The importance of this is to make sure that all your alyers will be added to 
		//               // map.addlayers([------->layers added here-------])
		//               
		foreach ($layer_list as $key =>$layer) {  
		  	//echo "<!-- $key --!>";
			$layers[$key] = layers::get_layer_object($key);
		}
		//register layer as optional layer
		$layers['osm'] = layers::get_layer_object('osm');
		//$layers['gsat'] = layers::get_layer_object('gsat');
		//$layer['oam']= layers::get_layer_object('oam');
	
		
		
		Event::$data = $layers;
	}

    public function modify_layer_code() {
		$js = Event::$data;
		// 
 		//TODO: Move this configuration to database 
		$layer_list = Kohana::config('openir.layers');
	       
		//$wms_server = Kohana::config('openir.service_url');
        
		//$js = "var base_url = \"{$wms_server}\";\n\n";
  		 					//    		 			
		//Attach extra code to manipulate map to proper projection
		// TODO: Bounds can be read from database.. 
		$js="";
		$js.= "
		//var bounds = new OpenLayers.Bounds(-20037508, -20037508, 20037508, 20037508.34);\n		  		  
		var bounds = new OpenLayers.Bounds(-180, -85, 180, 85); \n
		//This doesn't affect the map anymore... \n
	 	//map.maxExtent = bounds;


		\n\n ";

		$js .= "
		//Keep it to the current projection.. retire this line.\n
		//map.projection = new OpenLayers.Projection(\"EPSG:4326\");

		\n\n";
  		 					//     		 			       
  		 					//     		 			       
        //Add layers as per above configuration.
        foreach ($layer_list as $key =>$layer) {
			
            if ($layer['base']) {
				echo "\n\n<!-- ---:(\--- --!>\n\n";
                $js.= layers::get_layer($key, $layer['name'], $layer['title'], "true");
				echo "\n\n<!-- ---:/)--- --!>\n\n";
            } else {
				echo "\n\n<!-- ---:(\--- --!>\n\n";
                $js.= layers::get_layer($key, $layer['name'], $layer['title']);
				echo "\n\n<!-- ---:/)--- --!>\n\n";
            }
        }
       
        /*
         * Add other layers here...
         * $js .=""; but must register layer var in register_map_layers
         */
		$js .="  var osm = new OpenLayers.Layer.Google( 'Google Streets',
	    {
	      sphericalMercator: true,
	      isBaseLayer: true
	    }
		)\n\n";
       
       /*
		$js .="  var oam = new OpenLayers.Layer.TMS( 
			\"OpenAerialMap\",
			\"http://tile.openaerialmap.org/tiles/\", 
			{
			isBaseLayer: false , 
			serviceVersion: '1.0.0', 
			layername: 'openaerialmap-900913', 
			type: 'png', 
			getURL: this.getURL , 
			attribution: '<a href=\"http://www.openstreetmap.org/\">OpenStreetMap</a>'} );\n\n";
		*/
		/*$js .="  var gsat = new OpenLayers.Layer.Google(\"Google Satellite\",
		
			{ 
			isBaseLayer: true , 
			serviceVersion: '.', 
			layername: '.', 
			type: 'google.maps.MapTypeId.SATELLITE', 
			displayOutsideMaxExtent: true} );\n\n";
		*/
		
        $js .="
                //map.zoomToMaxExtent();
              ";
 	    //send back the results			        
		Event::$data = $js;
      }

}

?>
