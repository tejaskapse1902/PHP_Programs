<?php
class BankAccount {
    private $accountNumber;
    private $balance;

    public function __construct($accountNumber, $balance = 0) {
        $this->accountNumber = $accountNumber;
        $this->balance = $balance;
    }

    public function deposit($amount) {
        if ($amount > 0) {
            $this->balance += $amount;
            echo "Deposited: $amount. New Balance: $this->balance\n";
        } else {
            echo "Deposit amount must be positive.\n";
        }
    } 

    public function withdraw($amount) {
        if ($amount > 0 && $amount <= $this->balance) {
            $this->balance -= $amount;
            echo "Withdrawn: $amount. New Balance: $this->balance\n";
        } elseif ($amount > $this->balance) {
            echo "Insufficient balance.\n";
        } else {
            echo "Withdrawal amount must be positive.\n";
        }
    }

    public function getBalance() {
        return $this->balance;
    }

    public function getAccountNumber() {
        return $this->accountNumber;
    }
}
$account = new BankAccount("123456789", 500);
$account->deposit(200);
$account->withdraw(100);
$account->withdraw(700);
?>
