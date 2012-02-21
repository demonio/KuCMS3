<?php
/**
 * ActiveRecord
 *
 * Esta clase es la clase padre de todos los modelos
 * de la aplicacion
 *
 * @category Kumbia
 * @package Db
 * @subpackage ActiveRecord
 */

// Carga el active record
Load::coreLib('kumbia_active_record');

class ActiveRecord extends KumbiaActiveRecord
{
	public function byFk( $fk, $id, $order='' )
	{
		if ( $order ) $order = "order: $order";

		return $this->find( "conditions: $fk='$id' AND deleted=0", $order );	
	}
	
	public function check( $field, $value )
	{		
		return $this->find_first( "conditions: $field='$value' AND deleted=0" );	
	}	

	public function deleteIt( $page )
	{
		$this->find( $page );
		$this->deleted = 1;
		$this->update();
	}
	public function noDeleted( $conditions='' )
	{
		if ( is_numeric( $conditions ) ) return $this->find_first( "conditions: id=$conditions AND deleted=0" );
		else if ( $conditions ) return $this->find( "conditions: $conditions AND deleted=0" );
		else return $this->find( "conditions: deleted=0" );
	}
}
