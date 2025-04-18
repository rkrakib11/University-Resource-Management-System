<?php

interface NotificationService1 {
    public function send(string $to, string $subject, string $body);
}

class EmailNotificationService implements NotificationService1 {
    public function send(string $to, string $subject, string $body) {
        
        echo "<script>alert('Sending email via Gmail\\nTo: {$to}\\nSubject: {$subject}\\nBody: {$body}.'); </script>";
        
    }
}

class SendGridService {
    public function sendEmail(string $recipient, string $title, string $content) {
        echo "<script>alert('Sending email via SendGrid\\nTo: {$recipient}\\nTitle: {$title}\\nContent: {$content}.'); </script>";
        
    }
}

class SendGridAdapter implements NotificationService1 {
    private SendGridService $sendGridService;

    public function __construct(SendGridService $sendGridService) {
        $this->sendGridService = $sendGridService;
    }

    public function send(string $to, string $subject, string $body) {
        $this->sendGridService->sendEmail($to, $subject, $body);
    }
}


