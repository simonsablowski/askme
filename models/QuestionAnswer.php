<?php

class QuestionAnswer extends Model {
	protected $fields = array(
		'id',
		'QuestionId',
		'UserId',
		'value',
		'status'
	);
	protected $requiredFields = array(
		'QuestionId',
		'UserId',
		'value'
	);
}