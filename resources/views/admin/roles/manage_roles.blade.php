@extends('admin.admin_dashboard')
@section('admin')
{{-- <div class="col-md-12 col-xl-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
                        <h6 class="card-title">Hoverable Table</h6>
                        <p class="text-muted mb-3">Add class <code>.table-hover</code></p>
                        <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Role</th>
                                            <th>Edit Role</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th>1</th>
                                            <td>Mark</td>
                                            <td>Otto@gmail.com</td>
                                            <td>09564863552</td>
                                            <td>User</td>
                                            <td><a href="#"><span class="badge bg-dark">Edit</span></a></td>

                                        </tr>
                                    </tbody>
                                </table>
                        </div>
      </div>
    </div>
</div> --}}

<form class="search-form" action="/admin/roles/manage">
    <div class="input-group">
        <div class="input-group-text">
            <i data-feather="search"></i>
        </div>
        <input type="text" class="form-control" name="search" id="search" placeholder="Search here...">
    </div>
</form>

<div class="col-md-12 col-xl-12 grid-margin stretch-card">
    <div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-baseline mb-2">
        <h6 class="card-title mb-0">Users</h6>
        </div>
        <div class="table-responsive">
        <table class="table table-hover mb-0">
            <thead>
            <tr>
                <th class="pt-0">Name</th>
                <th class="pt-0">Email</th>
                <th class="pt-0">Phone</th>
                <th class="pt-0">Role</th>
                <th class="pt-0">Assign</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->phone}}</td>
                    <td><span class="badge bg-success">{{$user->role}}</span></td>
                    <td><a href="{{ route('admin.roles.edit_roles', ['id' => $user->id]) }}">
                            <span class="badge bg-info">Edit</span>
                        </a>
                    </td>
                </tr>
                @endforeach
                
            </tbody>
            
        </table>
        
        </div>
    </div> 
    {{-- {{ $allUsers->links()}}
    {{ $users->links()}} --}}

    </div>
</div>



@endsection