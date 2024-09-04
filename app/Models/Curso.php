<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use stdClass;

class Curso extends Model
{
    public function createCurso($data): bool
    {
        return DB::query()->from('cursos')->insert([
            'name' => $data['name'],
            'description' => $data['description'],
            'path_curso' => $data['path'],
            'user_created' => auth()->user()->id,
            'created_at' => now(),
        ]);
    }
    public function findById(int $id): stdClass
    {
        return DB::query()->from('cursos')->where('id', $id)->first();
    }
    public function updateCurso(array $data): bool
    {
        return DB::query()->from('cursos')->where('id', $data['course_id'])->update([
            'name' => $data['name'],
            'description' => $data['description'],
            'path_curso' => $data['path'],
            'updated_at' => now(),
        ]);
    }
    public function getCursos(): Collection
    {
        return DB::query()->from('cursos')->get();
    }
}
