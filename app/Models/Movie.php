<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'released_at' => 'date',
    ];

    /**
     * Définit une relation entre la table movies et categories
     * En PHP => SELECT * FROM movies m INNER JOIN categories c ON c.id = m.category_id;
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function duration()
    {
        $hours = floor($this->duration / 60);
        $minutes = $this->duration % 60;
        if ($minutes < 10) {
            $minutes = '0'.$minutes;
        }

        return $hours.'h'.$minutes;
    }
}

/**
 * Quelques nouveautés PHP 8
 */
/* function hello($name = null, $firstname = null) {
    return 'Bonjour '.$firstname.' '.$name;
}

hello('Mota', 'Fiorella');
hello(firstname: 'Fiorella');

array_filter([1, 2, 3], function ($number) {
    return $number < 2;
});

array_filter([1, 2, 3], fn ($number) => $number < 2); */
