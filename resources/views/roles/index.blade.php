@if(Auth::user() -> active_role == 'administrator')
<x-manager-layout>
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between m-2">
                <h2 class="card-title mb-0">Rollar</h2>
                <a href="/roles/create" class="d-block btn btn-outline-success"><i class="mdi mdi-plus" style="font-size: 2rem;"></i></a>
            </div>
            <table class="table table-hover table-striped table-dark">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Rol</th>
                        <th scope="col">Quard</th>
                        <th scope="col">Yaradıldı</th>
                        <th scope="col">Əməliyyatlar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($roles as $role)
                    <tr>
                        <th scope="row">{{$role -> id}}</th>
                        <td>{{$role -> name}}</td>
                        <td>{{$role -> guard_name}}</td>
                        <td>{{$role -> created_at}}</td>
                        <td>
                            @if($role -> name !== 'administrator')
                            <a href="/roles/{{$role -> id}}/edit" class="btn btn-outline-warning m-2"><i class="mdi mdi-table-edit"></i></a>
                            <button form="{{$role->name}}_delete" class="btn btn-outline-danger m-2"><i class="mdi mdi-delete-variant"></i></button>
                            <form id="{{$role -> name}}_delete" method="post" action="/roles/{{$role -> id}}" hidden>
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


</x-manager-layout>
@endif