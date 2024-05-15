<x-manager-layout>
    <div class="card">
        <div class="card-body">
            <h1 class="card-title text-center">Bir mühazirə əlavə edin</h1>
            <form method="post" action="/lectures" class="forms-sample" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <input type="hidden" name="lesson_id" value="{{$lesson_id}}">

                    <label for="name">Ad</label>
                    <input type="text" name="name" class="form-control my-2 w-auto" id="name" placeholder="Adı daxil edin...">
                    @error('name')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="material">Dərs materialı</label>
                    <input type="file" name="material" class="form-control my-2 w-auto" id="material" />
                    @error('material')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary mr-2"> <i class="mdi mdi-content-save" style="font-size: 2rem;"></i> </button>
                    <a href="/lessons/{{ $lesson_id }}" class="btn rounded btn-light"> <i class="mdi mdi-keyboard-return" style="font-size: 2rem;"></i> </a>
                </div>
            </form>
        </div>
    </div>
</x-manager-layout>