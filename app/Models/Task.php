<?php

namespace App\Models;

use App\Http\Requests\TaskOrderRequest;
use App\Http\Requests\TaskPostRequest;
use App\Http\Requests\TaskPutRequest;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory, SoftDeletes;


    /**
   * The columns that are mass assignable within the table.
   *
   * @var array
   */
  protected $fillable = ['name', 'priority'];


  /**
   * Insert a new record into the tasks table.
   *
   * @param TaskPostRequest $request An HTTP request object that contains 
   * the input validation rules.
   * @return int Success or failure of record creation.
   */
  public static function insertTaskInfo(TaskPostRequest $request) {
    return Task::insertGetId($request->all());
  }



  /**
   * Update a record based on an ID passed in through the request object.
   *
   * @param TaskPutRequest $request An HTTP request object that contains 
   * the input validation rules.
   * @return int Success or failure of a record update.
   */
  public static function updateTaskInfo(TaskPutRequest $request) {
    $taskId = $request->taskId;

    $updated = Task::whereId($taskId)->update($request->all());

    return $updated;
  }


  /**
   * Update all the orders of task records.
   *
   * @param TaskOrderRequest $request An HTTP request object that contains 
   * the input validation rules.
   * @return int Success or failure of a record update.
   */
  public static function updateOrder(TaskOrderRequest $request) {
    $order = $request->idOrder;

    $counter = 1;
    $updated = 0;
    foreach ($order as $o) {
        $successfulUpdate = Task::whereId($o)->update(['priority' => $counter]);
        if ($successfulUpdate) {
            $updated = 1;
        }
        $counter++;
    }

    return $updated;
  }



  /**
   * Soft delete a record based on an ID passed in the request.
   *
   * @param Request $request an HTTP request object from the client.
   * @return int Success or failure of the soft deletion.
   */
  public static function deleteTaskInfo(Request $request) {
    $taskId = $request->taskId;

    $deleted = Task::whereId($taskId)->delete();
    
    return $deleted;
  }
}
