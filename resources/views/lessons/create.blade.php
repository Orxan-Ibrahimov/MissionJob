<x-manager-layout>
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Create A Lesson</h4>
            <form method="post" action="/lessons" class="forms-sample">
                @csrf
                <input type="hidden" name="group_id" value="{{$group_id}}">

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control my-2 w-auto" id="name" placeholder="Type lesson's name...">
                    @error('name')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>

                
                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                <a href="/lessons" class="btn btn-dark">Go back</a>
            </form>
        </div>
    </div>
</x-manager-layout>