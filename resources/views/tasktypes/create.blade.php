<x-manager-layout>
    <div class="card">
        <div class="card-body">
            <h1 class="card-title text-center">Tapsırıq növü əlavə et</h1>
            <form method="post" action="/tasktypes" class="forms-sample row">
                @csrf
                <div class="form-group col-6 my-4">
                    <label for="type">Tapsırıq növü</label>
                    <input type="text" name="type" class="form-control rounded-pill @error('type') is-invalid @enderror my-2" id="type" placeholder="Tapsırıq növünü daxil edin...">
                    @error('type')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group col-6 my-4">
                    <label for="max_point">Maksimum növü</label>
                    <input type="number" name="max_point" min="0" class="form-control rounded-pill @error('max_point') is-invalid @enderror my-2" id="max_point" placeholder="Maksimum xal daxil edin...">
                    @error('max_point')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary mr-2"> <i class="mdi mdi-content-save" style="font-size: 2rem;"></i> </button>
                    <a href="/tasktypes" class="btn rounded btn-light"> <i class="mdi mdi-keyboard-return" style="font-size: 2rem;"></i> </a>
                </div>
            </form>
        </div>
    </div>
</x-manager-layout>