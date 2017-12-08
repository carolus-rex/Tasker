<table border=3>
	@foreach($tasks as $task)
		<tr>
			<td>{{ $task->created_at }}</td>
			<td>{{ $task->updated_at }}</td>
			<td>{{ $task->execution_started_at }}</td>
			<td>{{ $task->execution_finished_at }}</td>
			<td>{{ $task->execution_exit_status }}</td>
			<td>{{ $task->content }}</td>
		</tr>
	@endforeach
</table>