<?php

// Write a PHP a class called "BankAccount" with properties like "accountNumber" and "balance". Implement methods to deposit and withdraw money from the account.

class BankAccount {

    private $accountNumber;
    private $balance;

    public function __construct( $accountNumber ) {
        $this->accountNumber = $accountNumber;
        $this->balance = 0;
    }

    public function getAccountNumber() {
        return $this->accountNumber;
    }

    public function getbalance() {
        return $this->balance;
    }

    public function deposit( $amount ) {
        $this->balance += $amount;

        echo "deposit $amount into account $this->accountNumber  new balance $this->balance .\n";
    }

    public function withdraw( $amount ) {
        
       

        if( $this->balance >= $amount ){
            $this->balance -= $amount;
            echo "withdraw $amount from account $this->accountNumber  new balance $this->balance .\n";
        } else {
            echo "withdraw this $amount<br/>";
            "Insufficient balance in account $this->accountNumber. Current balance: $this->balance</br>";

        }

       
    }
}


$accObje =  new BankAccount( "SB-1234" );

echo "acount number" .  $accObje->getAccountNumber();
echo "initilize balance" .  $accObje->getbalance();
$accObje->deposit('10000');
$accObje->withdraw('5000');

