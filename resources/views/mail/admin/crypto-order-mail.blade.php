<x-mail::message>

# You have a new order from Muhammad
<p class="center">You've received a new order and here is a summary of the order</p>

<hr>

#### Hello, Admin a new order has been placed by Muhammad.

### Reference: # $reference

### Transaction type:
Buy crpyto

### Cryptocurrency:
{{-- {{ $cryptocurrency }} --}}
BITCOIN

### Crypto amount
{{-- ${{ $cryptoAmount }} --}}
$10

### Date of order:
{{-- {{ $date_of_order->format('F d, Y') }} --}}

<hr>

<h1 style="padding: 5px; background-color: rgba(243, 243, 243, 0.856);">
    {{-- Total amount paid <b style="color: green">₦{{ number_format($amount, 2) }}</b> --}}
</h1>

<x-mail::button :url="url('admin/transactions')">
View Transaction
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
