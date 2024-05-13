<x-manager-layout>
    <div class="col-12">
        <div class="card p-4">
            <div class="card-header d-flex flex-column align-items-center">
                <h1 class="text-center"> {{ $group -> name}} </h1>
            </div>
            <div class="card-body">
                <h3 class="card-text my-4">ID: <span class="mx-3 text-info">{{ $group -> id }}</span></h3>
                <h3 class="card-text my-4">Head Teacher:
                    <div class="d-inline-block mx-2">
                        <img src="{{$group -> head_teacher -> profile}}" width="30" height="30" class="rounded-circle" alt="profile" />
                        <span class="text-success mx-1">{{ $group -> head_teacher -> first_name.' '.$group -> head_teacher -> last_name}}</span>
                    </div>
                </h3>
            </div>
            @can('edit', $group)
            <div class="card-header">
                <a href="/groups/{{ $group -> id }}/edit" class="btn btn-warning">Edit</a>
            </div>
            @endcan
        </div>
    </div>
</x-manager-layout>