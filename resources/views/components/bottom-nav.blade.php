@props(['page'])

{{-- Bottom Nav --}}
<div class="d-block d-md-none bottom-mobile">
    <nav class="bottom-nav">
        <a href="{{ route('dashboard') }}" class="nav__link @if (@$page === 'dashboard') {{ 'nav__link--active' }}@endif ">
            <i class="bx bxs-home nav__icon"></i>
            <span class="nav__text">DashBoard</span>
        </a>
        <a href="{{ route('transactions.all') }}" class="nav__link @if (@$page === 'transactions') {{ 'nav__link--active' }}@endif">
            <i class="bx bxs-wallet nav__icon"></i>
            <span class="nav__text">Transaction</span>
        </a>
        <a href="{{ route('tickets.store') }}" class="nav__link @if (@$page === 'tickets') {{ 'nav__link--active' }}@endif">
            <i class="bx bxs-message-dots nav__icon"></i>
            <span class="nav__text">Tickets</span>
        </a>
        <a href="{{ route('settings.index') }}" class="nav__link @if (@$page === 'settings') {{ 'nav__link--active' }}@endif">
            <i class="bx bxs-cog nav__icon"></i>
            <span class="nav__text">Settings</span>
        </a>
    </nav>
</div>
