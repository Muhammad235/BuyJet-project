<x-mail::message>

# Thank you for your order 
<p class="center">We've received your order and here is a summary of your order</p>

<hr>

#### Hello, {{ $firstname }} your order has been received.

### Reference: #334Td4

### Transaction type: 
Sell crpyto

### Cryptocurrency:
{{ $cryptocurrency }} 

### Crypto amount
${{ $cryptoAmount }}

### Date of order:
5th July 2022

<hr>

<h1 style="padding: 5px; background-color: rgba(243, 243, 243, 0.856);">
    Total amount paid <b style="color: green">₦{{ number_format($amount, 2) }}</b>
</h1>

<x-mail::button :url="'/transactions'">
View Transaction
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
