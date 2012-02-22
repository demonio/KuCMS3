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
	
	/*
	 * SOLO PARA INSTALAR EL CMS, DESPUES DEBE BORRARSE EL INSTALLER CONTROLLER
	 */
	public function createAdmin()
	{
		$this->delete( "user='admin'" );
		$this->user = 'admin'; 
		$this->pass = md5( 'nimda' . $this->salt );
		$this->role = 'admin'; 
		$this->deleted = '0';
		$this->create();
		$_SESSION['flash'][] = Flash::valid( "User admin with pass nimda created!" );
	}
}
