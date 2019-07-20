<?php
class Test_model extends Abstract_Table_Model
{
	public $table = 'tests';
	public $metadata = [
		'id' => ['type' => 'int'],
		'categoryIds' => ['type' => 'array'],
		'classes' => ['type' => 'array'],
		'createdId' => ['type' => 'int'],
		'creatorId' => ['type' => 'int'],
		'deleted' => ['type' => 'bool'],
		'global' => ['type' => 'bool'],
		'hasAudio' => ['type' => 'bool'],
		'hasImage' => ['type' => 'bool'],
		'level' => ['type' => 'int'],
		'lock' => ['type' => 'bool'],
		'make' => ['type' => 'int'],
		'modifiedId' => ['type' => 'int'],
		'ordering' => ['type' => 'int'],
		'questionType' => ['type' => 'int'],
		'software' => ['type' => 'int'],
		'status' => ['type' => 'bool'],
		'testId' => ['type' => 'array'],
		'topic_id' => ['type' => 'int'],
		'translated' => ['type' => 'bool'],
		'trial' => ['type' => 'bool'],
		'type_id' => ['type' => 'int'],
		'isSort' => ['type' => 'bool'],
		'isNew' => ['type' => 'bool'],
		'trytest' => ['type' => 'int'],
		'camp' => ['type' => 'int'],
	];
}
