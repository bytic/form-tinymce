<?php

namespace ByTIC\Form\HtmlEditors\Tests\Filters;

use ByTIC\Form\HtmlEditors\Filters\FilterManager;
use ByTIC\Form\HtmlEditors\Tests\AbstractTest;
use HTMLPurifier;

/**
 * Class FilterManagerTest
 * @package ByTIC\Form\HtmlEditors\Tests\Filters
 */
class FilterManagerTest extends AbstractTest
{
    public function test_filter()
    {
        $manager = new FilterManager();
        $filter = $manager->filter('full');

        self::assertInstanceOf(HTMLPurifier::class, $filter);
    }

    public function test_filter_make_once()
    {
        $manager = \Mockery::mock(FilterManager::class)->shouldAllowMockingProtectedMethods()->makePartial();
        $manager->shouldReceive('make')->once();

        $manager->filter('full');
        $manager->filter('full');
        $manager->filter('full');
    }
}
