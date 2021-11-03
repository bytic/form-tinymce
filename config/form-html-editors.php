<?php

return [
    'filters' => [
        'custom' => [],
    ],
    'editor_default' => 'simple',
    'editors' =>
        [
            \ByTIC\Form\HtmlEditors\Editors\AbstractEditor::EDITOR_FULL => [
                'relative_urls' => false
            ],
            \ByTIC\Form\HtmlEditors\Editors\AbstractEditor::EDITOR_SIMPLE => [
                'relative_urls' => false
            ],
            \ByTIC\Form\HtmlEditors\Editors\AbstractEditor::EDITOR_MINI => [
                'relative_urls' => false
            ],
        ]
];
