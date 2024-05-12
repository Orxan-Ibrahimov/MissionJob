<x-manager-layout>
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Edit The Profile: </h4>
            <form method="post" action="/users/{{$user -> id}}" enctype="multipart/form-data" class="forms-sample">
                @csrf
                @method('PATCH')

                <div class="form-group w-100 d-flex justify-content-center align-items-center my-5">
                    <label for="profile" class="d-flex flex-column">
                        <img src="{{ $user -> profile }}" class="rounded-circle" style="width: 300px; height: 300px;" alt="profile" />
                        <br>
                        <p class="btn btn-info text-center">Choose Image</p>
                    </label>
                    <input type="file" value="{{ $user -> profile }}" name="profile" class="form-control" id="profile" hidden>
                </div>

                <div class="row">

                    <div class="form-group col-4">
                        <label for="first_name">
                            <h1>First Name</h1>
                        </label>
                        <input type="text" name="first_name" value="{{ $user -> first_name }}" class="form-control" id="first_name" placeholder="Type first name...">
                        @error('first_name')
                        <p class="text-danger my-2">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="form-group col-4">
                        <label for="last_name">
                            <h1>Last Name</h1>
                        </label>
                        <input type="text" name="last_name" value="{{ $user -> last_name }}" class="form-control" id="last_name" placeholder="Type last name...">
                        @error('last_name')
                        <p class="text-danger my-2">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="form-group col-4">
                        <label for="email">
                            <h1>Email</h1>
                        </label>
                        <input type="email" name="email" value="{{ $user -> email }}" class="form-control" id="email" placeholder="Type email...">
                        @error('email')
                        <p class="text-danger my-2">{{$message}}</p>
                        @enderror
                    </div>

                </div>

                <div class="row">
                    <div class="form-group col-4">
                        <label for="phone">
                            <h1>Phone Number</h1>
                        </label>
                        <input type="text" name="phone" class="form-control w-auto" id="phone" placeholder="Type phone...">
                    </div>

                    <div class="form-group col-4">
                        <label for="gender">
                            <h1>Gender</h1>
                        </label>
                        <select name="gender" class="form-control bg-info text-white text-left rounded-pill" id="gender">
                            <option value="man" {{ ($user -> gender === 'man')?'selected':null }} class="bg-info text-white">Man</option>
                            <option value="woman" {{ ($user -> gender === 'woman')?'selected':null }} class="bg-info text-white">Woman</option>
                        </select>
                    </div>
                </div>



                <div class="form-group my-5">
                    <label for="about_you">
                        <h1>About You</h1>
                    </label>
                    <textarea id="tiny" name="about_you">{{ $user -> about_you }}</textarea>
                </div>


                <x-txt_editor.scripts />
                <!-- <x-txt_editor.form /> -->



                <button type="submit" class="btn btn-primary mr-2">Submit</button>
            </form>
        </div>
    </div>
</x-manager-layout>