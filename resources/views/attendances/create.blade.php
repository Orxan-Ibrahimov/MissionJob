<x-manager-layout>
    <div class="card">
        <div class="card-body">
            <h1 class="card-title text-center"> Qrup: <span class="text-info mr-5">{{ $group -> name }}</span> Tarix: <span class="text-primary">{{ $date}}</span></h1>
            <form method="post" action="/attendances/" class="forms-sample my-5" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <input type="hidden" name="date" value="{{ $date }}" />
                    <input type="hidden" name="group" value="{{ $group -> id }}" />
                    @foreach($group -> members as $member)
                    <div class="col-6 d-flex align-items-center">
                        <input type="hidden" name="student[]" value="{{$member-> id}}" />
                        <h3> {{ $member -> first_name.' '. $member -> last_name }}: </h3>
                        <select name="attendance_type[]" id="attendance" class="form-control w-auto px-5 mx-5 form-control-lg bg-primary text-white rounded-pill">
                            <option value="">Choose</option>
                            @foreach($attendance_types as $attendance_type)
                            <option value="{{ $attendance_type -> id }}">{{ $attendance_type -> action }}</option>
                            @endforeach
                        </select>
                    </div>
                    @endforeach
                </div>
                <div class="d-flex align-items-center justify-content-between my-5">
                    <button type="submit" class="btn btn-success my-5"><i class="mdi mdi-calendar-plus" style="font-size: 2rem;"></i></button>
                    <a href="/attendances/{{$group -> id}}" class="btn btn-light rounded"><i class="mdi mdi-keyboard-return" style="font-size: 2rem;"></i></a>
                </div>
            </form>
        </div>

    </div>
</x-manager-layout>