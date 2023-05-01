<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $files = Document::all();
        return ['status' => 'success', 'total' => $files->count(), 'documents' => $files];
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(['pdf' => 'required|mimes:pdf,doc,docx,pptx']);
        $file = $request->file('pdf');
        if ($file) {
            $filename = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('uploads', $filename, 'public');
            $document = new Document;
            $document->name = $file->getClientOriginalName();
            $document->file_path = '/storage/' . $filePath;
            $document->save();
            return ['status' => 'success', 'document' => $document];
        }
        return ['status' => 'failed'];
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        return Document::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
