<?php

namespace App\Http\Controllers;

use App\Http\Resources\MbkmPackageResource;
use App\Models\Mbkm;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Http\Resources\MbkmResource;
use App\Models\Package;
use App\Models\Section;

class MbkmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return MbkmPackageResource::collection(Mbkm::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $mbkm = Mbkm::create($input);
        return new MbkmPackageResource($mbkm);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $mbkmid = Mbkm::where('package_id',$id)->get('section_id');
        $section = Section::find($mbkmid);
        return response()->json($section);
    }

    public function show2($package_id)
    {
        $mbkmid = Mbkm::where('package_id',$package_id)->get();
        return response()->json($mbkmid);
    }

    public function show3($package_id , $section_id)
    {
        $mbkmid = Mbkm::where('package_id',$package_id)->where('section_id', $section_id)->get('section_id');
        // if($mbkmid->section_id) return response()->json([
        //     'status'=>500
        // ]);
        $mbkm = json_decode($mbkmid);
        if (!$mbkm){
            return response()->json(false);
        }else{
            return response()->json(true);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $Mbkm = Mbkm::find($id);
        $Mbkm->update($request->all());
        return new MbkmPackageResource($Mbkm);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $Mbkm = Mbkm::find($id);
        $Mbkm->delete();
        return response()->json(null);
    }
}
