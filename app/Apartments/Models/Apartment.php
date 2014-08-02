<?php namespace Apartments\Models;

class Apartment extends BaseModel
{
    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'rooms' => 'numeric',
        'persons' => 'integer',
    ];

    /**
     * Mass assignment fields
     *
     * @var array
     */
    public $fillable = ['name', 'description', 'rooms', 'persons'];

    /**
     * Price relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function prices()
    {
        return $this->hasMany(new Price);
    }

    /**
     * Delete related prices when apartment is deleted
     *
     * @return bool
     */
    public function beforeDelete()
    {
        $this->prices()->delete();

        return true;
    }
}
