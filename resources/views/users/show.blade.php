@if(Auth::user() -> active_role === 'administrator')
<x-manager-layout>
    <div class="{{ $user -> active_role != 'administrator'? 'col-8' :'col-12' }}">
        <div class="card p-4">
            <div class="card-header d-flex flex-column align-items-center">
                <img src="{{ $user -> profile }}" alt="profile" class="rounded-circle my-4" style="width: 150px; height:150px;" />
                <h1 class="text-center"> {{ $user -> first_name. ' '. $user -> last_name }} </h1>
            </div>
            <div class="card-body">
                <h3 class="card-text my-4">ID: <span class="mx-3 text-info">{{ $user -> id }}</span></h3>
                <h3 class="card-text my-4">Email: <span class="mx-3 text-warning">{{ $user -> email}}</span></h3>
                <h3 class="card-text my-4">Register ID: <span class="mx-3 p-2 rounded bg-primary text-warning">{{ $user -> register_id}}</span></h3>
                <h3 class="card-text my-4">Active Role: <span class="mx-3 text-primary">{{ $user -> active_role}}</span></h3>
                <h3 class="card-text my-4">Created At: <span class="mx-3 text-success">{{ $user -> created_at}}</span></h3>
                <h3 class="card-text my-4">Email Verified At: <span class="mx-3 p-2 rounded bg-danger text-warning">{{ $user -> email_verified_at}}</span></h3>
                <h3 class="card-text my-4">Updated At: <span class="mx-3 text-danger">{{ $user -> updated_at? $user -> updated_at : 'Not updated'}}</span></h3>
                <h3 class="card-text my-4">About You:</h3>
                <div>
                {!! html_entity_decode($user -> about_you) !!}
                
                
                </div>

                <div class="d-flex justify-content-between align-items-center">
                    @if($user -> id !== Auth::user() -> id && !empty($rest_roles))
                    <form method="post" action="/users/{{ $user -> id }}/addRole" class="d-flex align-items-center">
                        @csrf
                        <input type="hidden" name="user" value="{{$user -> id}}" />
                        <select name="role" class="form-control bg-info text-white text-left w-auto rounded-pill">
                            <option value="" class="bg-info text-white"> Choose </option>
                            @foreach($rest_roles as $role)
                            <option value="{{$role -> name}}" class="bg-info text-white"> {{ $role -> name }} </option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-outline-info py-2 mx-4"> Add Role</button>
                    </form>
                    @endif
                    <a href="/users" class="btn btn-light py-2 my-4"> <i class="mdi mdi-keyboard-return"></i></a>
                </div>
                @error('role')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
        </div>
    </div>

    @if($user -> active_role != 'administrator')
    <div class="col-4">
        <div class="card p-4">
            <h1 class="text-center"> {{ $user -> first_name}}'s Roles </h1>
            <div class="card-body">
                @foreach($user -> roles as $role)
                @if($role -> name === 'student' || Auth::user() -> id === $user -> id)
                <a class="btn btn-outline-info d-block disabled rounded-pill p-4 my-4">{{ $role -> name }}</a>
                @else
                <a href="/users/{{$user -> id}}/deleteRole/{{$role -> name}}" class="btn btn-outline-info d-block rounded-pill p-4 my-4">{{ $role -> name }}</a>
                @endif
                @endforeach
            </div>
        </div>
    </div>
    @endif

</x-manager-layout>

@endif