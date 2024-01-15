<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\image;
use App\Models\Plant;


class PlantController extends Controller
{
    /**
     * Show the form for creating a new resource.*
     */
    public function create(Request $req)
    {
        if (strncmp($req->IMG, 'img/', 4) !== 0){
            return false;
        }

        if ($req->upd){
            DB::table('plant')->where('id', $_GET['id'])->update([
                'name' => $req->NAME,
                'description' => $req->TEXT,
                'id_requirements' => $req->REQ
            ]);
            DB::table('image')->where('id_plant', $req->id)->update([
                'path' => $req->IMG,
                'id_plant' => $req->id
            ]);
        } else{
            DB::table('plant')->insert([
                'name' => $req->NAME,
                'description' => $req->TEXT,
                'id_requirements' => $req->REQ
            ]);

            $id = DB::table('plant')
                ->select('id')
                ->where('name', $req->NAME)
                ->where('description', $req->TEXT)
                ->where('id_requirements', $req->REQ)
                ->orderBy('id', 'desc')
                ->first()->id;

            DB::table('image')->insert([
                'path' => $req->IMG,
                'id_plant' => $id
            ]);
        }
        return true;
    }

    public function delete(Request $req){
        DB::table('image')->where('id_plant', $req->id)->delete();
        DB::table('plant')->where('id', $req->id)->delete();

        return true;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
        //
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
    }
}
