<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TeamController extends Controller
{
    public function index()
    {
        $teams = Team::select('id', 'name', 'name', 'website')->whereNull('deleted_at')->get();

        return response()->json(['code' => 200, 'message' => 'success', 'data' => $teams]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tutor_product_id' => 'required|exists:tutor_products,id',
            'name' => 'required|string|unique:teams,name',
            'contact' => 'required|email|unique:teams,contact',
            'website' => 'nullable|url',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 422);
        }

        $team = Team::create($request->all());

        return response()->json(['code' => 201, 'message' => 'success', 'data' => $team->only(['id', 'name', 'contact', 'website', 'tutor_product_id'])], 201);
    }

    public function show($id)
    {
        $team = Team::select('id', 'name', 'contact', 'website')->whereNull('deleted_at')->find($id);
        if (! $team) {
            return response()->json(['code' => 404, 'message' => 'Team not found'], 404);
        }

        return response()->json(['code' => 200, 'message' => 'success', 'data' => $team]);

    }

    public function update(Request $request, $id)
    {

        $team = Team::find($id);
        if (! $team) {
            return response()->json(['code' => 404, 'message' => 'Team not found'], 404);
        }
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|unique:teams,name,'.$id,
            'contact' => 'required|email|unique:teams,contact,'.$id,
            'website' => 'nullable|url',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 422);
        }

        $team->update($request->all());

        return response()->json(['code' => 200, 'message' => 'success', 'data' => $team]);

    }

    public function destroy($id)
    {
        $team = Team::find($id);
        if (! $team) {
            return response()->json(['code' => 404, 'message' => 'Team not found'], 404);
        }
        $team->delete();

        return response()->json(['code' => 200, 'message' => 'Team deleted successfully']);
    }
}
