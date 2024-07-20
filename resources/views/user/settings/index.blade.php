<x-app-layout>

	@section('title', 'Payment successful')

	@section('content')
    <!-- CONTENT -->
	<section id="content">
		<!-- TOP NAVBAR -->
        <x-top-navbar :user="$user" />

        <div class="settings-body">
            <h5>Update Profile</h5>

            <div class="nav-bar">
                <div class="nav-bar-nav-active">
                    <a href="{{ route('settings.index') }}">
                        <p class="text-primary">Edit Profile</p>
                    </a>
                </div>
                <div class="nav-bar-nav">
                    <a href="{{ route('settings.bank_info') }}">
                        <p class="text-white">Bank Information</p>
                    </a>
                </div>
                <div class="nav-bar-nav">
                    <a href="changePassword.html">
                        <p class="text-white">Change Password</p>
                    </a>
                </div>
            </div>

            <div class="profile-update">
                <div class="profile-image">
                    <img src="{{ asset('assets/images/image.png') }}" alt="profile image" width="150px">
                    <button type="button" class="pencil-icon btn btn-primary" data-bs-toggle="tooltip"
                        data-bs-placement="right" title="click to upload profile image">
                        <i class="fa fa-pencil"></i>
                    </button>
                    <input type="file" class="pencil-icon-input" hidden>
                </div>
                <div class="update-input">
                    <form action="{{ route('settings.update') }}" method="post">
						@method('patch')

						@csrf
                        <div class="update-input-email">
                            <label for="">Email</label>
                            <input type="email" name="email" class="form-control" value="{{ $user->email }}">
                        </div>
                        <div class="update-input-email">
                            <label for="">Last Name</label>
                            <input type="text" name="firstname" class="form-control" value="{{ $user->firstname }}">
                        </div>
                        <div class="update-input-email">
                            <label for="">First Name</label>
                            <input type="text" name="lastname" class="form-control" value="{{ $user->lastname }}">
                        </div>
                        <div class="update-input-email">
                            <label for="">Phone Number</label>
                            <input type="tel" name="phone_number" class="form-control" value="{{ $user->phone_number }}">
                        </div>
                        <div class="update-input-email">
                            <label for="">Date of Birth</label>
                            <input type="date" value="{{ $user->dob }}" class="form-control">
                        </div>

                        <div class="input-button">
                            {{-- <input type="submit" class="btn btn-secondary submit-button" value="Deactivate Profile"> --}}
                            <input type="submit" class="btn btn-primary submit-button" value="Update Profile">
                            <a href="{{ route('logout') }}"><input type="submit"
                                    class="btn btn-danger submit-button d-block d-md-none" value="Log Out"></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

</x-app-layout>