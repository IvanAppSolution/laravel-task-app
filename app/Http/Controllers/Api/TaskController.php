<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaskCreateRequest;
use App\Http\Requests\TaskUpdateRequest;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use App\Services\TaskService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TaskController extends Controller
{
    public function __construct(protected TaskService $taskService)
    {
    }

    public function index(Request $request)
    {
        $user_id = $request->query('user_id', 0);
        $perPage = $request->query('per_page', 5);
        $title = $request->query('title');
        $status = $request->query('status');
        return $this->taskService->list($user_id, $perPage, $title, $status);
    }
    
    public function show(Request $request)
    {
        $task_id = $request->query('task_id');
        $user_id = $request->query('user_id');
        $task = $this->taskService->getById($task_id, $user_id);
        return new TaskResource($task);
    }

    public function store(TaskCreateRequest $request) 
    {
        $task = $this->taskService->store($request->validated());
        return new TaskResource($task);
    }

    public function update(TaskUpdateRequest $request, int $id) 
    { 
        $this->taskService->update($id, $request->validated());
        return response()->json(['message' => 'Sucessfully updated']);
    }

    public function destroy(Request $request, int $id)
    {
        $user_id = $request->input('user_id');
        $this->taskService->delete($id, $user_id);
        return response()->json(['message' => 'Sucessfully deleted']);
    }
}
