<?php

/**
 * Return the user that is authenticated
 * @return \App\Entities\User | Illuminate\Contracts\Auth\Authenticatable
 */
if (! function_exists('currentUser')) {
    function currentUser()
    {
        return auth()->user();
    }
}

/**
 * Converts an array to an object recursively
 * @param array $array
 * @return stdClass
 */
if (! function_exists('toObject')) {
    function toObject(Array $array)
    {
        $object = new stdClass();
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                $value = toObject($value);
            }
            $object->$key = $value;
        }
        return $object;
    }
}

if ( ! function_exists('toRupiah')) {
    function toRupiah($nominal)
    {
        return 'IDR ' . number_format($nominal);
    }
}