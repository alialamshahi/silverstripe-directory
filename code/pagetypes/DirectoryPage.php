<?php

class DirectoryPage extends Page{

	private static $has_many = array(
		'Listings' => 'DirectoryListing'
	);

}

class DirectoryPage_Controller extends Page_Controller{
	
	public function PaginatedListing() { 
		$paginatedList = new PaginatedList(DirectoryListing::get(), $this->request );
		$paginatedList->setPageLength(3);
	return $paginatedList;
	}
	
	public function CategoryList() {
		return DirectoryCategory::get();
	}

}