<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    protected $fillable = [
        'name', 'description', 'price', 'image'
    ];

    protected static function boot()
    {
        parent::boot();

        static::created(function ($product) {
            if ($product->image) {
                $product->moveImageToStorage();
            }
        });
    }

    public function moveImageToStorage()
    {
        $sourcePath = storage_path('app/' . $this->image);
        $destinationPath = 'public/images/' . $this->image;
        Storage::disk('local')->move($sourcePath, $destinationPath);
        $this->update(['image' => $destinationPath]);
    }
}