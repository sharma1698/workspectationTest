<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TutorProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TutorProductController extends Controller
{
    public function index()
    {
        $tutorProducts = TutorProduct::select('id', 'title', 'description')->whereNull('deleted_at')->get();

        return response()->json(['code' => 200, 'message' => 'success', 'data' => $tutorProducts]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|unique:tutor_products,title',
            'description' => 'required|string',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 422);
        }
        if ($validator->fails()) {
            return response()->json(['code' => 422, $validator->errors()->all()], 422);
        }
        $tutorProduct = TutorProduct::create($request->all());

        return response()->json(['code' => 201, 'message' => 'success', 'data' => $tutorProduct->only(['id', 'title', 'description'])], 201);
    }

    public function show($id)
    {
        $tutorProduct = TutorProduct::select('id', 'title', 'description')->whereNull('deleted_at')->find($id);
        if (! $tutorProduct) {
            return response()->json(['code' => 404, 'message' => 'Tutor Product not found'], 404);
        }

        return response()->json(['code' => 200, 'message' => 'success', 'data' => $tutorProduct]);
    }

    public function update(Request $request, $id)
    {
        $tutorProduct = TutorProduct::find($id);
        if (! $tutorProduct) {
            return response()->json(['code' => 404, 'message' => 'Tutor Product not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'title' => 'required|string|unique:tutor_products,title,'.$id,
            'description' => 'required|string',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 422);
        }
        $tutorProduct->update($request->all());

        return response()->json(['code' => 200, 'message' => 'success', 'data' => $tutorProduct]);
    }

    public function destroy($id)
    {
        $tutorProduct = TutorProduct::find($id);
        if (! $tutorProduct) {
            return response()->json(['code' => 404, 'message' => 'Tutor Product not found'], 404);
        }
        $tutorProduct->delete();

        return response()->json(['code' => 200, 'message' => 'Tutor Product deleted successfully']);
    }
}
