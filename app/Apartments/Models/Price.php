<?php namespace Apartments\Models;

class Price extends BaseModel
{
    /**
	 * Table name
	 *
	 * @var string
	 */
    public $table = 'apartment_prices';

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'apartment_id' => 'required|exists:apartments,id',
        'price' => 'required|numeric'
    ];

    /**
     * Mass assignment fields
     *
     * @var array
     */
    public $fillable = ['apartment_id', 'price', 'valid_from', 'valid_to'];

    /**
     * Apartment relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function apartment()
    {
        return $this->belongsTo(new Apartment);
    }

    /**
     * Add validation rules for `valid_from` and `valid_to` fields
     *
     * @return bool
     */
    public function beforeValidate()
    {
        static::$rules['valid_from'] = 'date|before:'.$this->valid_to;
        static::$rules['valid_to'] = 'date|after:'.$this->valid_from;

        return true;
    }
}
