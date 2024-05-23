<x-manager-layout>
    <div class="col-12">
        <div class="card p-4 my-3">
            <div class="card-header d-flex flex-column align-items-center">
                <h1 class="text-center"> {{ $lesson -> name}} </h1>
            </div>
            <div class="card-body">
                <h3 class="card-text my-4">ID: <span class="mx-3 text-info">{{ $lesson -> id }}</span></h3>
                <h3 class="card-text my-4">Aid Olduğu qrup: <span class="mx-3 text-info">{{ $lesson -> group -> name }}</span></h3>
            </div>

            <div class="card-footer d-flex justify-content-between">
                @can('edit', $lesson-> group)
                <a href="/lessons/{{ $lesson -> id }}/edit" class="btn btn-warning"> <i class="mdi mdi-table-edit" style="font-size: 2rem;"></i> </a>
                @endcan
                <a href="/groups/{{$lesson -> group -> id}}" class="btn rounded btn-light"> <i class="mdi mdi-keyboard-return" style="font-size: 2rem;"></i> </a>
            </div>
        </div>

        <div class="card p-4 my-4">
            <div class="card-header">
                <h1 class="card-title text-center"> {{ $lesson -> name }} dərsinin mühazirələri </h1>
            </div>

            <div class="card-body d-flex align-items-center">
                @can('edit', $lesson -> group)
                <a href="/lectures/create?lesson={{$lesson -> id}}" class="btn btn-info mx-2">
                    <img src="{{URL::asset('uploads/lecture/create.png')}}" width="200" height="200" alt="create" />
                </a>
                @endcan

                @if(count($lesson -> lectures) > 0)
                @foreach($lesson -> lectures as $lecture)
                <a href="/lectures/{{ $lecture -> id }}" class="btn btn-info rounded overflow-hidden mx-2">
                    <p class="mb-0">{{ $lecture -> name }}</p>
                    <img src="{{URL::asset('uploads/lecture/pdf.png')}}" width="200" height="200" alt="pdf" />
                </a>
                @endforeach
                @endif
            </div>
        </div>

        <div class="card p-4 my-4">
            <div class="card-header">
                <h1 class="card-title text-center"> {{ $lesson -> name }} dərsinə aid tapşırıqlar </h1>
            </div>

            <div class="card-body d-flex align-items-center">
                @can('edit', $lesson -> group)
                <a href="/tasks/create?lesson={{$lesson -> id}}" class="btn btn-info mx-2">
                    <img src="{{URL::asset('uploads/lecture/create.png')}}" width="200" height="200" alt="create" />
                </a>
                @endcan

                @if(count($lesson -> tasks) > 0)
                @foreach($lesson -> tasks as $task)
                <a href="/tasks/{{ $task -> id }}" class="btn btn-info rounded overflow-hidden mx-2">
                    <p class="mb-0">{{ $task -> title }}</p>
                    <img src="{{URL::asset('uploads/lecture/pdf.png')}}" width="200" height="200" alt="pdf" />
                </a>
                @endforeach
                @endif
            </div>
        </div>
    </div>
</x-manager-layout>