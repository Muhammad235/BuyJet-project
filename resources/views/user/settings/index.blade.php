<x-app-layout>

    @section('title', 'Edit Profile')

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
                    <a href="{{ route('settings.change_password') }}">
                        <p class="text-white">Change Password</p>
                    </a>
                </div>
            </div>

            <form action="{{ route('settings.update') }}" method="post" enctype="multipart/form-data">
                @method('patch')
                @csrf
                <div class="profile-update">
                    <div class="profile-image">
                        <img id="profileImage" src="{{  asset(auth()->user()->avatar) ?? asset('upload/avatar/default-avatar.png') }}" class="bg-danger"  alt="profile image" width="150px">
                        <button type="button" class="pencil-icon btn btn-primary" data-bs-toggle="tooltip"
                            data-bs-placement="right" title="click to upload profile image">
                            <i class="fa fa-pencil"></i>
                        </button>
                        <input type="file" name='avatar' class="pencil-icon-input" hidden>
                    </div>
                    <div class="update-input">
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
                            <input type="date" name="dob" value="{{ $user->dob }}" class="form-control">
                        </div>

                        <div class="input-button">
                            {{-- <input type="submit" class="btn btn-secondary submit-button" value="Deactivate Profile"> --}}
                            <input type="submit" class="btn btn-primary submit-button" value="Update Profile">
                            <a href="{{ route('logout') }}" class="btn btn-danger text-white submit-button d-block d-md-none">Log out</a>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </section>

    <script>
        const pencilIcon = document.querySelector(".pencil-icon");
        const pencilIconInput = document.querySelector(".pencil-icon-input");
        const profileImage = document.getElementById("profileImage");

        pencilIcon.onclick = () => pencilIconInput.click();

        pencilIconInput.onchange = () => {
            const file = pencilIconInput.files[0];
            if (file && typeValidation(file.type)) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    profileImage.src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        };

        const typeValidation = (type) => {
            const validTypes = ['image/jpeg', 'image/png', 'image/gif'];
            return validTypes.includes(type);
        };
    </script>
    @endsection

</x-app-layout>
