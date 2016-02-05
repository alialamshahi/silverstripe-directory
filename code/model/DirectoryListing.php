<?php

class DirectoryListing extends DataObject {

	private static $db = array (
		'Title' => 'Varchar',
		'Description' => 'Text',
		'Manager' => 'Varchar(255)',
		'Address' => 'Text',
		'City' => 'Varchar',
		'Country' => 'Text',
		'Website' => 'Varchar(2000)',
		'Email' => 'Varchar(255)',
		'Phone' => 'Varchar(25)',
		'Date' => 'Date'
	);

	private static $has_one = array (
		'Category' => 'DirectoryCategory',
		'Photo' => 'Image'
	);

	private static $summary_fields = array (
		'GridThumbnail' => '',
		'Title' => 'Title',
		'Country' => 'Country',
		'Category.Title' => 'Category',
	);
	
	public function getGridThumbnail() {
		if($this->Photo()->exists()) {
			return $this->Photo()->SetWidth(100);
		}

		return '(no image)';
	}

	public function searchableFields() {
		return array (
			'Title' => array (
				'filter' => 'PartialMatchFilter',
				'title' => 'Title',
				'field' => 'TextField'
			),
			'CategoryID' => array (
				'filter' => 'ExactMatchFilter',
				'title' => 'Category',
				'field' => DropdownField::create('CategoryID')
							->setSource(
								DirectoryCategory::get()->map('ID','Title')
							)
							->setEmptyString('-- Any Category --')
			)
		);
	}


	public function getCMSFields() {
		$fields = FieldList::create(TabSet::create('Root'));
		$fields->addFieldsToTab('Root.Main', array(
			TextField::create('Title'),
			TextareaField::create('Description'),
			DropdownField::create('CategoryID','Category')
				->setSource(DirectoryCategory::get()->map('ID','Title'))
				->setEmptyString('-- Select a category --'),
			TextField::create('Manager'),
			TextareaField::create('Address'),
			TextField::create('City'),
			CountryDropdownField::create('Country'),
			TextField::create('Website'),
			TextField::create('Email'),
			TextField::create('Phone'),
			DateField::create('Date')
				->setConfig('showcalendar', true)
				->setConfig('dateformat', 'd MMMM yyyy')
		));
		$fields->addFieldToTab('Root.Photos', $upload = UploadField::create(
			'Photo',
			'Photo'
		));

		$upload->getValidator()->setAllowedExtensions(array(
			'png','jpeg','jpg','gif'
		));
		$upload->setFolderName('directory-photos');

		return $fields;
	}

}