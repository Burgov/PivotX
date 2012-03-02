<?php

/**
 * This file is part of the PivotX Core bundle
 *
 * (c) Marcel Wouters / Two Kings <marcel@twokings.nl>
 */

namespace PivotX\Core\Component\Routing;

use PivotX\Core\Component\Referencer\Reference;

/**
 * Route describes a PivotX route.
 *
 * @author Marcel Wouters <marcel@twokings.nl>
 *
 * @api
 */
class Route
{
    /**
     * Entity used
     */
    private $entity = false;

    /**
     * Entity filter
     */
    private $efilter = false;

    /**
     * Entity filter pattern
     */
    private $efilter_pattern = false;

    /**
     * If the rntity filter pattern compiled
     */
    private $efilter_compiled = false;

    /**
     * Public url
     */
    private $url = false;

    /**
     * Public url as regex pattern
     */
    private $url_pattern = false;

    /**
     * If the pattern has been compiled
     */
    private $url_compiled = false;

    /**
     * Set the requirements
     */
    private $requirements = array();

    /**
     * Set the defaults
     */
    private $defaults = array();

    /**
     * Set the options
     */
    private $options = array();

    /**
     * Route filter
     */
    private $filter = false;

    /**
     * Constructor.
     *
     * @param string $name          name of the target
     * @param string $description   friendly description
     */
    public function __construct($entity_filter, $url, array $requirements = array(), array $options = array())
    {
        $this->setEntityAndFilter($entity_filter);
        $this->setUrl($url);
        $this->setRequirements($requirements);
        $this->setOptions($options);
    }

    /**
     * Set entity and filter
     *
     * This method implements a fluent interface.
     *
     * @param string $entity_filter The entity and filter
     */
    public function setEntityAndFilter($entity_filter)
    {
        if (strpos($entity_filter,'/') === false) {
            $entity = $entity_filter;
            $filter = false;
        }
        else {
            list($entity,$filter) = explode('/',$entity_filter,2);
        }

        $this->entity  = $entity;
        $this->efilter = $filter;

        $this->efilter_compiled = false;

        return $this;
    }

    /**
     * Get the entity
     *
     * @return string entity
     */
    public function getEntity()
    {
        return $this->entity;
    }

    /**
     * Get the filter
     *
     * @return mixed filter or false if none defined
     */
    public function getEntityFilter()
    {
        return $this->efilter;
    }

    /**
     * Set the url
     *
     * This method implements a fluent interface.
     *
     * @param string $url The url
     */
    public function setUrl($url)
    {
        $this->url = $url;

        $this->url_compiled = false;

        return $this;
    }

    /**
     * Compile this entity filter to a regex pattern
     *
     * This method implements a fluent interface.
     */
    public function compileEFilter()
    {
        $reqs = array();
        foreach($this->requirements as $k => $v) {
            $reqs[$k] = '(?P<' . substr($k,1,-1) . '>' . $v . ')';
        }

        $efilter_pattern = strtr($this->efilter,$reqs);

        if ($efilter_pattern != $this->efilter) {
            // @todo can't always be '#'
            $this->efilter_pattern = '#^' . $efilter_pattern . '$#';
        }

        $this->efilter_compiled = true;

        return $this;
    }

    /**
     * Compile this URL to a regex pattern
     *
     * This method implements a fluent interface.
     */
    public function compileUrl()
    {
        $reqs = array();
        foreach($this->requirements as $k => $v) {
            $reqs[$k] = '(?P<' . substr($k,1,-1) . '>' . $v . ')';
        }

        $url_pattern = strtr($this->url,$reqs);

        if ($url_pattern != $this->url) {
            // @todo can't always be '#'
            $this->url_pattern = '#^' . $url_pattern . '$#';
        }

        $this->url_compiled = true;

        return $this;
    }

    /**
     * Set requirements
     *
     * This method implements a fluent interface.
     *
     * @param array $requirements The requirements
     */
    public function setRequirements(array $requirements = array())
    {
        $this->requirements = $requirements;

        return $this;
    }

    /**
     * Set options
     *
     * This method implements a fluent interface.
     *
     * @param array $options The options
     */
    public function setOptions(array $options = array())
    {
        $this->options = $options;

        return $this;
    }

    /**
     * Get options
     *
     * @return array The options
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * Set the filter
     *
     * This method implements a fluent interface.
     *
     * @param array $filter The filter
     */
    public function setFilter(array $filter = array())
    {
        $this->filter = $filter;

        return $this;
    }

    /**
     * Get the filter
     *
     * @return array The filter
     */
    public function getFilter()
    {
        return $this->filter;
    }

    /**
     * Try to match a filter to this prefix
     *
     * Filter to match is always a simplified filter.
     *
     * @param array $filter  Simplified filter to match against
     */
    public function matchFilter(array $filter)
    {
        $keys = array('site', 'target', 'language');

        foreach($keys as $key) {
            if ($filter[$key] !== false) {
                if (!in_array($filter[$key],$this->filter[$key])) {
                    return false;
                }
            }
        }

        return true;
    }

    /**
     * Match URL
     *
     * @param array $filter File to match
     * @param string $url   URL to match
     * @return array        array with matching arguments if matched, false if not matched
     */
    public function matchUrl($filter, $url)
    {
        if ($this->url_compiled === false) {
            $this->compileUrl();
        }

        if ($this->matchFilter($filter)) {
            if ($this->url_pattern !== false) {
                //echo 'pattern['.$this->url_pattern.']'."\n";
                if (preg_match($this->url_pattern,$url,$matches)) {
                    $arguments = array();
                    foreach($this->requirements as $k => $v) {
                        $k2 = substr($k,1,-1);
                        if (isset($matches[$k2])) {
                            $arguments[$k2] = $matches[$k2];
                        }
                    }
                    foreach($this->defaults as $k => $v) {
                        $k2 = substr($k,1,-1);
                        if (!isset($arguments[$k2])) {
                            $arguments[$k2] = $v;
                        }
                    }
                    return new RouteMatch($this,$arguments);
                }
            }
            else if ($this->url == $url) {
                return new RouteMatch($this);
            }
        }

        return false;
    }

    /**
     * Match Reference
     *
     * @param array $filter        File to match
     * @param Reference $reference Reference to match
     * @return RouteMatch          A RouteMatch object or null if not matched
     */
    public function matchReference($filter, Reference $reference)
    {
        if ($this->efilter_compiled === false) {
            $this->compileEFilter();
        }

        $efilter = $reference->getFilter();

        if ($this->matchFilter($filter)) {
            if ($this->efilter_pattern !== false) {
                //echo 'pattern['.$this->efilter_pattern.']'."\n";
                if (preg_match($this->efilter_pattern,$efilter,$matches)) {
                    $arguments = array();
                    foreach($this->requirements as $k => $v) {
                        $k2 = substr($k,1,-1);
                        if (isset($matches[$k2])) {
                            $arguments[$k2] = $matches[$k2];
                        }
                    }
                    foreach($this->defaults as $k => $v) {
                        $k2 = substr($k,1,-1);
                        if (!isset($arguments[$k2])) {
                            $arguments[$k2] = $v;
                        }
                    }
                    return new RouteMatch($this,$arguments);
                }
            }
            else if ($this->efilter == $efilter) {
                return new RouteMatch($this);
            }
        }

        return false;
    }
}
