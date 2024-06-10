    @props(['user'])

        <!-- NAVBAR -->
		<nav class="navbar">
			<p class="welcome-text">Welcome, <span>{{ $user->firstname }}</span></p>
			<div class="contain">
				<img src="{{ asset('assets/images/notify.png') }}" alt="">
				<div class="profile">
					<img src="{{ asset('assets/images/people.png') }}" width="30px">
					<p class="text-white pt-2"><small>{{ $user->firstname }} {{ $user->lastname }}</small></p>
				</div>
			</div>
			<div class="hamburger">
				<a href="{{ route('dashboard') }}">
					<div class="logo">
						<img src="{{ asset('assets/images/Logo.png') }}" alt="">
						<span class="text-white">Buyjet</span>
					</div>
				</a>
				<i class='bx bx-menu stripe text-white'></i>
			</div>
		</nav>