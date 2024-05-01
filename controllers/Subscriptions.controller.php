<?php
include_once("conf.php");
include_once("models/Subscriptions.php");
include_once("views/Subscriptions.view.php");
include_once("views/CreateSubscriptions.view.php");

class SubscriptionsController {
  private $subscription;

  function __construct(){
    $this->subscription = new Subscription(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
  }

  public function index() {
    $this->subscription->open();
    $subscriptions = $this->subscription->getAllSubscriptions();
    $data = array();
    while($row = $subscriptions->fetch_assoc()){
      array_push($data, $row);
    }
    $this->subscription->close();

    $view = new SubscriptionView();
    $view->render($data);
  }

  function add($data){
    $data = [
        'member_id' => $_POST['member_id'],
        'subscription_type' => $_POST['subscription_type'],
        'start_date' => $_POST['start_date'],
        'end_date' => $_POST['end_date'],
        'status' => $_POST['status']
    ];

    $this->subscription->open();
    $this->subscription->addSubscription($data);
    $this->subscription->close();
    
    header("Location: subscriptions.php");
  }

  public function form($id = null) {
    $data = [
        'id' => '',
        'member_id' => '',
        'subscription_type' => '',
        'start_date' => '',
        'end_date' => '',
        'status' => ''
    ];

    if ($id) {
        $this->subscription->open();
        $data = $this->subscription->getSubscriptionById($id);
        if (!$data) {
            die("Subscription not found.");
        }
        $this->subscription->close();
    }

    $view = new CreateSubscriptionView();
    $view->render($data);
  }

  function edit($id, $data){
    $data = [
        'member_id' => $data['member_id'],
        'subscription_type' => $data['subscription_type'],
        'start_date' => $data['start_date'],
        'end_date' => $data['end_date'],
        'status' => $data['status']
    ];

    $this->subscription->open();
    $this->subscription->updateSubscription($id, $data);
    $this->subscription->close();
    
    header("Location: subscriptions.php");
  }

  function delete($id){
    $this->subscription->open();
    $this->subscription->deleteSubscription($id);
    $this->subscription->close();
    
    header("Location: subscriptions.php");
  }
}
?>
