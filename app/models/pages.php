<?php

class Pages extends ActiveRecord
{
	public function saveIt( $post )
	{
		$post['deleted'] = '0';
		$levels = explode( '.', $post['weight'] );
		$post['level1'] = $levels[0];
		$post['level2'] = $levels[1];
		$post['level3'] = $levels[2];
		$post['slug'] = strtolower( preg_replace( '/[^\d|\w]/', '-', $post['slug'] ) );
	
		if ( $this->check( 'slug', $post['slug'] ) )
		{
			$this->update( $post );
			$_SESSION['flash'][] = Flash::warning( 'Item updated!' );
		}
		else
		{
			$this->create( $post );
			$_SESSION['flash'][] = Flash::warning( 'Item created!' );			
		}
		return $this;
	}
}
