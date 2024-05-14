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

        <div class="card p-4">
            <div class="card-header">
                <h1 class="text-center"> {{ $lesson -> name }}'s Lectures </h1>
            </div>

            <div class="card-body d-flex">
                <a href="/lectures/create?lesson={{$lesson -> id}}" class="btn btn-light mx-2">
            <img src="{{URL::asset('uploads/lecture/create.png')}}" width="75" height="75" alt="create" />
            </a>
                @if(count($lesson -> lectures))
                @foreach($lesson -> lectures as $lecture)
                <a download href="{{ $lecture -> material }}" class="btn btn-light rounded overflow-hidden mx-2">
                    <p class="mb-0">{{ $lecture -> name }}</p>
                    <img src="{{URL::asset('uploads/lecture/pdf.png')}}" width="75" height="75" alt="pdf" />
                </a>
                @endforeach
                @endif
            </div>

            <div class="card-footer">
                <a href="/groups/{{$lesson -> group -> id}}" class="btn rounded btn-dark p-3">Go Back</a>
            </div>
        </div>
    </div>
</x-manager-layout>