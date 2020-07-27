## About API

We have next methods:

- GET /api/tasks - get list of all tasks;
- GET /api/tasks.done - get complete tasks;
- GET /api/tasks.undone - get tasks, that is in progress;
- POST /api/tasks - create new task. Fields: description(string, 255), done (boolean);
- PUT /api/tasks/{task-id} - update task. Fields: description(string, 255), done (boolean);
- DELETE /api/tasks/{task-id} - delete task.

Mark task as done operation we can do via update method.