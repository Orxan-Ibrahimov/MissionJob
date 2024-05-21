<x-manager-layout>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center m-2">
                        <h1 class="card-title text-center">{{$group -> name}} qrupunun davamiyyət cədvəli</h1>
                    </div>

                    <table class="table table-hover table-striped table-dark">
                        <thead>
                            <tr>
                                <th>Student</th>
                                @foreach($students -> first()->attendances as $attendance)
                                <th>{{ $attendance -> date}}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($students as $student)
                            <tr>
                                <td>{{ $student -> first_name.' '.$student -> last_name}}</td>
                                @foreach($student -> attendances as $attendance)
                                <td>{{ $attendance -> attendance_type->action}}</td>
                                @endforeach
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

    @can('edit', $group)
    <div class="row my-5">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form method="get" action="/attendances/create" class="d-flex justify-content-between align-items-center m-2">
                        <input type="hidden" name="group" value="{{ $group -> id }}" />
                        <input type="date" name="date" class="col-4 p-4 form-control rounded-pill" />

                        <button type="submit" class="btn btn-info p-3">Tərtib et</button>
                    </form>
                    @error('date')
                    <p class="text-danger mx-4">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>
    </div>
    @endcan

</x-manager-layout>