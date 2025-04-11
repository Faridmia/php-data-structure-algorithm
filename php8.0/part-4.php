<?php 

final class SMSSender {
    public function send($number, $message) {
        echo "Sending SMS to $number: $message\n";
    }
}


// decorator pattern dea final class ar function ke customize ba modify kora jai
final class FilteredSMSSender{
    private SMSSender $smsSender;

    public function __construct( SMSSender $smsSender ) {
        $this->smsSender = $smsSender;
    }

    public function send( $number, $message ) {
        $badWords = ['stupid', 'idiot'];


        $message = str_ireplace( $badWords, ['s*****','i****'], $message );

        $this->smsSender->send( $number,$message );
    }
}

$obj_smsdender = new SMSSender();
$obj_filesender = new FilteredSMSSender($obj_smsdender);

$obj_filesender->send("01739692387","hi stupid how are you? he is idiot");

