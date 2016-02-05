<?php

class DirectoryCategory extends DataObject {

	private static $db = array (
		'Title' => 'Varchar',
		'Description' => 'HTMLText',
	);

	private static $has_many = array (
		'Directory' => 'DirectoryListing'
	);

	private static $summary_fields = array (
		'Title' => 'Category',
		'Description' => 'Short Description',
	);

	public function getCMSFields() {
		$fields = FieldList::create(
			TextField::create('Title'),
			HtmlEditorField::create('Description')
		);

		return $fields;
	}


}