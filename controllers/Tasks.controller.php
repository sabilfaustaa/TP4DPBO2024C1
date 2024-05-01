<?php
include_once("conf.php");
include_once("models/Tasks.php");
include_once("views/Tasks.view.php");
include_once("views/CreateTasks.view.php");

class TasksController {
  private $task;

  function __construct(){
    $this->task = new Task(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
  }

  public function index() {
    $this->task->open();
    $tasks = $this->task->getAllTasks();
    $data = array();
    while($row = $tasks->fetch_assoc()){
      array_push($data, $row);
    }
    $this->task->close();

    $view = new TaskView();
    $view->render($data);
  }

  function add($data){
    $data = [
        'task_description' => $_POST['task_description'],
        'due_date' => $_POST['due_date'],
        'status' => $_POST['status'],
        'member_id' => $_POST['member_id']
    ];

    $this->task->open();
    $this->task->addTask($data);
    $this->task->close();
    
    header("Location: tasks.php");
  }

  public function form($id = null) {
    $data = [
        'id' => '',
        'task_description' => '',
        'due_date' => '',
        'status' => '',
        'member_id' => ''
    ];

    if ($id) {
        $this->task->open();
        $data = $this->task->getTaskById($id);
        if (!$data) {
            die("Task not found.");
        }
        $this->task->close();
    }

    $view = new CreateTaskView();
    $view->render($data);
  }

  function edit($id, $data){
    $data = [
        'task_description' => $data['task_description'],
        'due_date' => $data['due_date'],
        'status' => $data['status'],
        'member_id' => $data['member_id']
    ];

    $this->task->open();
    $this->task->updateTask($id, $data);
    $this->task->close();
    
    header("Location: tasks.php");
  }

  function delete($id){
    $this->task->open();
    $this->task->deleteTask($id);
    $this->task->close();
    
    header("Location: tasks.php");
  }
}
?>
