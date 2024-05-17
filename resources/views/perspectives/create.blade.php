<x-manager-layout>
    <div class="card">
        <div class="card-body">
            <h1 class="card-title text-center">Təlim modulu əlavə et</h1>
            <form method="post" action="/perspectives" class="forms-sample">
                @csrf
                <div class="form-group my-4">
                    <label for="perspective">Ad</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror my-2 w-auto" id="perspective" placeholder="Təlim modulu daxil edin...">
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