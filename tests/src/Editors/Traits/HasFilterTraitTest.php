<?php

namespace ByTIC\Form\HtmlEditors\Tests\Editors\Traits;

use ByTIC\Form\HtmlEditors\EditorsManager;
use ByTIC\Form\HtmlEditors\Tests\AbstractTest;

/**
 * Class HasConfigurationTraitTest
 * @package ByTIC\Form\HtmlEditors\Tests\Editors\Traits
 */
class HasFilterTraitTest extends AbstractTest
{
    /**
     * @param $type
     * @param $output
     * @dataProvider data_clean
     */
    public function test_clean($type, $output)
    {
        $manager = new EditorsManager();
        $editor = $manager->editor($type);


        self::assertSame(
            str_replace("\r\n", "\n", file_get_contents($output)),
            str_replace("\r\n", "\n", $editor->clean( file_get_contents(TEST_FIXTURE_PATH . '/html/boilerplate/input.html')))
        );
    }

    public function data_clean(): array
    {
        return [
            ['full', TEST_FIXTURE_PATH . '/html/boilerplate/output_full.html'],
            ['mini', TEST_FIXTURE_PATH . '/html/boilerplate/output_mini.html'],
            ['simple', TEST_FIXTURE_PATH . '/html/boilerplate/output_simple.html'],
        ];
    }
}