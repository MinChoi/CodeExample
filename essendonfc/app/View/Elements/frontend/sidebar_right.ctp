<?php
	if (isset($widgets)) {
		echo $this->Widget->display($widgets);
	}

	echo $this->fetch('sidebarRight'); // views can inject HTML here