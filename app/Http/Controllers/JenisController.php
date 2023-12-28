<?php

namespace App\Http\Controllers;

use Exception;
use PDOException;
use App\Models\Jenis;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Requests\JenisRequest;

class JenisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $data = Jenis::get();
            return response()->json(['status' => true, 'message' => 'success', 'data' => $data]);
        } catch (Exception | PDOException $e) {
            return response()->json(['status' => false, 'message' => 'gagal menampilkan data']);
        }
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
    public function store(JenisRequest $request)
    {
        try {
            $data = Jenis::create($request->all());
            return response()->json(['status' => true, 'message' => 'input success', 'data' => $data]);
        } catch (Exception | PDOException $e) {
            return response()->json(['status' => false, 'message' => 'gagal input data']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Jenis $jenis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jenis $jenis)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(JenisRequest $request, Jenis $jeni)
    {
        try {
            $data = $jeni->update($request->all());
            return response()->json(['status' => true, 'message' => ' update data sukses', 'data' => $data]);
        } catch (Exception | PDOException $e) {
            return response()->json(['status' => false, 'message' => 'gagal update data', 'error_type' => $e]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jenis $jeni)
    {
        try {
            $data = $jeni->delete();
            return Response()->json(['status' => true, 'message' => 'data has been deleted', 'data' => $data]);
        } catch (Exception | PDOException $e) {
            return Response()->json(['status' => false, 'message' => 'data failed to delete']);
        }
    }
}
