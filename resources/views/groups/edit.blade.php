<x-manager-layout>
    <div class="card">
        <div class="card-body">
            <h1 class="card-title text-center">Qrupu redaktə edin ({{ $group -> name }})</h1>
            <form method="post" action="/groups/{{$group -> id}}" class="forms-sample">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="name">Qrupun yeni adı</label>
                    <input type="text" name="name" class="form-control w-auto" id="name" placeholder="Qrupun adını daxil edin...">
                    @error('name')
                    <p class="text-danger my-2">{{$message}}</p>
                    @enderror
                </div>
                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary mr-2"> <i class="mdi mdi-content-save" style="font-size: 2rem;"></i> </button>
                    <a href="/groups/{{ $group -> id }}" class="btn rounded btn-light"> <i class="mdi mdi-keyboard-return" style="font-size: 2rem;"></i> </a>
                </div>
            </form>
        </div>
    </div>
</x-manager-layout>