<?php

namespace App\Http\Controllers;

use App\Http\Resources\SectionResource;
use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function index()
    {
        return SectionResource::collection(Section::all());
    }

    public function store (Request $request)
    {
        $input = $request->all();
        $section = Section::create($input);
        return new SectionResource($section);
    }

    public function show($id)
    {
        //
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

    public function update(Request $request, $id)
    {
        //
        $section = Section::find($id);
        $section->update($request->all());
        return new SectionResource($section);
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
        $section = Section::find($id);
        $section->delete();
        return response()->json(null);
    }
}
