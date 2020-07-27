<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use App\Repositories\TaskRepository;
use App\Http\Requests\StoreTaskRequest;

class TaskController extends Controller
{
    /**
     * Repository for managing tasks
     * 
     * @var TaskRepository
     */
    private $repository;

    /**
     * Constructor
     * 
     * @param TaskRepository $repository
     */
    public function __construct(TaskRepository $repository)
    {
        $this->repository = $repository;

        $this->authorizeResource(Task::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($status = null)
    {
        return response($this->repository->getTasks($status));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreTaskRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTaskRequest $request)
    {
        $saved = $this->repository->storeTask(
            $request->only([
                'description',
                'done',
            ])
        );

        return response(
            $saved ? 'Ok' : 'Error',
            $saved ? 201 : 422
        );        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        return response($task);
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  StoreTaskRequest $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(StoreTaskRequest $request, Task $task)
    {
        $saved = $this->repository->storeTask(
            $request->only([
                'description',
                'done',
            ]),
            $task
        );

        return response(
            $saved ? 'Ok' : 'Error',
            $saved ? 200 : 422
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $deleted = $task->delete();
        return response(
            $deleted ? 'Ok' : 'Error',
            $deleted ? 200 : 422
        );
    }
}
