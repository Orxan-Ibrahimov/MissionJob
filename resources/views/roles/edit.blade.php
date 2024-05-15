<x-manager-layout>
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Rolu redaktə et: {{ $role -> name }}</h4>
            <form method="post" action="/roles/{{$role -> id}}" class="forms-sample">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="role">Name</label>
                    <input type="text" name="name" class="form-control w-auto" id="role" placeholder="Type role...">
                    @error('name')
                    <p class="text-danger my-2">{{$message}}</p>
                    @enderror
                </div>
                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary mr-2"><i class="mdi mdi-content-save" style="font-size: 2rem;"></i></button>
                    <a href="/roles" class="btn rounded btn-light"> <i class="mdi mdi-keyboard-return" style="font-size: 2rem;"></i> </a>
                </div>
            </form>
        </div>
    </div>
</x-manager-layout>