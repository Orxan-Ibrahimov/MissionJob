<x-manager-layout>
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center m-2">
                <h1 class="card-title text-center">Qruplar cədvəli</h1>
                @can('create',Auth::user())

                <a href="/groups/create" class="d-block btn btn-outline-success"><i class="mdi mdi-plus" style="font-size: 2rem;"></i></a>
                @endcan
            </div>

            <table class="table table-hover table-striped table-dark">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Qrupun adı</th>
                        <th scope="col">Yaradıcı</th>
                        <th scope="col">Əməliyyatlar</th>
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