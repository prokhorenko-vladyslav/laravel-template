<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * @property-read string $id
 * @property string $name
 * @property string $flaggable_id
 * @property string $flaggable_type
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property-read Collection<Model> $flaggable
 */
class Flag extends \Spatie\ModelFlags\Models\Flag
{
    use HasUuids;

    protected $fillable = [
        'name',
    ];
}
