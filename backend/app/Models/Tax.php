<?php

namespace App\Models;

use App\Traits\UsesUuid;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;

/**
 * Tax Entity
 *
 * @author Emil Shari <emil.shari87@gmail.com>
 */
class Tax extends Model
{
    /**
     *
     */
    use UsesUuid, SoftDeletes, HasFactory;

    /**
     * Undocumented variable
     *
     * @var string
     */
    protected $table = 'taxes';

    /**
     * Undocumented variable
     *
     * @var [type]
     */
    protected $guarded = [];

    /**
     * Undocumented variable
     *
     * @var array
     */
    protected $fillable = [];

    /**
     * Undocumented variable
     *
     * @var array
     */
    protected $hidden = [];
}
