<?php
class Coda_View_Helper_FormEmail extends Zend_View_Helper_FormElement
{
    public function formEmail($name, $value = null, $attribs = null)
    {
        $html .= '<input type="email" id="'.$name.'" name="'.$name.'" value="'.$value.'" />';

        return $html;
    }
}