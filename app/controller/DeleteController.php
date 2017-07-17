<?php
class DeleteController extends Controller
{
	function deleteRow($id){
		$this->model = new MainModel();
		$data = $this->model->deleteInfo();
		header('Location: test');
	}
}