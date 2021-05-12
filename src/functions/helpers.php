<?php

use ByTIC\Form\HtmlEditors\Editors\AbstractEditor;
use ByTIC\Form\HtmlEditors\Frameworks\AbstractFramework\AbstractFramework;
use ByTIC\Form\HtmlEditors\Frameworks\FrameworksManager;

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

if (!function_exists('form_html_editors')) {
    /**
     * @return AbstractEditor[]
     */
    function form_html_editors(): array
    {
        $container = \Nip\Container\Utility\Container::get();

        /** @var \ByTIC\Form\HtmlEditors\EditorsManager $manager */
        $manager = $container->get(\ByTIC\Form\HtmlEditors\EditorsManager::class);

        return $manager->editors();
    }
}

if (!function_exists('form_html_framework')) {
    /**
     * @param null $name
     * @return AbstractFramework
     */
    function form_html_framework($name = null): AbstractFramework
    {
        $container = \Nip\Container\Utility\Container::get();

        /** @var FrameworksManager $manager */
        $manager = $container->get(FrameworksManager::class);

        return $manager->framework($name);
    }
}

if (!function_exists('form_html_view_init')) {
    function form_html_view_init(): string
    {
        $editors = form_html_editors();

        return form_html_view_render('view_init', ['editors' => $editors]);
    }
}

if (!function_exists('form_html_view_render')) {
    /**
     * @param $file
     * @return false|string|null
     */
    function form_html_view_render($file, $params)
    {
        $path = dirname(dirname(__DIR__)) . '/resources/views/' . $file . '.php';
        if (!file_exists($path)) {
            return null;
        }
        extract($params);

        ob_start();
        include $path;

        return ob_get_clean();
    }
}
