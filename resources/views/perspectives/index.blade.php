<x-manager-layout>
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between m-2">
                <h2 class="card-title mb-0">Təlim modulları</h2>
                @can('create', Auth::user())
                <a href="/perspectives/create" class="d-block btn btn-outline-success"><i class="mdi mdi-plus" style="font-size: 2rem;"></i></a>
                @endcan
            </div>
            <table class="table table-hover table-striped table-dark">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Adı</th>
                        <th scope="col">Yaradıldı</th>
                        <th scope="col">Əməliyyatlar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($perspectives as $perspective)
                    <tr>
                        <th scope="row">{{$perspective -> id}}</th>
                        <td>{{$perspective -> name}}</td>
                        <td>{{$perspective -> created_at}}</td>
                        <td>
                            <a href="/perspectives/{{$perspective -> id}}" class="btn btn-outline-info m-2"><i class="mdi mdi-eye" style="font-size: 2rem;"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-manager-layout>