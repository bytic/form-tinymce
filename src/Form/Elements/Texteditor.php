<?php

class Nip_Form_Element_Texteditor extends Nip_Form_Element_Textarea
{
    protected $_editorName = 'full';

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

    public function getEditor(): \ByTIC\Form\HtmlEditors\Editors\AbstractEditor
    {
        return form_html_editor($this->getEditorName());
    }

    /**
     * @return $this
     */
    protected function filterHTML()
    {
        $this->setValue($this->getEditor()->clean($this->getValue()));
        return $this;
    }

    /**
     * @return string
     */
    public function getEditorName(): string
    {
        return $this->_editorName;
    }
}
