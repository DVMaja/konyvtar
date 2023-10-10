<?php

namespace App\Http\Controllers;

use App\Models\Lending;
use Illuminate\Http\Request;

class LendingController extends Controller
{
    public function index()
    {
        return Lending::all();
    }
    public function show($id)
    {
        return Lending::find($id);
    }
    public function destroy($id)
    {
        Lending::find($id)->delete();         
    }
    public function update(Request $request, $id)
    {
        $lenging = Lending::find($id);
        $lenging->user_id = $request->user_id;
        $lenging->copy_id = $request->copy_id;
        $lenging->start = $request->start;        
        $lenging->save();
    }
    public function store(Request $request)
    {
        $lenging = new Lending();
        $lenging->user_id = $request->user_id;
        $lenging->copy_id = $request->copy_id;
        $lenging->start = $request->start;
        $lenging->save();
    }
}
