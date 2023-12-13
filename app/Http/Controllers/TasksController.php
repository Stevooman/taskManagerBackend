<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\TaskOrderRequest;
use App\Http\Requests\TaskPostRequest;
use App\Http\Requests\TaskPutRequest;
use App\Models\Task;
use Illuminate\Support\Facades\DB;

class TasksController extends Controller
{
    /**
    * Shows all task records.
    *
    * @return \Illuminate\Http\JsonResponse
    */
    public function index() {
        $data = DB::table('tasks')->select('id', 'name', 'priority')
            ->where('deleted_at', null)
            ->orderBy('priority')
            ->get();
        return response()->json($data);
    }



    /**
   * Adds a new task record to the database.
   *
   * @param TaskPostRequest $request An HTTP request object that contains
   * input validation rules.
   * @return \Illuminate\Http\JsonResponse
   */
    public function create(TaskPostRequest $request) {
        $id = Task::insertTaskInfo($request);
        return response()->json(['newId' => $id], 201);
    }


    /**
    * Updates a task record in the database.
    *
    * @param TaskPutRequest $request An HTTP request object that contains input validation rules.
    * @return \Illuminate\Http\JsonResponse
    */
    public function update(TaskPutRequest $request) {
        $updated = Task::updateTaskInfo($request);

        return response()->json(['updated' => $updated], 200);
    }



    public function updateOrder(TaskOrderRequest $request) {
        $updated = Task::updateOrder($request);

        return response()->json(['updated' => $updated], 200);
    }



  /**
  * Soft deletes a task record from the database.
  *
  * @param Request $request An HTTP request object.
  * @return \Illuminate\Http\JsonResponse
  */
  public function delete(Request $request) {
    $deleted = Task::deleteTaskInfo($request);

    return response()->json(['deleted' => $deleted], 200);
  }
}
