<x-manager-layout>
    <div class="col-12">
        <div class="card p-4 my-4">
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
            <div class="card-footer">
                @can('edit', $group)
                <a href="/groups/{{ $group -> id }}/edit" class="btn btn-warning">Edit</a>
                @endcan
            </div>
        </div> 
        
        <div class="card p-4 my-4">
            <div class="card-header">
                <h1 class="text-left"> Lessons </h1>
            </div>
            <div class="card-body">
                @foreach($group -> lessons as $lesson)
                <a href="/lessons/{{$lesson -> id}}" class="btn btn-info p-4">{{ $lesson -> name}}</a>
                @endforeach
            </div>
            <div class="card-footer">
               
                @can('edit', $group)
                <a href="/lessons/create?group={{  $group -> id }}" class="btn btn-success">Create Lesson</a>
                @endcan
            </div>
        </div>
    </div>
</x-manager-layout>