<?php

namespace App\Http\Controllers;

use App\Models\AttendanceType;
use App\Models\Group;
use App\Models\StudentAttendance;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

use function PHPUnit\Framework\isNull;

class StudentAttendanceController extends Controller
{
    public function show(string $id)
    {

        $attendances = StudentAttendance::where('group_id', $id)->get();
        // dd($attendances);
        $group = Group::find($id);
        $students = $group->members->reject(function (User $user) {
            return count($user->roles) > 1 || $user->active_role !== 'student';
        });
        // dd($students);
        return view('attendances.show', ['attendances' => $attendances, 'group' => $group, 'students' => $students]);
    }

    public function create(Request $request)
    {
        request()->validate([
            'date' => ['required']
        ]);
        $group = Group::find($request['group']);
        $group->members = $group->members->reject(function (User $user) {
            return count($user->roles) > 1 || $user->active_role !== 'student';
        });

        $date = $request['date'];
        $attendance_types = AttendanceType::get();

        return view('attendances.create', ['date' => $date, 'group' => $group, 'attendance_types' => $attendance_types]);
    }

    public function store(Request $request)
    {
        request()->validate([
            'attendance_type' => ['required']
        ]);

        foreach ($request['student'] as $key => $s_id) {
            $old_student_attendance = StudentAttendance::where(['user_id' => $s_id, 'date' => $request['date']])->first();
            if ($old_student_attendance) {
                $old_student_attendance['attendance_type_id'] = $request['attendance_type'][$key];
                $old_student_attendance->update();
            } else {
                $student_attendance = StudentAttendance::create([
                    'user_id' => $s_id,
                    'date' => $request['date'],
                    'creator_id' => Auth::user()->id,
                    'attendance_type_id' => $request['attendance_type'][$key],
                    'group_id' => $request['group']
                ]);
                $student_attendance->save();
            }
        }

        return redirect('attendances/' . $request['group']);
    }
}
