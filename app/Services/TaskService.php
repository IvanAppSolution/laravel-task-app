<?php
namespace App\Services;

use App\Models\Task;
// use Illuminate\Support\Facades\Log;

class TaskService
{
    public function list(int $user_id, int $perPage = 10, ?string $title = null, ?string $status = null)
    {
        $query = Task::where('user_id', $user_id);

        if ($title) {
            $query->where('title', 'like', '%' . $title . '%');
        }

        if ($status) {
            $query->where('status', $status);
        }

        return $query->orderBy('created_at', 'desc')->paginate($perPage);
    }

    public function getById(int $id, int $user_id)
    {
        return Task::where('id', $id)->where('user_id', $user_id)->first();
    }

    public function store($data)
    {
        return Task::create($data);
    }

    public function update(int $id, array $data): void
    {
        
        $task = $this->getById($id, $data['user_id']);
        if (!$task) { return; }
        
        $task->update($data);
    }

    public function delete(int $id, int $user_id): void
    {
        $task = $this->getById($id, $user_id);
        if (!$task) { return; }

        $task->delete();
        
    }
 
}