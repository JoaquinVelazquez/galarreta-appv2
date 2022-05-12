<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Seller extends Model
{
    use HasFactory;
    use Searchable;

     /**
     * Get the indexable data array for the model.
     *
     * @return array
     */
    public function toSearchableArray()
    {
 
        return [
            'nickname' => $this->title,
            'id' => $this->title
        ];
    }
}
