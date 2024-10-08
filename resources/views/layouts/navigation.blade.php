	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="{{ route('dashboard') }}" class="brand">
			<i class='bx bxs-sile'><img src="{{ asset('assets/images/favicon.png') }}" width="100" alt=""></i>
			<span class="text">Buyjet</span>
		</a>
		<ul class="side-menu top">
			<li class="active nav-link">
				<a href="{{ route('dashboard') }}">
					<i class='bx bxs-dashboard'></i>
					<span class="text">Overview</span>
				</a>
			</li>
			<li class="nav-link">
				<a href="{{ route('transactions.all') }}">
					<i class='bx bxs-wallet'></i>
					<span class="text">Transaction</span>
				</a>
			</li>
			<li class="nav-link">
				<a href="{{ route('settings.bank_info') }}">
					<i class='bx bxs-shopping-bag'></i>
					<span class="text">Payout Details</span>
				</a>
			</li>
			<li class="nav-link">
				<a href="{{ route('tickets.index') }}">
					<i class='bx bxs-message-dots'></i>
					<span class="text">Tickets</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu bottom-side-menu">
			<li class="nav-link">
				<a href="{{ route('settings.index') }}">
					<i class='bx bxs-cog'></i>
					<span class="text">Settings</span>
				</a>
			</li>
			<li class="nav-link">
				<a href="{{ route('logout') }}" class="logout">
					<i class='bx bxs-log-out-circle'></i>
					<span class="text">Logout</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->
