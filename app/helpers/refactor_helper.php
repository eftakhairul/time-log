<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Refactor Helper
 *
 * @author Eftakhairul Islam <eftakhairul@gmail.com>
 */
if ( ! function_exists('eliminateNullField'))
{
    function eliminateNullField($data)
    {
        foreach($data AS $key => $value) {
            if (empty($value)) unset($data["{$key}"]);
        }

        return $data;
    }
}