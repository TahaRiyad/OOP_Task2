<?php


class Account {
    private $id;
    private $name;
    private $balance = 0.0;

    public function __construct($id, $name) {
        $this->id = $id;
        $this->name = $name;
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getBalance() {
        return $this->balance;
    }

    public function credit($amount) {
        $this->balance += $amount;
        return $this->balance;
    }

    public function debit($amount) {
        if ($amount <= $this->balance) {
            $this->balance -= $amount;
        } else {
            echo "Insufficient balance.";
        }
        return $this->balance;
    }

    public function transferTo($anotherAccount, $amount) {
        if ($amount <= $this->balance) {
            $this->balance -= $amount;
            $anotherAccount->credit($amount);
        } else {
            echo "Insufficient balance for the transfer.";
        }
        return $this->balance;
    }
}


$account1 = new Account(1, "John Doe");
$account2 = new Account(2, "Jane Smith");

echo "Initial Balance for {$account1->getName()}: {$account1->getBalance()}" . "<br>";
echo "Initial Balance for {$account2->getName()}: {$account2->getBalance()}" . "<br>";

$account1->credit(1000);
$account2->credit(500);

echo "New Balance for {$account1->getName()}: {$account1->getBalance()}" . "<br>";
echo "New Balance for {$account2->getName()}: {$account2->getBalance()}" . "<br>";

$account1->debit(200);
$account2->debit(300);

echo "New Balance for {$account1->getName()}: {$account1->getBalance()}" . "<br>";
echo "New Balance for {$account2->getName()}: {$account2->getBalance()}" . "<br>";

$account1->transferTo($account2, 300);

echo "New Balance for {$account1->getName()}: {$account1->getBalance()}" . "<br>";
echo "New Balance for {$account2->getName()}: {$account2->getBalance()}" . "<br>";
