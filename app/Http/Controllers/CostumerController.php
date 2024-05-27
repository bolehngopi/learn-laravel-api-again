<?php

namespace App\Http\Controllers;

use App\Models\Costumer;
use App\Http\Requests\StoreCostumerRequest;
use App\Http\Requests\UpdateCostumerRequest;
use App\Http\Resources\CostumerResource;
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

        if ($request->hasFile('profile_image')) {
            $file = $request->file('profile_image');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $storagePath = $file->storeAs('public/profile_images', $fileName);
            $storagePath = str_replace('public', 'storage', $storagePath);
        }

        if($credentials) {
            $costumer = new Costumer($credentials);
            $costumer->profile_image = $storagePath;
            $costumer->save();

            return response()->json([
                'messages' => 'Data have been saved',
                'data' => CostumerResource::make($costumer)
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
        $costumer->load('rentals', 'returs');
        return response()->json([
            'message' => 'Successful',
            'data' => CostumerResource::make($costumer)
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
            'description' => $request->description ?? $costumer->description,
            'profile_image' => $request->profile_image ?? $costumer->profile_image,
        ]);

        if (!$update) {
            return response()->json([
                'message' => 'Unsuccessful',
            ], 400);
        }

        return response()->json([
            'message' => 'Update successful',
            'data' => CostumerResource::make($costumer)
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
