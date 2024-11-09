<?php

namespace App\Http\Controllers;

use App\Models\Ballot;
use Illuminate\Http\Request;

class BallotController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $ballot = Ballot::create([
            'org_code' => $request->input('org_code'),
            'user_id' => $request->input('user_id'),
            'ktm' => $request->input('ktm'),
            'verification' => $request->input('verification'),
            'is_verified' => $request->input('is_verified'),
            'verified_at' => $request->input('verified_at'),
        ]);
        
        return response()->json(['ballot' => $ballot], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Ballot $ballot)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ballot $ballot)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $ballot = Ballot::find($id);

        if(!$ballot){
            return response()->json(['message' => 'Ballot not found'], 404);
        }

        $ballot->update([
            'org_code' => $request->input('org_code'),
            'user_id' => $request->input('user_id'),
            'ktm' => $request->input('ktm'),
            'verification' => $request->input('verification'),
            'is_verified' => $request->input('is_verified'),
            'verified_at' => $request->input('verified_at'),
        ]);

        return response()->json(['message' => 'Ballot Berhasil Diupdate']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ballot = Ballot::find($id);

        if (!$ballot) {
            return response()->json(['message' => 'Ballot not found'], 404);
        }

        $ballot->delete();

        return response()->json(['message' => 'Ballot Berhasil Dihapus'], 200);
    }
}
