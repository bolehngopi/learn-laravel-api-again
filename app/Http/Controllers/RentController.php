<?php

namespace App\Http\Controllers;

use App\Models\Rent;
use App\Http\Requests\StoreRentRequest;
use App\Http\Requests\UpdateRentRequest;
use Illuminate\Http\Request;

class RentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Validate the customer ID
        // $validatedData = $request->validate([
        //     'id' => 'required|integer|exists:rents,costumer_id'
        // ]);

        // Retrieve rents based on the provided customer ID
        // $rents = Rent::where('costumer_id', $validatedData['id'])->get();
        $rents = Rent::all();

        if ($rents->count() > 0){
            return response()->json([
                'message' => 'Success',
                'data' => $rents
            ]);
        } else {
            return response()->json([
                'message' => 'No data found'
            ], 404);
        }
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRentRequest $request)
    {
        $credentials = $request->validated();

        if($credentials) {
            $rent = new Rent($credentials);
            $rent->save();

            return response()->json([
                'messages' => 'Data have been saved',
                'data' => $rent
            ], 200);
        }

        return response()->json([
            'messages' => 'Invalid',
        ], 422);
    }

    /**
     * Display the specified resource.
     */
    public function show(Rent $rent)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRentRequest $request, Rent $rent)
    {
        $credentials = $request->validated();

        if($credentials) {
            $rent->update($credentials);

            return response()->json([
                'messages' => 'Data have been updated',
                'data' => $rent
            ], 200);
        }

        return response()->json([
            'messages' => 'Invalid',
        ], 422);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rent $rent)
    {
        $delete = $rent->forceDelete();

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
