<x-app-layout>

	@section('title', 'Change passowrd')

	@section('content')
    <!-- CONTENT -->
	<section id="content">
		<!-- TOP NAVBAR -->
        <x-top-navbar :user="$user" />

        <div class="settings-body">
            <h5>Update Profile</h5>

            <div class="nav-bar">
                <div class="nav-bar-nav">
                    <a href="{{ route('settings.index') }}">
                        <p class="text-primary">Edit Profile</p>
                    </a>
                </div>
                <div class="nav-bar-nav">
                    <a href="{{ route('settings.bank_info') }}">
                        <p class="text-white">Bank Information</p>
                    </a>
                </div>
                <div class="nav-bar-nav-active">
                    <a href="{{ route('settings.change_password') }}">
                        <p class="text-white">Change Password</p>
                    </a>
                </div>
            </div>

            <div class="profile-update">
                <div class="update-input">
                    <form action="{{ route('password.update') }}" method="post">
                        @method('PUT')
                        @csrf
                        <div class="update-input-email">
                            <label for="">Old Password</label>
                            <input type="password" placeholder="Old password" name="current_password" class="form-control">
                        </div>
                        <div class="update-input-email">
                            <label for="">New Password</label>
                            <input type="password" placeholder="New password" name="password" value="{{ old('new_password') }}" class="form-control">
                        </div>
                        <div class="update-input-email">
                            <label for="">Confirm Password</label>
                            <input type="password" placeholder="Confirm password" name="password_confirmation"   class="form-control">
                        </div>

                        <div class="input-button">
                            <input type="submit" class="btn btn-primary submit-button" value="Update Password">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

</x-app-layout>
