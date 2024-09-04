<?php
namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\User;


abstract class Controller
{
    public function __construct(
        public User $user,
        public Curso $curso,
    )
    { }
}
