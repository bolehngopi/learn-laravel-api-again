<?php

namespace App\Http\Controllers;

use App\Models\Retur;
use App\Http\Requests\StoreReturRequest;
use App\Http\Requests\UpdateReturRequest;

class ReturController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $returns = Retur::all();

        return response()->json([
            'message' => 'Success',
            'data' => $returns
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreReturRequest $request)
    {
        $credentials = $request->validated();

        if($credentials) {
            $return = new Retur($credentials);
            $return->save();

            return response()->json([
                'messages' => 'Data have been saved',
                'data' => $return
            ], 200);
        }

        return response()->json([
            'messages' => 'Invalid',
        ], 422);
    }

    /**
     * Display the specified resource.
     */
    public function show(Retur $retur)
    {
        return response()->json([
            'message' => 'Success',
            'data' => $retur
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReturRequest $request, Retur $retur)
    {
        $credentials = $request->validated();

        if($credentials) {
            $retur->update($credentials);

            return response()->json([
                'messages' => 'Data have been updated',
                'data' => $retur
            ], 200);
        }

        return response()->json([
            'messages' => 'Invalid',
        ], 422);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Retur $retur)
    {
        $delete = $retur->forceDelete();

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
