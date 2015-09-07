<?php defined('SYSPATH') or die('No direct script access.');

/**
 * TimeTable Controller for handle AJAX requests
 *
 */

class Controller_TimeTable extends Controller_BaseAdmin {

	protected $modelName = "TimeTable";
	
	public function action_getTimeTablesForThreeMonth()
	{
		$result = array();
		$DBResult = Model::factory($this->modelName)->getTimeTablesForThreeMonth();
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
		$record_id = $this->request->param("id");
		$result = array();
		$DBResult = null;
		$DBResult = Model::factory($this->modelName)->getTimeTablesForGroup($record_id);
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
	
	public function action_getTimeTablesForSubject()
	{
		$record_id = $this->request->param("id");
		$result = array();
		$DBResult = Model::factory($this->modelName)->getTimeTablesForSubject($record_id);
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

}
