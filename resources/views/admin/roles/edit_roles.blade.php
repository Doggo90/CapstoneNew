@extends('admin.admin_dashboard')
@section('admin')
<div class="d-inline p-2 bg-primary text-white">{{$user_id->name}}</div>

<form class="forms-sample" action="{{route('admin.roles.update',['id' => $user_id->id])}}" method="POST">
    @csrf
    <label for="role">Select Role:</label>
    <select name="role" id="role" class="form-select">
        {{-- @foreach($roles as $roleId => $roleName)
            <option value="{{ $roleId }}">{{ $roleName }}</option>
        @endforeach --}}

            <option value="admin">Admin</option>
            <option value="agent">Agent</option>
            <option value="user">User</option>
    </select>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection