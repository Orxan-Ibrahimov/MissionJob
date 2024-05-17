<x-manager-layout>
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Təlim modulunu redaktə et: {{ $perspective -> name }}</h4>
            <form method="post" action="/perspectives/{{$perspective -> id}}" class="forms-sample">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="perspective">Adı</label>
                    <input type="text" name="name" class="form-control w-auto" id="perspective" placeholder="Təlim modulu...">
                    @error('name')
                    <p class="text-danger my-2">{{$message}}</p>
                    @enderror
                </div>
                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary mr-2"><i class="mdi mdi-content-save" style="font-size: 2rem;"></i></button>
                    <a href="/perspectives/{{ $perspective -> id }}" class="btn rounded btn-light"> <i class="mdi mdi-keyboard-return" style="font-size: 2rem;"></i> </a>
                </div>
            </form>
        </div>
    </div>
</x-manager-layout>