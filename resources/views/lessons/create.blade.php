<x-manager-layout>
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Bir dərs əlavə et</h4>
            <form method="post" action="/lessons" class="forms-sample">
                @csrf
                <input type="hidden" name="group_id" value="{{$group_id}}">

                <div class="form-group">
                    <label for="name">Ad</label>
                    <input type="text" name="name" class="form-control my-2 w-auto" id="name" placeholder="dərsin adını daxil edin...">
                    @error('name')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>

                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary mr-2"><i class="mdi mdi-content-save" style="font-size: 2rem;"></i></button>
                    <a href="/groups/{{$group_id}}" class="btn rounded btn-light"> <i class="mdi mdi-keyboard-return" style="font-size: 2rem;"></i> </a>
                </div>
            </form>
        </div>
    </div>
</x-manager-layout>