<x-manager-layout>
    <div class="card">
        <div class="card-body">
            <h1 class="card-title text-center">Bir qrup əlavə edin</h1>
            <form method="post" action="/groups" class="forms-sample">
                <input type="hidden" name="perspective" value="{{ $perspective -> id }}" />
                @csrf
                <div class="form-group">
                    <label for="name">Qrup adı</label>
                    <input type="text" name="name" class="form-control my-2 w-auto" id="name" placeholder="Qrupun adını daxil edin...">
                    @error('name')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="members">Qrup İştirakçıları</label>
                    <select name="members[]" id="members" class="form-control p-0" multiple>
                        <optgroup label="Teachers" class="bg-dark py-2">>
                            @foreach($members['teachers'] as $member)
                            <option value="{{ $member -> id }}" selected class="bg-white text-dark">{{ $member -> first_name . ' '. $member -> last_name }}</option>
                            @endforeach
                        </optgroup>
                        <optgroup label="Mentors" class="bg-dark py-2">>
                            @foreach($members['mentors'] as $member)
                            <option value="{{ $member -> id }}" selected class="bg-white text-dark p-2">{{ $member -> first_name . ' '. $member -> last_name }}</option>
                            @endforeach
                        </optgroup>
                        <optgroup label="Students" class="bg-dark py-2">>
                            @foreach($members['students'] as $member)
                            <option value="{{ $member -> id }}" selected class="bg-white text-dark p-2">{{ $member -> first_name . ' '. $member -> last_name }}</option>
                            @endforeach
                        </optgroup>

                    </select>
                </div>

                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary mr-2"> <i class="mdi mdi-content-save" style="font-size: 2rem;"></i> </button>
                    <a href="/groups" class="btn rounded btn-light"> <i class="mdi mdi-keyboard-return" style="font-size: 2rem;"></i> </a>
                </div>
            </form>
        </div>
    </div>


</x-manager-layout>

<!-- <script>
        let members = document.querySelector('#members');
        members.addEventListener('change', function (param) {  
            // console.log(this);
            console.log(this.selected);
        })
        
    </script> -->