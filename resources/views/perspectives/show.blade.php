<x-manager-layout>
    <div class="col-12">
        <div class="card p-4 my-4">
            <div class="card-header d-flex flex-column align-items-center">
                <h1 class="text-center"> {{ $perspective -> name}} </h1>
            </div>
            <div class="card-body">
                <h3 class="card-text my-4">ID: <span class="mx-3 text-info">{{ $perspective -> id }}</span></h3>
                <h3 class="card-text my-4">Yaradıcı
                    <div class="d-inline-block mx-2">
                        <img src="{{$perspective -> creator -> profile}}" width="30" height="30" class="rounded-circle" alt="profile" />
                        <span class="text-success mx-1">{{ $perspective -> creator -> first_name.' '.$perspective -> creator -> last_name}}</span>
                    </div>
                </h3>
            </div>
            <div class="card-footer d-flex justify-content-between">
                @can('edit', $perspective)
                <a href="/perspectives/{{ $perspective -> id }}/edit" class="btn btn-warning"><i class="mdi mdi-table-edit" style="font-size: 2rem;"></i></a>
                @endcan
                <a href="/perspectives" class="btn rounded btn-light"> <i class="mdi mdi-keyboard-return" style="font-size: 2rem;"></i> </a>
            </div>
        </div>

        <div class="card p-4 my-4">
            <div class="card-header">
                <h1 class="text-left"> Qruplar </h1>
            </div>
            <div class="card-body">
                @foreach($perspective -> groups as $group)
                <a href="/groups/{{$group -> id}}" class="btn btn-info p-4">{{ $group -> name}}</a>
                @endforeach
            </div>
            <div class="card-footer">
                @can('create', Auth::user())
                <a href="/groups/create?perspective={{  $perspective -> id }}" class="btn btn-success"> <i class="mdi mdi-folder-plus" style="font-size: 2rem;"></i></a>
                @endcan
            </div>
        </div>
    </div>
</x-manager-layout>