@if(Auth::user() -> active_role == 'administrator')
<x-manager-layout>
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between m-2">
                <h2 class="card-title mb-0">Tapşırıq növü</h2>
                <a href="/tasktypes/create" class="d-block btn btn-outline-success"><i class="mdi mdi-plus" style="font-size: 2rem;"></i></a>
            </div>
            <table class="table table-hover table-striped table-dark">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tapşırıq növü</th>
                        <th scope="col">Maksimum Xal</th>
                        <th scope="col">Yaradıldı</th>
                        <th scope="col">Əməliyyatlar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tasktypes as $tasktype)
                    <tr>
                        <th scope="row">{{$tasktype -> id}}</th>
                        <td>{{$tasktype -> type}}</td>
                        <td>{{$tasktype -> max_point}}</td>
                        <td>{{$tasktype -> created_at}}</td>
                        <td>
                            <a href="/tasktypes/{{$tasktype -> id}}" class="btn btn-outline-info m-2"><i class="mdi mdi-eye" style="font-size: 2rem;"></i></a>
                            <a href="/tasktypes/{{$tasktype -> id}}/edit" class="btn btn-outline-warning m-2"><i class="mdi mdi-table-edit" style="font-size: 2rem;"></i></a>
                            <button form="{{$tasktype->id}}_delete" class="btn btn-outline-danger m-2"><i class="mdi mdi-delete-variant" style="font-size: 2rem;"></i></button>
                            <form id="{{$tasktype -> id}}_delete" method="post" action="/tasktypes/{{$tasktype -> id}}" hidden>
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


</x-manager-layout>
@endif