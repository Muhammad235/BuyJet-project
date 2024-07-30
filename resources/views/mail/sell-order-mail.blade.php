<x-mail::message>

# Thank you for your order
<p class="center">We've received your order and here is a summary of your order</p>

<hr>

#### Hello, {{ $firstname }} your order has been received.

### Reference: #{{ $reference }}

### Transaction type:
Sell crpyto

### Cryptocurrency:
{{ $cryptocurrency }}

### Amount to sell
${{ $cryptoAmount }} worth of {{ $cryptocurrency }}

### Date of order:
{{ $date_of_order->format('F d, Y') }}

<hr>

<h1 style="padding: 5px; background-color: rgba(243, 243, 243, 0.856);">
    Total amount to be paid <b style="color: green">₦{{ number_format($amount, 2) }}</b>
</h1>

<x-mail::button :url="'/transactions'">
View Transaction
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
