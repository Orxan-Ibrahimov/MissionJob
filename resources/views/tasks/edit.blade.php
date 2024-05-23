<x-manager-layout>
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Tapsırığı redaktə et: {{ $task-> title }}</h4>
            <form method="post" action="/tasks/{{$task->id}}" class="forms-sample" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <input type="hidden" name="lesson_id" value="{{$task -> lesson -> id}}">

                    <label for="title">Başlıq</label>
                    <input type="text" name="title" class="form-control my-2 w-auto" id="title" placeholder="Başlıq daxil edin...">
                    @error('title')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="deadline">Son tarix</label>
                    <input type="date" name="deadline" class="form-control my-2 w-auto" id="deadline" />
                    @error('deadline')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="request">Task</label>
                    <input type="file" name="request" class="form-control my-2 w-auto" id="request" />
                    @error('request')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="task_type">Task type</label>
                    <select name="task_type_id" id="task_type" class="form-control">
                        <option value="">Choose</option>
                        @foreach($task_types as $task_type)
                        <option value="{{ $task_type -> id }}">{{ $task_type -> type }}</option>
                        @endforeach
                    </select>
                    @error('task_type_id')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>

                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary mr-2"> <i class="mdi mdi-content-save" style="font-size: 2rem;"></i> </button>
                    <a href="/lessons/{{ $task->lesson->id }}" class="btn rounded btn-light"> <i class="mdi mdi-keyboard-return" style="font-size: 2rem;"></i> </a>
                </div>
            </form>
        </div>
    </div>
</x-manager-layout>