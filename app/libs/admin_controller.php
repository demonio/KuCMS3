<?php

/** 
 */
class AdminController extends Controller 
{
	protected function initialize()
	{
		if ( empty( $_SESSION['role'] ) ) View::select( '', 'login' );
		else if ( $_SESSION['role'] == 'admin' ) View::template( 'shell' );
	}
	
	public function login()
	{
		if ( $_POST )
		{
			$user = Load::model( 'users' )->login( $_POST );
			if ( $user )
			{
				if ( $user->role == 'admin' ) _::go( '/pages' );
			}
		}
		else
		{
			View::select( '', 'login' );
		}
	}
	
	public function logout()
	{
		Load::model( 'users' )->logout();
		View::select( '', 'login' );
	}
}
