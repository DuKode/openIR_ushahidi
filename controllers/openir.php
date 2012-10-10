<?php
/*
 * Author: @kigen
 */

class OpenIR_Controller extends Controller {

     
    public function register_map_layers() {
        
          $layers = Event::$data;
               
               //Reset ushahidi default layer object definitions
              // $layers = array();
               
               // //Read layer config values from [plugin config]
                   $layer_list = Kohana::config('openir.layers');       
                  //echo $layer_list;
               //               
               //               //biuld dummy layer objects 
               //               // The importance of this is to make sure that all your alyers will be added to 
               //               // map.addlayers([------->layers added here-------])
               //               
                         foreach ($layer_list as $key =>$layer) {  
                         	      //	echo "$key=>$layer";
                             $layers[$key] = layers::get_layer_object($key);
                         }
                             
                     
               Event::$data = $layers;
    }

    public function modify_layer_code() {
 			       $js = Event::$data;
 			        
 			        //TODO: Move this configuration to database 
 		 			         $layer_list = Kohana::config('openir.layers');
 		 			       
 		 			        $wms_server = Kohana::config('openir.service_url');
 		 			         
 		 			        $js = "var base_url = \"{$wms_server}\";\n\n";
 		 			
 		 			        //Attach extra code to manipulate map to proper projection
 		 			        // TODO: Bounds can be read from database.. 
 		 			        
 		 			          $js.= "
 		 					  
 		 					  var bounds = new OpenLayers.Bounds(
 		 			33.909, -4.67,
 		 			41.897, 5.018
 		 			          );\n		  		  
 		 			          
 		 					  //This doesn't affect the map anymore... 
 		 					  //map.maxExtent = bounds;
 		 					  
 		 					  
 		 					  \n\n ";
 		 					  
 		 			         
 		 			
 		 			        $js .= "
 		 			//Keep it to the current projection.. retire this line.
 		 			//map.projection = new OpenLayers.Projection(\"EPSG:4326\");
 		 			           
 		 					   \n\n";
 		 			       
 		 			       
 		 			        //Add layers as per above configuration.
 		 			        foreach ($layer_list as $key =>$layer) {
 		 			
 		 			            if ($layer['base']) {
 		 			                $js.= layers::get_layer($key, $layer['name'], $layer['title'], "true");
 		 			            } else {
 		 			                $js.= layers::get_layer($key, $layer['name'], $layer['title']);
 		 			            }
 		 			        }
 		 			        
 		 			        /*
 		 			         * Add other layers here...
 		 			         * $js .=""; but must register layer var in register_map_layers
 		 			         */
 		 			        
 		 			        $js .="
 		 			                //map.zoomToMaxExtent();
 		 			              ";
 			        //send back the results
 			        Event::$data = $js;
      }

}

?>
