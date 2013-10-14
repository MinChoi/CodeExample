<?php

	echo $this->fetch('sidebarLeft'); // views can inject HTML here 

	
	//----- Display second level menu -----
	echo @$this->element('frontend/sidebar_page_submenu');	
	
	
?>