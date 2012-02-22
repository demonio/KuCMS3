<?php

/**
 */
class ContentsController extends AppController 
{
	public function index( $slug='' )
	{
		$page = $this->page = Load::model( 'pages' )->find_first( "conditions: slug='$slug' AND deleted=0" );
		if ( ! $page )
		{
			header( 'HTTP/1.1 404 Not Found' );
			exit( '404' );
		}
		$role = Load::model( 'roles' )->find_first( $page->roles_id );
		
		if ( $role->role == 'member' AND ! empty( $_SESSION['role'] ) ) View::select( '', 'login' );
		
		$area = Load::model( 'areas' )->find_first( $page->areas_id );
		$template = Load::model( 'templates' )->find_first( $area->templates_id );
		
		$this->areas_id = ( $template->template == 'private' ) ? 2 : 1;  
			
		View::template( $template->template );
	}
}
