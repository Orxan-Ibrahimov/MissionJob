<x-manager-layout>
    <div class="card">
        <div class="card-body">
            <h1 class="card-title text-center">Rol Əlavə et</h1>
            <form method="post" action="/roles" class="forms-sample">
                @csrf
                <div class="form-group my-4">
                    <label for="role">Rol</label>
                    <input type="text" name="name" class="form-control my-2 w-auto" id="role" placeholder="Rolu daxil edin...">
                    @error('name')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary mr-2"> <i class="mdi mdi-content-save" style="font-size: 2rem;"></i> </button>
                <a href="/roles" class="btn rounded btn-light"> <i class="mdi mdi-keyboard-return" style="font-size: 2rem;"></i> </a>
                </div>
            </form>
        </div>
    </div>
</x-manager-layout>