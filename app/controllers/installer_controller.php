<?php

/**
 */
class InstallerController extends AppController 
{
	public function admin()
	{
		Load::model( 'users' )->createAdmin();
		View::select( '', 'login' );
	}
}
