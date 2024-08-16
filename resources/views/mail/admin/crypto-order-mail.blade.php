<x-mail::message>

# You have a new order from {{ $firstname }}
<p class="center">You've received a new order and here is a summary of the order</p>

<hr>

#### Hello, Admin a new order has been placed by Muhammad.

### Reference:
{{ $reference }}

### Transaction type:
{{ $type }} crpyto

### Cryptocurrency:
{{ $cryptocurrency }}

### Crypto amount
${{ $cryptoAmount }}

### Date of order:
{{ $date_of_order->format('F d, Y') }}

<hr>

@if ($type == 'sell')
<h1 style="padding: 5px; background-color: rgba(243, 243, 243, 0.856);">
Total amount to be paid <b style="color: green">₦{{ number_format($amount, 2) }}</b>
</h1>

<x-mail::button :url="url('admin/sell/{{ $reference }}')">
View Transaction
</x-mail::button>
@else
<h1 style="padding: 5px; background-color: rgba(243, 243, 243, 0.856);">
Total amount to be paid <b style="color: green">$ {{ $cryptoAmount }} worth of {{ $cryptocurrency }}</b>
</h1>

<x-mail::button :url="url('admin/buy/{{ $reference }}')">
View Transaction
</x-mail::button>
@endif



Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
