<?php defined('SYSPATH') or die('No direct script access.');

/**
 * TimeTable Controller for handle AJAX requests
 *
 */

class Controller_TimeTable extends Controller_BaseAdmin {

	protected $modelName = "TimeTable";
	
	public function action_getTimeTablesFromNowInMonth()
	{
		$result = array();
		$DBResult = Model::factory($this->modelName)->getTimeTablesFromNowInMonth();
		$fieldNames = Model::factory($this->modelName)->getFieldNames();
		foreach ($DBResult as $data)
		{
			$item = array();
			foreach ($fieldNames as $fieldName) {
				$item[$fieldName] = $data->$fieldName;
			}
			array_push($result, $item);
		}
		if (sizeof($result) < 1)
		{
			$result[] = array('record_id', 'null');
		}
		$this->response->body(json_encode($result));
		
	}
	
	public function action_getTimeTablesForGroup()
	{
		return $this->getEntityRecordsBy("getTimeTablesForGroup");
	}
	
	public function action_getTimeTablesForSubject()
	{
		return $this->getEntityRecordsBy("getTimeTablesForSubject");
	}

}
