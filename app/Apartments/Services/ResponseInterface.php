<?php namespace Apartments\Services;

/**
 * Implement this interface to have a consistent api output
 */
interface ResponseInterface
{
    public function api($data, $status = 'success', $code = 200);
}
