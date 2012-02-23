<?php

/**
 */
class UsersController extends AdminController 
{
	public function index( $user='' )
	{
		$this->users = Load::model( 'users' )->noDeleted();
		if ( $user )
		{
			$this->user = Load::model( 'users' )->noDeleted( $user );
		}
	}
	
	public function create()
	{
		if ( $_POST )
		{
			$user = Load::model( 'users' )->saveIt( $_POST );
			_::go( "admin/users/index/$user->id" );		
		}
		_::go( 'admin/users' );		
	}	
	
	public function delete( $user )
	{
		Load::model( 'users' )->deleteIt( $user );
		_::go( 'admin/users' );		
	}	
}
