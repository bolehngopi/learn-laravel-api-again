<?php

namespace App\Http\Controllers;

use App\Models\Costumer;
use App\Http\Requests\StoreCostumerRequest;
use App\Http\Requests\UpdateCostumerRequest;
use Illuminate\Http\Request;

class CostumerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $pageSize = $request->page_size ?? 10;
        $costumers = Costumer::paginate($pageSize);
        return response()->json([
            'messages' => 'success',
            'data' => $costumers
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCostumerRequest $request)
    {
        $credentials = $request->validated();

        if($credentials) {
            $costumer = new Costumer($credentials);
            $costumer->save();

            return response()->json([
                'messages' => 'Data have been saved',
                'data' => $costumer
            ], 200);
        }

        return response()->json([
            'messages' => 'Invalid',
        ], 422);
    }

    /**
     * Display the specified resource.
     */
    public function show(Costumer $costumer)
    {
        return response()->json([
            'message' => 'Successful',
            'data' => $costumer
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCostumerRequest $request, Costumer $costumer)
    {
        $update = $costumer->update([
            'no_ktp' => $request->no_ktp ?? $costumer->no_ktp,
            'name' => $request->name ?? $costumer->name,
            'date_of_birth' => $request->date_of_birth ?? $costumer->date_of_birth,
            'email' => $request->email ?? $costumer->email,
            'phone' => $request->phone ?? $costumer->phone,
            'description' => $request->description ?? $costumer->description
        ]);

        if (!$update) {
            return response()->json([
                'message' => 'Unsuccessful',
            ], 400);
        }

        return response()->json([
            'message' => 'Update successful',
            'data' => $update
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Costumer $costumer)
    {
        $delete = $costumer->forceDelete();

        if(!$delete) {
            return response()->json([
                'message' => 'Unsuccessful'
            ], 400);
        }

        return response()->json([
            'message' => 'Data has been deleted!'
        ]);
    }
}
