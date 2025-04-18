<?php

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
class Accepted implements Observer {
    private string $name;

    public function __construct(string $deviceName) {
        $this->name = $deviceName;
    }

    public function update(string $message): void {
        echo "Message on device {$this->name}: {$message}\n";
    }
}

class Rejected implements Observer {
    private string $name;

    public function __construct(string $deviceName) {
        $this->name = $deviceName;
    }

    public function update(string $message): void {
        echo "Message on device {$this->name}: {$message}\n";
    }
}



?>
