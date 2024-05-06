<x-manager-layout>
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Edit The Role: {{ $role -> name }}</h4>
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
                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                <a href="/roles" class="btn btn-dark">Go back</a>
            </form>
        </div>
    </div>
</x-manager-layout>