@if(Auth::user() -> active_role == 'administrator')
<x-manager-layout>
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center m-2">
                <h2 class="card-title mb-0">Groups Table</h2>
                <a href="/groups/create" class="d-block btn btn-outline-success mx-5">Create</a>
            </div>

            <table class="table table-hover table-striped table-dark">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Head Teacher</th>
                        <th scope="col">Operations</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($groups as $group)
                    <tr>
                        <th scope="row">{{$group -> id}}</th>
                        <td>{{$group -> name}}</td>
                        <td>{{$group -> head_teacher -> first_name .' '.$group -> head_teacher -> last_name }}</td>
                        <td>
                            <a href="/groups/{{$group -> id}}" class="btn btn-outline-info m-2"><i class="mdi mdi-eye"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


</x-manager-layout>
@endif