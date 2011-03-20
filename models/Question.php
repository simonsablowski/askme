<?php

class Question extends Model {
	protected $fields = array(
		'id',
		'title',
		'status'
	);
	protected $requiredFields = array(
		'title'
	);
}