<?php

class Users extends ActiveRecord
{
	private $salt = ' your salt';

	protected function enter( $user, $pass )
	{
		if ( ! preg_match( '/[\d\w _-]+/i', $user ) )
		{
			return $_SESSION['flash'][] = Flash::valid( "Only numbers, words and/or spaces in username!" );
		}
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
	
	public function saveIt( $post )
	{
		$post['deleted'] = '0';
		$post['pass'] = md5( $post['pass'] . $this->salt );
		if ( $this->check( 'user', $post['user'] ) )
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
