<div class="col-lg-6">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title mb-4">Latest User</h4>
            <div class="table-responsive">
                <table id="datatable" class="datatable table table-striped dt-responsive  w-100">
                    <thead>
                    <tr>
                        <td>#</td>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Account Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                    <tbody>
                        @if (count($users) > 0)
                            @foreach ($users->take(10) as $key => $user)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $user->firstname .' '. $user->lastname }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>
                                        @if ($user->status == 1)
                                            <span class="badge badge-soft-success font-size-11">Active</span>
                                        @else ()
                                            <span class="badge badge-soft-danger font-size-11">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        {{-- <a href="{{ route('admin.users.show', $user->id) }}" class="btn btn-primary btn-sm">View</a> --}}
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="7" class="text-center">No user found.</td>
                            </tr>
                        @endif
                    </tbody>

                </table>
            </div>
            <!-- end table-responsive -->
        </div>
    </div>
</div>
