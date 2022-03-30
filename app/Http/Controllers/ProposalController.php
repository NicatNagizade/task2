<?php

namespace App\Http\Controllers;

use App\Models\Proposal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProposalController extends Controller
{
    public function store(Request $request)
    {
        DB::beginTransaction();
        $file = $request->file('proposal');
        if(!$file) {
            return response()->json(['message' => 'file does not exists'], 200);
        }
        if($file->getMimeType() !== 'application/pdf') {
            return response()->json(['message' => 'file does not pdf'], 200);
        }
        $file_size = $file->getSize();
        $file_name = $file->getClientOriginalName();
        $size_name =$file_size. '_' . $file_name;
        $proposal = Proposal::where('size_name', $size_name)
            ->first();
        if(!$proposal) {
            $proposal = new Proposal;
            $proposal->size_name = $size_name;
        }
        Storage::disk('public_path')->putFileAs('/pdf', $file, $size_name);
        $proposal->save();
        DB::commit();
        return response()->json(['message' => 'success'], 200);
    }
}
