<?php
class OrderFacade {
    private $inventory;
    private $payment;
    private $shipping;

    public function __construct() {
        $this->inventory = new Inventory();
        $this->payment = new PaymentGateway();
        $this->shipping = new ShippingService();
    }

    public function placeOrder(string $productId, float $amount): void {
        if ($this->inventory->checkStock($productId)) {
            $this->payment->processPayment($amount);
            $this->shipping->scheduleDelivery($productId);
            echo "Order completed successfully!\n";
        }
    }
}