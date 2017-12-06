<?php

namespace Components\Tasks\Controllers;

use \DateTime;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Components\Tasks\Models\Task;


class TaskController extends Controller
{
	public function create(Request $request)
	{
		$task = new Task();

		$task->content = $request->input("task_content");

		$task->save();

		return view("tasks.view_create_success", ["task" => $task]);
	}

	public function fetch(Request $request)
	{
		$task = Task::where('execution_started_at', NULL)
					->orderBy('created_at', 'desc')
					->first();

		if ($task !== null) {
			$task->execution_started_at = new DateTime();

			$task->save();
		}

		return $task;
	}

	public function finish(Request $request)
	{
		$task = Task::find($request->input('task_id'));

		if ($task->execution_finished_at === NULL) {
			$task->execution_finished_at = new DateTime();
			$task->execution_exit_status = $request->input('execution_exit_status');

			$task->save();
		} else {
			throw new Exception("Error: Task has already finished", 1);
		}
	}
}
