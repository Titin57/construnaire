<?php
	
	$w_routes = array(
		['GET', '/', 'Default#home', 'default_home'],
		['GET|POST', '/addWorker/', 'Workers#addWorker', 'worker_addWorker'],
	);