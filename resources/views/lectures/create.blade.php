<x-manager-layout>
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Create A Lecture</h4>
            <form method="post" action="/lectures" class="forms-sample" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                <input type="hidden" name="lesson_id" value="{{$lesson_id}}" >

                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control my-2 w-auto" id="name" placeholder="Type group name...">
                    @error('name')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="material">Material</label>
                    <input type="file" name="material" class="form-control my-2 w-auto" id="material" />
                    @error('material')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                <a href="/groups" class="btn btn-dark">Go back</a>
            </form>
        </div>
    </div>
</x-manager-layout>