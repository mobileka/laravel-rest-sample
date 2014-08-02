<?php namespace Apartments\Services;

use Illuminate\Support\Facades\Response as BaseResponse;

/**
 * A class that makes api output to be consistent
 */
class Response extends BaseResponse implements ResponseInterface
{
    /**
     * Output json with data, error status and http response code
     *
     * @param  mixed   $data
     * @param  array   $error
     * @param  integer $status http response code
     * @return string  json
     */
    public function api($data, $errors = [], $status = 200)
    {
        // make sure that $errors variable always contains an array
        $errors = !is_array($errors) ? [] : $errors;

        // if nothing found by id, return the 404 response
        if (is_null($data)) {
            $status = 404;
            $errors = ['Not found'];
        }

        return static::json(compact('data', 'errors', 'status'));
    }
}
