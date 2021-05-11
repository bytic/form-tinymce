<?php

class Nip_Form_Renderer_Elements_Texteditor extends Nip_Form_Renderer_Elements_Textarea
{
    protected $_editorClass = 'full';

    /**
     * @inheritDoc
     */
    public function generateElement()
    {
        if (!$this->getElement()->getAttrib('id')) {
            $this->getElement()->setAttrib('id', $this->getElement()->getAttrib('name'));
            $this->getElement()->setDataAttrib('editor-name', $this->_editorClass);
        }
        $return = parent::generateElement();
        return $return;
    }

    /**
     * @inheritDoc
     */
    public function getElementAttribs()
    {
        $attribs = parent::getElementAttribs();
        return $attribs;
    }
}
