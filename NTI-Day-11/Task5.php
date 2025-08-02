<?php
trait Timestampable
{
    public function currentTimestamp()
    {
        echo "Current timestamp: " . date("Y-m-d H:i:s");
        echo "<br>";
    }
}

class Order
{
    use Timestampable;
    public $order;

    public function currentTimestamp()
    {
        echo "Order: " . $this->order . " - Order Time: "  . date("Y-m-d H:i:s");
        echo "<br>";
    }
}

class Invoice
{
    use Timestampable;
    public $invoice;

    public function currentTimestamp()
    {
        echo "Invoice: " . $this->invoice . " - Invoice Time: " . date("Y-m-d H:i:s");
        echo "<br>";
    }
}

echo "<hr>";
echo "Order Info :";
echo "<hr>";
$order = new Order();
$order->order = "123";
$order->currentTimestamp();

echo "<hr>";
echo "Invoice Info :";
echo "<hr>";
$invoice = new Invoice();
$invoice->invoice = "INV456";
$invoice->currentTimestamp();
