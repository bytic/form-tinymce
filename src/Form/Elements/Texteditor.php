<?php

class Nip_Form_Element_Texteditor extends Nip_Form_Element_Textarea
{
    protected $_type = 'texteditor';

    /**
     * @param $request
     * @return $this
     */
    public function getDataFromRequest($request)
    {
        $this->setValue($request);
        $this->filterHTML();
        return $this;
    }

    /**
     * @return $this
     */
    protected function filterHTML()
    {
        $this->setValue($this->getInputFilter()->purify($this->getValue()));
        return $this;
    }
}
