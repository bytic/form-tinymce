<?php

/**
 * Class Nip_Form_Renderer_Elements_Texteditor
 *
 * @method Nip_Form_Element_Texteditor getElement()
 */
class Nip_Form_Renderer_Elements_Texteditor extends Nip_Form_Renderer_Elements_Textarea
{
    /**
     * @inheritDoc
     */
    public function generateElement()
    {
        if (!$this->getElement()->getAttrib('id')) {
            $this->getElement()->setAttrib('id', $this->getElement()->getAttrib('name'));
            $this->getElement()->setDataAttrib('editor-name', $this->getElement()->getEditorName());
        }
        return parent::generateElement();
    }
}
