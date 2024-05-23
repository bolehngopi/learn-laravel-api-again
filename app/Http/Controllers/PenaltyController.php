<?php

namespace App\Http\Controllers;

use App\Models\Penalty;
use App\Http\Requests\StorePenaltyRequest;
use App\Http\Requests\UpdatePenaltyRequest;
use Illuminate\Http\Request;

class PenaltyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penalties = Penalty::all();

        return response()->json([
            'message' => 'Success',
            'data' => $penalties
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePenaltyRequest $request)
    {
        $credentials = $request->validated();

        if($credentials) {
            $penalty = new Penalty($credentials);
            $penalty->save();

            return response()->json([
                'messages' => 'Data have been saved',
                'data' => $penalty
            ], 200);
        }

        return response()->json([
            'messages' => 'Invalid',
        ], 422);
    }

    /**
     * Display the specified resource.
     */
    public function show(Penalty $penalty)
    {
        return response()->json([
            'message' => 'Success',
            'data' => $penalty
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePenaltyRequest $request, Penalty $penalty)
    {
        $credentials = $request->validated();

        if($credentials) {
            $penalty->update($credentials);

            return response()->json([
                'messages' => 'Data have been updated',
                'data' => $penalty
            ], 200);
        }

        return response()->json([
            'messages' => 'Invalid',
        ], 422);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Penalty $penalty)
    {
        $delete = $penalty->forceDelete();

        if($delete) {
            return response()->json([
                'messages' => 'Data have been deleted',
            ], 200);
        }

        return response()->json([
            'messages' => 'Invalid',
        ], 422);
    }
}
