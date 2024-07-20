<x-app-layout>

	@section('title', 'Payment successful')

	@section('content')
    <!-- CONTENT -->
	<section id="content">
		<!-- TOP NAVBAR -->
        <x-top-navbar :user="$user" />

        <main class="settings-body">
            <h5>Update Profile</h5>

            <div class="nav-bar">
                <div class="nav-bar-nav">
                    <a href="{{ route('settings.index') }}">
                        <p class="text-primary">Edit Profile</p>
                    </a>
                </div>
                <div class="nav-bar-nav-active">
                    <a href="{{ route('settings.bank_info') }}">
                        <p class="text-white">Bank Information</p>
                    </a>
                </div>
                <div class="nav-bar-nav">
                    <a href="">
                        <p class="text-white">Change Password</p>
                    </a>
                </div>
            </div>

            <div class="profile-update">
                <div class="update-input">
                    <form action="{{ route('settings.update') }}" method="post">
                        @method('patch')
						@csrf
                        <div class="update-input-email">
                            <label for="">Account Name</label>
                            <input type="text" name="account_name" value="{{ $user->account_name }}" class="form-control">
                        </div>
                        <div class="update-input-email">
                            <label for="">Bank Name</label>
                            <input type="text" name="bank_name" value="{{ $user->bank_name }}" class="form-control">
                        </div>
                        {{-- <div class="update-input-email">
                            <label for="exampleFormControlSelect1">Bank Name</label>
                            <select class="" id="exampleFormControlSelect1">
                                <option class="text-dark">Select Bank</option>
                                <option class="text-dark">Zenith Bank</option>
                                <option class="text-dark">Kuda Bank</option>
                                <option class="text-dark">Access Bnak</option>
                                <option class="text-dark">Wema Bank</option>
                                <option class="text-dark">Keystone Bank</option>
                            </select>
                        </div> --}}
                        <div class="update-input-email">
                            <label for="">Account Number</label>
                            <input type="text" name="account_number" value="{{ $user->account_number }}" class="form-control">
                        </div>

                        <div class="input-button">
                            <input type="submit" class="btn btn-secondary submit-button" value="Reset Information">
                            <input type="submit" class="btn btn-primary submit-button" value="Update Bank Infornation">
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </section>
@endsection

</x-app-layout>