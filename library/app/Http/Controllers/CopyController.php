<?php

namespace App\Http\Controllers;

use App\Models\Copy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CopyController extends Controller
{
    public function index()
    {
        return Copy::all();
    }
    public function show($id)
    {
        return Copy::find($id);
    }
    public function destroy($id)
    {
        Copy::find($id)->delete();
        //még nem létetik az útvonal        
    }
    public function update(Request $request, $id)
    {
        $copy = Copy::find($id);
        $copy->book_id = $request->book_id;
        $copy->hardcover = $request->hardcover;
        $copy->status = $request->emstatusail;
        $copy->publication = $request->publication;
        $copy->save();
    }
    public function store(Request $request)
    {
        $copy = new Copy();
        $copy->book_id = $request->book_id;
        $copy->hardcover = $request->hardcover;
        $copy->status = $request->emstatusail;
        $copy->publication = $request->publication;
        $copy->save();
    }

    public function copyBookLending()
    {
        return Copy::with('book')->with('lending')->get();
        //több függvényt is használhatunk
    }

    public function copyLending($id)
    {
        $copyes = Copy::with('copy')->where('copy_id', '=', $id)->get();
        return $copyes;
        
    }
}
