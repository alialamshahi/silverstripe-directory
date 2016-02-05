<?php

class DirectoryAdmin extends ModelAdmin {

	private static $menu_title = 'Directory';

	private static $url_segment = 'directory';

	private static $managed_models = array (
		'DirectoryListing' => array('title' => 'Directory'),
        'DirectoryCategory' => array('title' => 'Categories')
	);

	private static $menu_icon = 'directory/images/directory.png';

};