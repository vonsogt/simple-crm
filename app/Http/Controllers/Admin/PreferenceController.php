<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Preference;
use Illuminate\Support\Facades\Artisan;
use \Illuminate\Foundation\Inspiring;

class PreferenceController extends Controller
{
    public function index()
    {
        $data['quote'] = explode(' - ', Inspiring::quote());

        return view('admin.preferences.index', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $user_id =  auth()->user()->id;
        $language = $request->language;
        $timezone = $request->timezone;

        // Check if the current user updating it self
        if ($id == $user_id) {
            // Checking the user's preference
            $preferences = Preference::where('user_id', $user_id)->get();

            // If the user have no preferences, make it one
            if ($preferences->isEmpty()) {
                $preference_language = Preference::create(['user_id' => $user_id, 'name' => 'language', 'data' => $language]);
                $preference_timezone = Preference::create(['user_id' => $user_id, 'name' => 'timezone', 'data' => $timezone]);
            } else {
                foreach ($preferences as $preference) {
                    if ($preference->name == 'language')
                        $preference->update(['data' => $language]);
                    else if ($preference->name == 'timezone')
                        $preference->update(['data' => $timezone]);
                }
            }

            return back()->with('message', trans('simplecrm.preference.update_success'));
        }

        return back()->with('message', trans('simplecrm.preference.update_error'));
    }
}
