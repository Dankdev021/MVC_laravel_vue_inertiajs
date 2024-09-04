<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class CursoController extends Controller
{
    public function createCurso(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'pdf' => 'required|file|mimes:pdf|max:10000',
        ]);
        $path = $request->file('pdf')->store('pdfs', 'public');
        $data['path'] = $path;
        $this->curso->createCurso($data);
        return redirect()->back()->with('message', 'Curse created successfully');
    }
    public function UpdateCurso(Request $request)
    {
        $data = $request->validate([
            'name' => 'string',
            'description' => 'string',
            'pdf' => 'file|mimes:pdf|max:10000',
        ]);
        $course = $this->curso->findById($request->id);
        if ($request->hasFile('pdf')) {
            Storage::delete($course->path_curso);
            $path = $request->file('pdf')->store('pdfs', 'public');
            $data['path'] = $path;
        }
        $userUpdate = [
            'course_id' => $request->id,
            'name' => $data['name'] ?? $course->name,
            'description' => $data['description'] ?? $course->description,
            'path' => $data['path'] ?? $course->path_curso,
        ];
        $this->curso->updateCurso($userUpdate);
        return redirect()->back()->with('message', 'Curse updated successfully');
    }
    public function getCursos()
    {
        $courses = $this->curso->getCursos();
        return Inertia::render('ListCursos', ['courses' => $courses]);
    }
    public function showPdf(int $id)
    {
        $course = $this->curso->findById($id);
        $pdfPath = storage_path("app/public/" . $course->path_curso);
        return response()->file($pdfPath);
    }
}
