    @props(['user'])

        <!-- NAVBAR -->
		<nav class="navbar">
			<p class="welcome-text">Welcome, <span>{{ $user->firstname }}</span></p>
			<div class="contain">
				{{-- <img src="{{ asset('assets/images/notify.png') }}" alt=""> --}}
				<div class="profile">
					<img src="{{  asset(auth()->user()->avatar) ?? asset('upload/avatar/default-avatar.png') }}" width="30px">
					<p class="text-white pt-2"><small>{{ $user->firstname }} {{ $user->lastname }}</small></p>
				</div>
			</div>
		</nav>
