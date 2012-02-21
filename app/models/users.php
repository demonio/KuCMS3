<?php

class Users extends ActiveRecord
{
	private $salt = ' from consulintel';

	protected function enter( $user, $pass )
	{		
		$pass = md5( $pass . $this->salt );
		return $this->find_first( "conditions: user='$user' AND pass='$pass' AND deleted=0" );
	}
	
	public function login( $post )
	{
		$user = $this->enter( $post['user'], $post['pass'] );
		
		if ( $user )
		{
			$_SESSION['role'] = $user->role;
			$_SESSION['flash'][] = Flash::valid( "Welcome!" );
			return $user;
		}
		$_SESSION['flash'][] = Flash::warning( 'The form data is not valid!' );
	}
	
	public function logout()
	{
		$_SESSION = array();
		$_SESSION['flash'][] = Flash::valid( "See you!" );
	}
}
