<?php

namespace App\Http\Controllers;

use Exception;
use PDOException;
use App\Models\Meja;
use Illuminate\Http\Request;
use App\Http\Requests\MejaRequest;
use Illuminate\Routing\Controller;


class MejaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $data = Meja::get();
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
    public function store(MejaRequest $request)
    {
        try {
            $data = Meja::create($request->all());
            return response()->json(['status' => true, 'message' => 'input success', 'data' => $data]);
       } catch (Exception | PDOException $e) {
           return response()->json(['status' => false, 'message' => 'gagal input data']);
        };
    }

    /**
     * Display the specified resource.
     */
    public function show(Meja $meja)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Meja $meja)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MejaRequest $request, Meja $meja)
    {
        try {
            $data = $meja->update($request->all());
            return response()->json(['status' => true, 'message' => ' update data sukses', 'data' => $data]);
        } catch (Exception | PDOException $e) {
            return response()->json(['status' => false, 'message' => 'gagal update data', 'error_type' => $e]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Meja $meja)
    {
        try {
            $data = $meja->delete();
            return Response()->json(['status' => true, 'message' => 'data has been deleted', 'data' => $data]);
        } catch (Exception | PDOException $e) {
            return Response()->json(['status' => false, 'message' => 'data failed to delete']);
        }
    }
}
