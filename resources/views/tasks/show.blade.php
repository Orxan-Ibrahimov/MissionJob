<x-manager-layout>

    <div class="col-12">

        <div class="card p-4 my-3">
            <div class="card-header d-flex flex-column align-items-center">
                <h1 class="text-center"> {{ $task -> title}} </h1>
            </div>
            <div class="card-body">
                <h3 class="card-text my-4">ID: <span class="mx-3 text-info">{{ $task -> id }}</span></h3>
                <h3 class="card-text my-4">Tapşırıq adı: <span class="mx-3 text-info">{{ $task -> title }}</span></h3>
                <h3 class="card-text my-4">Aid olduğu dərs: <span class="mx-3 text-info">{{ $task -> lesson -> name }}</span></h3>
                <h3 class="card-text my-4">Aid olduğu qrup: <span class="mx-3 text-info">{{ $task -> group -> name }}</span></h3>
                <h3 class="card-text my-4">Tapşırıq növü: <span class="mx-3 text-info">{{ $task -> task_type -> type }}</span></h3>
                <h3 class="card-text my-4">Son tarix: <span class="mx-3 text-info">{{ $task -> deadline }}</span></h3>
                <a href="/uploads/tasks/{{ $task -> request }}" target="_blank" class="btn btn-info rounded overflow-hidden mx-2">
                    <p class="mb-0">{{ $task -> title }}</p>
                    <img src="{{URL::asset('uploads/lecture/pdf.png')}}" width="200" height="200" alt="pdf" />
                </a>

                <div class="card-footer d-flex justify-content-between my-4">
                    @can('edit', $task-> lesson -> group)
                    <div>
                        <a type="submit" href="/tasks/{{$task -> id}}/edit" class="btn btn-warning"><i class="mdi mdi-table-edit" style="font-size: 2rem;"></i></a>
                        <button type="submit" form="task_delete" class="btn btn-danger"><i class="mdi mdi-delete-variant" style="font-size: 2rem;"></i></button>
                    </div>
                    @endcan
                    <a href="/lessons/{{$task-> lesson -> id}}" class="btn rounded btn-light"> <i class="mdi mdi-keyboard-return" style="font-size: 2rem;"></i> </a>
                </div>

                <form id="task_delete" method="post" action="/tasks/{{$task -> id}}" hidden>
                    @csrf
                    @method("DELETE")
                </form>
            </div>
        </div>


</x-manager-layout>