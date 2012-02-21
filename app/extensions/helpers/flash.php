<?php

class Flash
{
	public static function show( $name, $text ) { return "<div class=\"$name flash\">" . strip_tags( $text ) . "</div>" . PHP_EOL; }

	public static function error( $text ) { return self::show( 'error',$text ); }

	public static function warning( $text ) { return self::show( 'warning',$text ); }

	public static function info( $text ) { return self::show( 'info',$text ); }
		public static function notice( $text ) { return self::show( 'info',$text ); }

	public static function valid( $text ) { return self::show( 'valid',$text ); }
		public static function success( $text ) { return self::show( 'valid',$text ); }
}
