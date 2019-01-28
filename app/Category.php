<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Category extends Model
{
    protected $fillable = [
        'name', 'description',
    ];
    public static $rules = [
        'name'  => 'required | min:3',
        'description' => 'required | max:200'
    ];
    public static $messages = [
        'name.required' => 'El nombre es obligatoriooo',
        'name.min'      => 'El nombre ha de tener al menos 3 caracteres',
        'description.required' => 'La descripción es obligatoriaa',
        'description.max' => 'La descripción no puede tener más de 200 caracteres'
    ];
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
