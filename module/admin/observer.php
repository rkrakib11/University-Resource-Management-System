<?php
include_once('main.php');

// Observer interface
interface Observer {
    public function update(string $message): void;
}

// Subject interface
interface Subject {
    public function attach(Observer $obs): void;
    public function detach(Observer $obs): void;
    public function notifyObservers(): void;
}

// Concrete Subject
class MessageBroadcaster implements Subject {
    private string $message;
    private array $observerList;

    public function __construct() {
        $this->observerList = [];
    }

    public function setMessage(string $message): void {
        $this->message = $message;
        $this->notifyObservers();
    }

    public function attach(Observer $obs): void {
        $this->observerList[] = $obs;
    }

    public function detach(Observer $obs): void {
        foreach ($this->observerList as $key => $observer) {
            if ($observer === $obs) {
                unset($this->observerList[$key]);
            }
        }
        $this->observerList = array_values($this->observerList);
    }

    public function notifyObservers(): void {
        foreach ($this->observerList as $obs) {
            $obs->update($this->message);
        }
    }
}

// Concrete Observer: Display Device
class Display implements Observer {
    private string $name;

    public function __construct(string $deviceName) {
        $this->name = $deviceName;
    }

    public function update(string $message): void {
        global $link;
        global $loged_user_id;


        $update_sql = "UPDATE faculty SET cancelbooknotification = '$message' WHERE id = '$this->name'";
        $update_sql = "INSERT INTO quicknotifications (facultyId, Notice) VALUES ('$this->name', '$message')";
        mysqli_query($link, $update_sql);

        
        $update_sql1 = "SELECT * FROM admin WHERE id = '$loged_user_id'";
        $result = mysqli_query($link, $update_sql1);
        $row3 = mysqli_fetch_assoc($result);
        $ntype = $row3['notificationtype'];
        

        $update_sql2 = "SELECT * FROM faculty WHERE id = '$this->name'";
        $result2 = mysqli_query($link, $update_sql2);
        $row1 = mysqli_fetch_assoc($result2);
        $email = $row1['email'];
        $phoneno = $row1['phone'];


        if(strpos(trim($ntype), "Email Notification") !== false){
        $service = new NotificationService();
        $service->setNotificationStrategy(new EmailNotification($email));
        $service->notify();

        }
        else{
            $service = new NotificationService();
            $service->setNotificationStrategy(new MobileNotification($phoneno));
            $service->notify();

        }

        

    }
}





?>
