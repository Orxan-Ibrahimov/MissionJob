<?php

namespace App\Http\Controllers;

use App\Models\User;
use DOMDocument;
use Dotenv\Store\File\Paths;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users/index', ['users' => $users]);
    }

    public function show(User $user)
    {

        $rest_array = [];

        foreach (Role::all() as $role) {
            if ($role->name === 'administrator') continue;
            $none = true;
            foreach ($user->roles as $user_role) {
                if ($user_role->id == $role->id) $none = false;
            }
            if ($none) array_push($rest_array, $role);
        }

        // dd(empty($rest_array));
        return view('users/show', ['user' => $user, 'rest_roles' => $rest_array]);
    }

    public function edit(User $user)
    {
        return view('users/edit', ['user' => $user]);
    }


    public function update(User $user)
    {

        $valid_user =  request()->validate([
            'first_name' => ['required', 'min:3'],
            'last_name' => ['required', 'min:3'],
            'email' => ['required', 'email'],
            'gender' => ['required'],
            'about_you' => [],
            'phone' => []
        ]);


        // profile section
        $profile = request('profile');
        if ($profile) {
            $dir_image = str_replace(request()->getSchemeAndHttpHost(), public_path(), $user->profile);
            if (File::exists($dir_image) && explode('\\', File::dirname($dir_image))[count(explode('\\', File::dirname($dir_image))) - 1] !== 'avatar') File::delete($dir_image);

            //Image Upload
            $profile_name = $profile->getClientOriginalName();
            $profile_arr = $profile->getPathname();
            $uploads = Paths::filePaths(['uploads'], [Paths::filePaths(['image'], [Paths::filePaths(['avatar'], [$user->id])[0]])[0]])[0];
            $rand = rand(100000, 999999);
            if (!File::exists(Paths::filePaths([public_path()], [$uploads])[0]))
                File::makeDirectory(Paths::filePaths([public_path()], [$uploads])[0], 0777, true);
            move_uploaded_file($profile_arr, Paths::filePaths([$uploads], [$rand . '-' . $profile_name])[0]);
            $profile = Paths::filePaths([request()->getSchemeAndHttpHost()], [Paths::filePaths([$uploads], [$rand . '-' . $profile_name])[0]])[0];
        } else  $profile = $user->profile;

        $valid_user['profile'] = $profile;

        // about you section
        $about_you = request('about_you');
        $dom = new DOMDocument();
        $dom->loadHTML($about_you, 9);
        $images = $dom->getElementsByTagName('img');

        foreach ($images as $key => $image) {
            $data = base64_decode(explode(',', explode(';', $image->getAttribute('src'))[1])[1]);
            $image_name = Paths::filePaths([public_path()], [Paths::filePaths([Paths::filePaths(['uploads'],['image'])[0]], [time() . $key . '.png'])[0]])[0];
            // dd($image_name);
            file_put_contents($image_name, $data);
            $image->removeAttribute('src');
            $image_name = str_replace(public_path(),request()->getSchemeAndHttpHost(),$image_name);
            $image_name = str_replace('\\','/',$image_name);
            $image->setAttribute('src', $image_name);

        }
        $description = $dom -> saveHTML();
        $valid_user['about_you'] = $description;

        $user->update($valid_user);
        return redirect('users');
    }
}
