<x-manager-layout>
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Create A Group</h4>
            <form method="post" action="/groups" class="forms-sample">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control my-2 w-auto" id="name" placeholder="Type group name...">
                    @error('name')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                <a href="/groups" class="btn btn-dark">Go back</a>
            </form>
        </div>
    </div>
</x-manager-layout>