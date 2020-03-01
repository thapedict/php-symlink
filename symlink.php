<?php
/**
 * Symlink main class.
 * 
 * @package Symlink
 * @version 1.0.0
 * @author Thapelo Moeti
 * @license MIT
 */


/**
 * Main class
 */
class Symlink {
    /**
     * The path to root directory.
     */
    var $rootDir;

    /**
     * The current working directory.
     */
    var $currentDir;

    /**
     * Initialize the class.
     * 
     * @param string $root The path for to the root.
     */
    public function __construct( $root ) {
        if( ! is_dir($root) ) {
            throw new Exception('Invalid root path');
        }

        if( ! is_writable( getcwd() ) ) {
            throw new Exception('Can\'t write to current directory');
        }
 
        $this->rootDir = realpath($root);
        $this->currentDir = getcwd();
    }

    /**
     * Function to create the actual link
     * 
     * @param string $name The symlink name.
     * 
     * @return bool True when the link can be created, false on failure.
     */
    public function create_link( $name ) {
        $fullname = $this->rootDir . DIRECTORY_SEPARATOR . $name;
        $linkname = $this->currentDir . DIRECTORY_SEPARATOR . $name;

        if( ! file_exists($fullname)) {
            trigger_error('File/Folder doesn\'t exist');
            return false;
        }

        return symlink( $fullname, $linkname );
    }

    /**
     * Clear the cache
     */
    public function __destruct() {
        clearstatcache();
    }
}