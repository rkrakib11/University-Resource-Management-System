<?php

interface NotificationService1 {
    public function send(string $to, string $subject, string $body);
}

class EmailNotificationService implements NotificationService1 {
    public function send(string $to, string $subject, string $body) {
        echo "Sending Email to $to\n";
        echo "Subject: $subject\n";
        echo "Body: $body\n";
    }
}

class SendGridService {
    public function sendEmail(string $recipient, string $title, string $content) {
        echo "Sending email via SendGrid to $recipient\n";
        echo "Title: $title\n";
        echo "Content: $content\n";
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


