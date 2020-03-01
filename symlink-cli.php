<?php
/**
 * Symlink cli script.
 * 
 * @package Symlink
 * @version 1.0.0
 * @author Thapelo Moeti
 * @license MIT
 */


require_once 'symlink.php';

/* because the first arg always points to this file */
array_shift( $argv );

// Lets avoid duplications
$argv = array_unique( $argv );

$ROOTPATH = 'c:\dev\wp-loci\plugins\3rd-plugins';

$sym = new Symlink( $ROOTPATH );

echo "Starting Symlink v1.0.0\n\n";

// loop through passed args
foreach( $argv as $link ) {
    if( $sym->create_link( $link ) ) {
        echo "\nCreated link: {$link}";
    } else {
        echo "\nCan't create link: {$link}";
    }
}

echo "\n\nEnd of Symlink...";
