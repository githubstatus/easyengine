<?php

if ( posix_geteuid() ) {
	fwrite( STDERR, "\033[1;31mError:\033[0m Please run `ee` with root privileges." );
	exit( 1 );
}

// Can be used by plugins/themes to check if EE is running or not
define( 'EE', true );
define( 'EE_VERSION', trim( file_get_contents( EE_ROOT . '/VERSION' ) ) );
define( 'EE_START_MICROTIME', microtime( true ) );
define( 'EE_CONF_ROOT', '/opt/easyengine' );
define( 'EE_PROXY_TYPE', 'ee-nginx-proxy' );

if ( file_exists( EE_ROOT . '/vendor/autoload.php' ) ) {
	define( 'EE_VENDOR_DIR', EE_ROOT . '/vendor' );
} elseif ( file_exists( dirname( dirname( EE_ROOT ) ) . '/autoload.php' ) ) {
	define( 'EE_VENDOR_DIR', dirname( dirname( EE_ROOT ) ) );
} else {
	define( 'EE_VENDOR_DIR', EE_ROOT . '/vendor' );
}

require_once EE_ROOT . '/php/bootstrap.php';
\EE\bootstrap();
