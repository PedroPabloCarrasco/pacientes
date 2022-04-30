<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'pacientes';

    protected $fillable = ['Nombre','ApellidoPaterno','ApellidoMaterno','Correo','Foto'];
	
}
