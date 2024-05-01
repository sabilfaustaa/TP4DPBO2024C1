<?php
include_once("conf.php");
include_once("models/Members.php");
include_once("views/Members.view.php");
include_once("views/CreateMembers.view.php");

class MembersController {
  private $member;

  function __construct(){
    $this->member = new Member(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
  }

  public function index() {
    $this->member->open();
    $members = $this->member->getAllMembers();
    $data = array();
    while($row = $members->fetch_assoc()){
      array_push($data, $row);
    }
    $this->member->close();

    $view = new MemberView();
    $view->render($data);
  }

  function add($data){
    $data = [
        'name' => $_POST['name'],
        'email' => $_POST['email'],
        'phone' => $_POST['phone'],
        'join_date' => date('d-m-Y')
    ];

    $this->member->open();
    $this->member->addMember($data);
    $this->member->close();
    
    header("Location: index.php");
  }

  public function form($id = null) {
    $data = [
        'id' => '',
        'name' => '',
        'email' => '',
        'phone' => ''
    ];

    if ($id) {
        $this->member->open();
        $data = $this->member->getMemberById($id);
        if (!$data) {
            die("Member not found.");
        }
        $this->member->close();
    }

    $view = new CreateMemberView();
    $view->render($data);
}


  function edit($id, $data){
    $data = [
        'name' => $data['name'],
        'email' => $data['email'],
        'phone' => $data['phone'],
    ];

    $this->member->open();
    $this->member->updateMember($id, $data);
    $this->member->close();
    
    header("Location: index.php");
  }

  function delete($id){
    $this->member->open();
    $this->member->deleteMember($id);
    $this->member->close();
    
    header("Location: index.php");
  }
}
?>
