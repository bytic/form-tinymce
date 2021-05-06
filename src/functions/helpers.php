<?php

use ByTIC\Form\HtmlEditors\Editors\AbstractEditor;

if (!function_exists('form_html_editor')) {
    /**
     * @param null $name
     * @return AbstractEditor
     */
    function form_html_editor($name = null): AbstractEditor
    {
        $container = \Nip\Container\Utility\Container::get();

        /** @var \ByTIC\Form\HtmlEditors\EditorsManager $manager */
        $manager = $container->get(\ByTIC\Form\HtmlEditors\EditorsManager::class);

        return $manager->editor($name);
    }
}

if (!function_exists('form_html_filter')) {
    /**
     * @param null $name
     * @return HTMLPurifier
     */
    function form_html_filter($name = null): HTMLPurifier
    {
        $container = \Nip\Container\Utility\Container::get();

        /** @var \ByTIC\Form\HtmlEditors\Filters\FilterManager $manager */
        $manager = $container->get(\ByTIC\Form\HtmlEditors\Filters\FilterManager::class);

        return $manager->filter($name);
    }
}
