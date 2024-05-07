@if(Auth::user() -> active_role == 'administrator')
<x-manager-layout>
    <div class="card">
        <div class="card-body">
            <h2 class="card-title mb-0">Users Table</h2>
            <table class="table table-hover table-striped table-dark">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Surname</th>
                        <th scope="col">Active Role</th>
                        <th scope="col">Register ID</th>
                        <th scope="col">Operations</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <th scope="row">{{$user -> id}}</th>
                        <td>{{$user -> first_name}}</td>
                        <td>{{$user -> last_name}}</td>
                        <td>{{$user -> active_role}}</td>
                        <td>{{$user -> register_id}}</td>
                        <td>
                        <a href="/users/{{$user -> id}}" class="btn btn-outline-info m-2"><i class="mdi mdi-eye"></i></a>  

                            @if(!($user -> id === Auth::user() -> id) )
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


</x-manager-layout>
@endif