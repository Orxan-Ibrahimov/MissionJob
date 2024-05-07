@if(Auth::user() -> active_role == 'administrator')
<x-manager-layout>
    <div class="card p-4">
        <h1 class="text-center"> {{ $user -> first_name. ' '. $user -> last_name }} </h1>
        <div class="card-body">
            <h3 class="card-text my-4">ID: <span class="mx-3 text-info">{{ $user -> id }}</span></h3>
            <h3 class="card-text my-4">Email: <span class="mx-3 text-warning">{{ $user -> email}}</span></h3>
            <h3 class="card-text my-4">Register ID: <span class="mx-3 p-2 rounded bg-primary text-warning">{{ $user -> register_id}}</span></h3>
            <h3 class="card-text my-4">Active Role: <span class="mx-3 text-primary">{{ $user -> active_role}}</span></h3>
            <h3 class="card-text my-4">Created At: <span class="mx-3 text-success">{{ $user -> created_at}}</span></h3>
            <h3 class="card-text my-4">Email Verified At: <span class="mx-3 p-2 rounded bg-danger text-warning">{{ $user -> email_verified_at}}</span></h3>
            <h3 class="card-text my-4">Updated At: <span class="mx-3 text-danger">{{ $user -> updated_at? $user -> updated_at : 'Not updated'}}</span></h3>
            <a href="/users" class="btn btn-light btn-primary py-2"> <i class="mdi mdi-keyboard-return"></i></a>
        </div>
    </div>
</x-manager-layout>
@endif