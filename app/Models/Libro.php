<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    use HasFactory;

    protected $table = 'libros';
    
    
    protected $fillable = [
        'titulo', 
        'editorial', 
        'anio', 
        'autor_id', 
        'categoria_id', 
        'editorial_id'
    ]; 

   
    public function autor()
    {
        return $this->belongsTo(Autor::class, 'autor_id');
    }

   
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }

   
    public function editorialRelacion()
    {
       
        return $this->belongsTo(Editorial::class, 'editorial_id');
    }
}