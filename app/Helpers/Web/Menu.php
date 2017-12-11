<?php

namespace App\Helpers\Web;

use View;
use Route;

class Menu
{
    static $activeRoute;

    private $routeName;
    public $label;
    private $isActive;
    public $children = [];
    private $parent;
    private $isHeader;

    public function __construct( $routeName, $label, $parent = null, $isActive = null )
    {
        $this->routeName = $routeName;
        $this->isActive = $isActive;
        $this->label = $label;
        $this->parent = $parent;
    }

    public function addChild( Menu $child )
    {
        $this->children[] = $child;
        return $this;
    }

    public function setHeader()
    {
        $this->isHeader = true;
    }

    public function isHeader()
    {
        return $this->isHeader;
    }

    public function isActive()
    {
        if( !is_null( $this->isActive ) ) {
            return $this->isActive;
        }

        if( empty( self::$activeRoute ) ) {
            self::$activeRoute = \Route::currentRouteName();
        }

        if( self::$activeRoute == $this->routeName ) {
            $this->markActive();
        }

        return $this->isActive;
    }

    private function markActive()
    {
        if( $this->isActive ) {
            return $this;
        }

        $this->isActive = true;

        if( !empty( $this->parent ) ) {
            $this->parent->markActive();
        }

        return $this;
    }

    public function hasChildren()
    {
        return !empty( $this->children );
    }

    public function getRoute()
    {
        return $this->routeName;
    }

    public function output()
    {
        echo \View::make( 'layouts.admin.menu._element', [ 'item' => $this ] )->render();
    }
}