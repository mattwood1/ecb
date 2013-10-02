<?php
class Coda_View_Helper_Currency extends Zend_View_Helper_Abstract
{
    public function currency($value)
    {
        return "&pound;".number_format((float) $value, 2, ".", ",");
    }
}