<?php namespace Apartments\Services;

class Input
{
    /**
	 * Append a new element to a given array
	 *
	 * @param  array  $input
	 * @param  array $append
	 * @return array
	 */
    public function appendParam(array $input, $append)
    {
        $input[] = $append;

        return $input;
    }
}
