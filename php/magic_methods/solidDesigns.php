<?php
class User
{
    private $name;
    private $email;

    public function __construct($name, $email)
    {
        $this->name = $name;
        $this->email = $email;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getEmail()
    {
        return $this->email;
    }
}

class UserRepository
{
    public function save(User $user)
    {
        // Code to save user to the database
        echo $user->getName() . "'s data save to database...<br>";
    }
}

class EmailNotifier
{
    public function sendEmail(User $user, $message)
    {
        // Code to send email to the user
        echo $user->getEmail() . " <br>";
    }
}

// Usage
$user = new User("John Doe", "john.doe@example.com");
$repository = new UserRepository();
$repository->save($user);

$notifier = new EmailNotifier();
$notifier->sendEmail($user, "Welcome to our website!");