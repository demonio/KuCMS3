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
		$this->roles = Load::model( 'roles' )->noDeleted();
	}
	
	public function create()
	{
		if ( $_POST )
		{
			$page = Load::model( 'pages' )->saveIt( $_POST );
			_::go( "/pages/index/$page->id" );		
		}
		_::go( '/pages' );		
	}	
	
	public function delete( $page )
	{
		Load::model( 'pages' )->deleteIt( $page );
		_::go( '/pages' );		
	}	
}
