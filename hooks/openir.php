
<?php

/*

 */


class openir {

    public function __construct() {
        // Hook into routing
        Event::add('system.pre_controller', array($this, 'add'));
    }

    public function add() {  
		
        Event::add('ushahidi_filter.map_base_layers', array("OpenIR_Controller", 'register_map_layers'));
        Event::add('ushahidi_filter.map_layers_js', array("OpenIR_Controller", 'modify_layer_code'));
    }    

    
}

new openir;
?>
