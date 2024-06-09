	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="dashboard.html" class="brand">
			<i class='bx bxs-sile'><img src="{{ asset('assets/images/Logo.png') }}" alt=""></i>
			<span class="text">Buyjet</span>
		</a>
		<ul class="side-menu top">
			<li class="active nav-link">
				<a href="dashboard.html">
					<i class='bx bxs-dashboard'></i>
					<span class="text">Overview</span>
				</a>
			</li>
			<li class="nav-link">
				<a href="transaction.html">
					<i class='bx bxs-wallet'></i>
					<span class="text">Transaction</span>
				</a>
			</li>
			<li class="nav-link">
				<a href="bankInformation.html">
					<i class='bx bxs-shopping-bag'></i>
					<span class="text">Payout Details</span>
				</a>
			</li>
			<li class="nav-link">
				<a href="tickets.html">
					<i class='bx bxs-message-dots'></i>
					<span class="text">Tickets</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu bottom-side-menu">
			<li class="nav-link">
				<a href="settings.html">
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
