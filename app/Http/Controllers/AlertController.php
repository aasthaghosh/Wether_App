<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\FarmTodo;
use App\Models\FarmProfile;
use Illuminate\Support\Facades\Auth;

class AlertController extends Controller
{
    public function index()
    {
        // Fetch existing FarmProfile for the authenticated user, or mock it if not using auth correctly
        $farmProfile = FarmProfile::where('user_id', Auth::id() ?? 1)->first() ?? new FarmProfile();
        $todos = FarmTodo::orderBy('created_at', 'desc')->get();
        return view('Alert', compact('farmProfile', 'todos'));
    }

    public function updateProfile(Request $request)
    {
        // Simple update/create logic
        $profile = FarmProfile::firstOrNew(['user_id' => Auth::id() ?? 1]);
        $profile->location = $request->location;
        $profile->field_size = $request->field_size;
        $profile->primary_crop = $request->primary_crop;
        $profile->soil_type = $request->soil_type;
        $profile->save();
        return response()->json(['success' => true]);
    }

    public function storeTodo(Request $request)
    {
        $request->validate(['task' => 'required|string|max:255']);
        $todo = FarmTodo::create(['task' => $request->task, 'is_completed' => false]);
        return response()->json(['success' => true, 'todo' => $todo]);
    }

    public function toggleTodo(Request $request, $id)
    {
        $todo = FarmTodo::findOrFail($id);
        $todo->is_completed = !$todo->is_completed;
        $todo->save();
        return response()->json(['success' => true, 'is_completed' => $todo->is_completed]);
    }
}
