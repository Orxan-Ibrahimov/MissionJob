<x-manager-layout>
    <div class="card">
        <div class="card-body">
            <h1 class="card-title text-center">Bir qrup əlavə edin</h1>
            <form method="post" action="/groups" class="forms-sample">
                @csrf
                <div class="form-group">
                    <label for="name">Qrup adı</label>
                    <input type="text" name="name" class="form-control my-2 w-auto" id="name" placeholder="Qrupun adını daxil edin...">
                    @error('name')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary mr-2"> <i class="mdi mdi-content-save" style="font-size: 2rem;"></i> </button>
                    <a href="/groups" class="btn rounded btn-light"> <i class="mdi mdi-keyboard-return" style="font-size: 2rem;"></i> </a>
                </div>
            </form>
        </div>
    </div>
</x-manager-layout>