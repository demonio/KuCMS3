<?php

/**
 */
class PagesController extends AdminController 
{
	public function index( $page='' )
	{
		if ( $page )
		{
			$this->page = Load::model( 'pages' )->noDeleted( $page );
		}
		$this->hooks = Load::model( 'hooks' )->noDeleted();
	}
	
	public function create()
	{
		if ( $_POST )
		{
			$page = Load::model( 'pages' )->saveIt( $_POST );
			_::go( "admin/pages/index/$page->id" );		
		}
		_::go( 'admin/pages' );		
	}	
	
	public function delete( $page )
	{
		Load::model( 'pages' )->deleteIt( $page );
		_::go( 'admin/pages' );		
	}	
}
