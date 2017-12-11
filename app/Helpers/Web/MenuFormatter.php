<?php

namespace App\Helpers\Web;

use App\Helpers\Web\Menu;

class MenuFormatter
{
    private static $menuElements;

    private static function getMenu()
    {
        if( empty( self::$menuElements ) ) {
            self::$menuElements = config( 'menu.elements', [] );
        }
    }

    public static function output()
    {
        if( empty( self::$menuElements ) ) {
            self::getMenu();
        }

        foreach( self::$menuElements as $routeName => $data ) {
            self::getElement( $routeName, $data )->output();
        }
    }

    private static function getElement( $routeName, $data, $parent = null ) {

        $label = $data[ 'label' ];

        $el = ( new Menu( $routeName, $label, $parent ) );

        if( !empty( $data[ 'header' ] ) ) {
            $el->setHeader();
            return $el;
        }

        $el->isActive();

        if( empty( $data[ 'children' ] ) ) {
            return $el;
        }

        foreach( $data[ 'children' ] as $routeName => $data ) {
            $child = self::getElement( $routeName, $data, $el );
            $el->addChild( $child );
        }

        return $el;
    }

}
