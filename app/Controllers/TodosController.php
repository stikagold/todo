<?php
namespace App\Controllers;

use App\Core\SlimCore;
use App\Lib\Request\Request;
use App\Lib\Routes\Router;
use App\Lib\Response\Response;
use App\Models\Todo;

class TodosController extends Controller
{
    public function __construct(Request $request, SlimCore $app)
    {
        $this->viewName = "test";
        parent::__construct($request, $app);

    }

    protected function getFilterableColumn($index){
        switch ($index) {
            case 0: return "id";
            case 1: return "username";
            case 2: return "email";
            case 3: return "task";
            case 4: return "status";
            default: return null;
        }
    }

    public function list(string $order=null, $page=null)
    {
        $orderBy = $this->getFilterableColumn($this->request->get("order")[0]['column']);

        $tasks = Todo::query();
        if($orderBy){
            $tasks = $tasks->orderBy($orderBy, $this->request->get("order")[0]['dir']);
        }
        $tasksCount = clone $tasks;
        $tasksCount = $tasksCount->count();

        $tasks = $tasks->skip($this->request->get("start"))->limit($this->request->get("length"));

        $tasks = $tasks->get();
        $data = [];
        foreach ($tasks as $task) {
            $data[] = [
                "id" => $task->id,
                "username" => $task->username,
                "email" => $task->email,
                "task" => $task->task,
                "status" => $task->status,
                "is_modified" => $task->is_modified
            ];
        }
        return new Response([
            "recordsTotal" => $tasksCount,
            "recordsFiltered" => $tasksCount,
            "data" => $data
        ]);
    }

    public function test(){
        echo "Blin";
    }

    public function create(){
        Todo::create(
            $this->request->post()
        );

        return new Response([
            'status' => 1
        ]);
    }

    public function update(){
        Todo::where("id", $this->request->post("id"))->update([
           "task" => $this->request->post("task"),
           "is_modified" => 1
        ]);

        return new Response([
            "status" => 1
        ]);
    }

    public function delete()
    {

    }

    public function complete(){
        Todo::where('id', $this->request->post('id'))->update([
           'status' => 1
        ]);
        return new Response([
            'status' => 1
        ]);
    }

}
