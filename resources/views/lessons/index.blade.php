<x-manager-layout>
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center m-2">
                <h2 class="card-title mb-0">Lessons Table</h2>

            </div>

            <table class="table table-hover table-striped table-dark">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Group</th>
                        <th scope="col">Operations</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($lessons as $lesson)
                    <tr>
                        <th scope="row">{{$lesson -> id}}</th>
                        <td>{{$lesson -> name}}</td>
                        <td>{{$lesson -> group -> name}}</td>
                        <td>
                            <a href="/lessons/{{$lesson -> id}}" class="btn btn-outline-info m-2"><i class="mdi mdi-eye"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-manager-layout>