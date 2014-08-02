<?php namespace Apartments\Models;

use LaravelBook\Ardent\Ardent;

abstract class BaseModel extends Ardent
{
    /**
	 * Turn off timestamps according to specification
	 *
	 * @var boolean
	 */
    public $timestamps = false;

    /**
     * Save the model
     *
     * @param  array $input
     * @return bool
     */
    public function saveData($input = [])
    {
        $this->fill($input);

        return $this->save();
    }
}
