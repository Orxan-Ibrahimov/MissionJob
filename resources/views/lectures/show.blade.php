<x-manager-layout>
    <div class="col-12">
        <div class="card p-4 my-3">
            <div class="card-header d-flex flex-column align-items-center">
                <h1 class="text-center"> {{ $lecture -> name}} </h1>
            </div>
            <div class="card-body">
                <h3 class="card-text my-4">ID: <span class="mx-3 text-info">{{ $lecture -> id }}</span></h3>
                <h3 class="card-text my-4">Aid olduğu dərs: <span class="mx-3 text-info">{{ $lecture -> lesson -> name }}</span></h3>
            </div>

            <div class="card-footer d-flex justify-content-between">
                @can('edit', $lecture-> lesson -> group)
                <button type="submit" form="lecture_edit" class="btn btn-danger"><i class="mdi mdi-delete-variant" style="font-size: 2rem;"></i></button>
                @endcan
                <a href="/lessons/{{$lecture-> lesson -> id}}" class="btn rounded btn-light"> <i class="mdi mdi-keyboard-return" style="font-size: 2rem;"></i> </a>
            </div>

            <form id="lecture_edit" method="post" action="/lectures/{{$lecture -> id}}" hidden>
                @csrf
                @method("DELETE")
                <input type="hidden" name="id" value="{{ $lecture -> id }}" />
            </form>
        </div>
    </div>


</x-manager-layout>