<?php

	class LS_Model_Artist extends Doctrine_Record 
	{
	
	    public function setTableDefinition()
	    {
	        	
	        $this->setTableName('artists');
	        	
	        $this->hasColumn('id', 'integer', 11, array(
	                'type' 			=> 'integer',
	                'fixed' 		=> 0,
	                'unsigned' 		=> true,
	                'primary' 		=> true,
	                'autoincrement' => true,
	                'length' 		=> '11',
	        ));
	    
	        $this->hasColumn('name', 'string', 45, array(
	                'type'				=> 'string',
	                'length' 			=> '45'
	        ));
	    
	    }
	    
	    public function getAlbums()
	    {
	        return Doctrine_Core::getTable('LS_Model_Album')->findBy('artist_id', $this->id);
	    }
	}

?>