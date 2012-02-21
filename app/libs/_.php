<?php

/**
 */
class _
{
	/**
	 * REDIRECCION
	 */
	static public function go( $url )
	{
		exit( "<script>location='$url'</script>" );
	}
	
	/**
	 * COMPARA Y RETORNA SELECTED
	 */
	static public function sel( $a, $b )
	{
		if ( $a == $b ) return ' selected="selected"';
	}
	static public function esel( $a, $b ) { echo _::sel( $a, $b ); }
	
	/**
	 * MUESTRA ALGO
	 */
	static public function show( $x='' )
	{
		if ( $x )
		{
			$s = print_r( $x, 1 );
			$s = htmlspecialchars( $s, ENT_QUOTES );
			echo "<meta charset=\"utf-8\" /><pre>$s</pre>";
		}
		ob_flush();
		flush();
	}
	
	/**
	 * PARA Y MUESTRA
	 */
	static public function stop( $x )
	{
		die( _::show( $x ) );
	}
}
