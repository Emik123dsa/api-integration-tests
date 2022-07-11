<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Tax Identificator Entity.
 *
 * @author Emil Shari <emil.shari87@gmail.com>
 */
class TaxIdentificator extends Model
{
    use HasFactory, Uuid;

    /**
     * Get all filled prototypes in entity.
     *
     * @var array
     */
    protected ?array $filled = array(
        'tax_id',

        'identification_number_id',

        'identification_number_scheme',

        'identification_number_charset',
    );
}
