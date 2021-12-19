<?php

namespace App\Http\Controllers;

use App\Models\Book;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $id)
    {
        $table = Book::all();

        return response()->json([
            'success' => 201,
            'data'    => $table
        ], 201);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $table = Book::create([
            "title"         => $request->title,
            "description"   => $request->description,
            "author"        => $request->author,
            "publisher"     => $request->publisher,
            "date_of_issue" => $request->date_of_issue
           
        ]);

        return response()->json([
            'success'   => 201,
            'message'   => 'data berhasil disimpan',
            'data'      => $table
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $table = Book::where('id', $id)->first();
        if ($table) {
            return response()->json([
                'success'   => 200,
                'data'      => $table
            ], 200);
        } else {
            return response()->json([
                'failed'    => 404,
                'message'   => 'id ' . $id . ' tidak ditemukan',
                'data'      => $table
            ], 404);
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
        $query = Book::find($id);
        if ($query) {
            $query->update([
                "title"           => $request->title ? $request->title : $query->title,
                "description"     => $request->description ? $request->description : $query->description,
                "author"          => $request->author ? $request->author : $query->author,
                "publisher"       => $request->publisher ? $request->publisher : $query->publisher,
                "date_of_issue"   => $request->date_of_issue ? $request->date_of_issue : $query->date_of_issue
            ]);
            return response()->json([
                'success'   => 203,
                'message'   => 'update berhasil',
                'data'      => $query
            ], 203);
        } else {
            return response()->json([
                'failed'   => 404,
                'message'   => 'id ' . $id . ' tidak ditemukan'
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $query = Book::find($id);
        if ($query) {
            $query->delete();
            return response()->json([
                'success'   => 200,
                'message'   => 'data berhasil dihapus'
            ], 200);
        } else {
            return response()->json([
                'failed'   => 404,
                'message'   => 'id ' . $id . ' tidak ditemukan'
            ], 404);
        }
    }
}
