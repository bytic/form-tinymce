<?php

return [
    'filters' => [
        'custom' => [],
    ],
    'editor_default' => 'simple',
    'editors' =>
        [
            \ByTIC\Form\HtmlEditors\Editors\AbstractEditor::EDITOR_FULL,
            \ByTIC\Form\HtmlEditors\Editors\AbstractEditor::EDITOR_SIMPLE,
            \ByTIC\Form\HtmlEditors\Editors\AbstractEditor::EDITOR_MINI,
        ]
];
