<?php
class PaymentService {
    public function processPayment(float $amount, array $cardDetails): bool {
        echo "Processing payment of \${$amount} using card ending with {$cardDetails['last4']}...\n";
        // payment processing logic goes here ...
        
        return true;
    }
}

class MailService {
    public function sendConfirmation(string $email, float $amount): bool {
        echo "Sending confirmation email to {$email} for \${$amount}...\n";
        // sending email logic goes here ...

        return true;
    }
}

class Checkout {
    private $paymentService;
    private $mailService;

    public function __construct() {
        $this->paymentService = new PaymentService();
        $this->mailService = new MailService();
    }

    public function completeOrder(string $email, array $cardDetails, float $amount): void {
        echo "Starting order process...\n";
        // Call payment service
        $paymentSuccess = $this->paymentService->processPayment($amount, $cardDetails);

        if ($paymentSuccess) {
            // Call mail service
            $this->mailService->sendConfirmation($email, $amount);
            echo "Order completed successfully.\n";
        } else {
            echo "Payment failed. Order not completed.\n";
        }
    }
}

function main(){
    $checkout = new Checkout();

    $userEmail = "customer@example.com";
    $cardDetails = ['last4' => '4242'];
    $amount = 49.99;

    $checkout->completeOrder($userEmail, $cardDetails, $amount);
}

main();

?>