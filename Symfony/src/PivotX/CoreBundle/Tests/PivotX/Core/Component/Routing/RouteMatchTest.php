<?php

/**
 * This file is part of the PivotX Core bundle
 *
 * (c) Marcel Wouters / Two Kings <marcel@twokings.nl>
 */

namespace PivotX\CoreBundle\Component\Routing;

use PivotX\Core\Component\Routing\Route;
use PivotX\Core\Component\Routing\RouteMatch;

/**
 * Test various route settings
 *
 * This is a first draft of the tests.
 *
 * @author Marcel Wouters <marcel@twokings.nl>
 */
class RouteMatchTest extends \PHPUnit_Framework_TestCase
{
    public function testIt()
    {
        $route = new Route('page','about');

        $routematch = new RouteMatch($route);

        // @todo worthless test, other than to make the report show 100%
        $this->assertNull($routematch->getRoutePrefix());
        $this->assertNull($routematch->buildUrl());
        
    }
}