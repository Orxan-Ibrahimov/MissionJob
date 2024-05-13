<x-manager-layout>
    <div class="col-12">
        <div class="card p-4">
            <div class="card-header d-flex flex-column align-items-center">
                <h1 class="text-center"> {{ $lesson -> name}} </h1>
            </div>
            <div class="card-body">
                <h3 class="card-text my-4">ID: <span class="mx-3 text-info">{{ $lesson -> id }}</span></h3>
                <h3 class="card-text my-4">Group: <span class="mx-3 text-info">{{ $lesson -> group -> name }}</span></h3>
            </div>
           
            @can('edit', $lesson)
            <div class="card-header">
                <a href="/lessons/{{ $lesson -> id }}/edit" class="btn btn-warning">Edit</a>
            </div>
            @endcan
        </div>
    </div>
</x-manager-layout>