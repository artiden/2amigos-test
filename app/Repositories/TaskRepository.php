<?php

namespace App\Repositories;

use App\Task;
use Illuminate\Database\Eloquent\Collection;

/**
 * Task repository. Uses for managing tasks.
 * 
 * @author Denys Reveha
 */
class TaskRepository
{
    const STATUS_DONE = 'done';
    const STATUS_UNDONE = 'undone';

    /**
     * Get tasks by status filter
     * 
     * @param string $status
     * @return Collection
     */
    public function getTasks(string $status = null)
    {
        switch ($status) {
            case self::STATUS_DONE:
                $statuses = [true];
                break;
            case self::STATUS_UNDONE:
                $statuses = [false];
                break;
            default:
                $statuses = [
                    true,
                    false,
                ];
                break;
        }

        return Task::whereIn('done', $statuses)
        ->get();
    }

    /**
     * Insert or update given task
     * 
     * @param array $values
     * @param Task $task
     * @return boolean
     */
    public function storeTask(array $values, ?Task $task = null)
    {
        if (is_null($task)) {
            $task = new Task();
        }

        foreach ($values as $key => $value) {
            $task->$key = $value;
        }

        return $task->save();
    }
}
