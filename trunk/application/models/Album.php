<?php

	class LS_Model_Album extends Doctrine_Record 
	{
	
	    public function setTableDefinition()
	    {
	        	
	        $this->setTableName('albums');
	        	
	        $this->hasColumn('id', 'integer', 11, array(
	                'type' 			=> 'integer',
	                'fixed' 		=> 0,
	                'unsigned' 		=> true,
	                'primary' 		=> true,
	                'autoincrement' => true,
	                'length' 		=> '11',
	        ));
	    
	        $this->hasColumn('artist_id', 'integer', 11, array(
	                'type'				=> 'integer',
	                'length' 			=> '11'
	        ));
	    
	        $this->hasColumn('title', 'string', 45, array(
	                'type'				=> 'string',
	                'length' 			=> '45'
	        ));
	    
	    }
	}

?>