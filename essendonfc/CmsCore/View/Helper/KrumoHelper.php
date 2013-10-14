<?php  

// App::import('Vendor', 'krumo/class.krumo');
include('../Vendor/krumo/class.krumo.php');

class KrumoHelper extends Helper { 
     
    // enable krumo in development mode 
    // disable krumo in production mode  
    // (changed 2008-06-06 as per A. Martini's 
    // comment, below, regarding v1.2 warnings) 
    function __construct() { 

        if(Configure::read('debug') != 0) { 
            krumo::enable(); 
        } else { 
            krumo::disable(); 
        }  

    } 
} 

