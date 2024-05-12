@if(Auth::user() -> active_role === 'administrator')
<x-manager-layout>
    <div class="col-12">
        <div class="card p-4">
            <div class="card-header d-flex flex-column align-items-center">
                <h1 class="text-center"> {{ $group -> name}} </h1>
            </div>
            <div class="card-body">
                <h3 class="card-text my-4">ID: <span class="mx-3 text-info">{{ $group -> id }}</span></h3>
                <h3 class="card-text my-4">Head Teacher: <span class="mx-3 text-success">{{ $group -> head_teacher -> first_name.' '.$group -> head_teacher -> last_name}}</span></h3>
            </div>
        </div>
    </div>
</x-manager-layout>

@endif