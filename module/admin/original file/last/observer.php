<?php
include_once('../../service/mysqlcon.php');

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

        
        
        $update_sql = "UPDATE faculty SET cancelbooknotification = '$message' WHERE id = '$this->name'";
        mysqli_query($link, $update_sql);

        $update_sql2 = "SELECT * FROM faculty WHERE id = '$this->name'";
        $result = mysqli_query($link, $update_sql2);
        $row = mysqli_fetch_assoc($result);
        $email = $row['email'];
        $phoneno = $row['phone'];

        $service = new NotificationService();
        $service->setNotificationStrategy(new EmailNotification($email));
        $service->notify();

    }
}





?>
