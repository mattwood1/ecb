<?php

    class Coda_Pdf
    {
    
        protected $_wkhtmltopdf_path = '';

        protected $_dpi = 600;

        protected $_margin_right  = 0 ; // horrible hack to resolve margin issue
        protected $_margin_left   = 0;
        protected $_margin_top    = 0;
        protected $_margin_bottom = 0;

        protected $_body = '';
        protected $_proc_Resource = null;

        public function __construct( $wkhtmltopdf_path )
        {
            if( file_exists( $wkhtmltopdf_path ) && is_executable( $wkhtmltopdf_path ) ) {
            
                $this->_wkhtmltopdf_path = $wkhtmltopdf_path;
            }
            else {
            
                throw new InvalidArgumentException("'{$wkhtmltopdf_path}' not found or is not executable.");
            }
        }

        public function setBody( $body )
        {
            $this->_body = $body;
        }

        public function appendBody( $body )
        {
            $this->_body .= $body;
        }

        public function generate()
        {
            if( $this->_body ) {

                return $this->_generatePdf();         
            }
            else {
            
                throw new Exception("Unable to generate PDF, no document body defined.");
            }
        }

        protected function _generatePdf()
        {
    	    $descriptors = array(
                0   =>  array('pipe', 'r'),
                1   =>  array('pipe', 'w'),
                2   =>  array('pipe', 'w')
            );

            $command = sprintf( 
                '%s --quiet --dpi %d --margin-right %d --margin-top %d --margin-bottom %d --margin-left %d - -',
                $this->_wkhtmltopdf_path,
                $this->_dpi,
                $this->_margin_right,
                $this->_margin_top,
                $this->_margin_bottom,
                $this->_margin_left
            );

            $process = proc_open( $command, $descriptors, $pipes, APPLICATION_PATH );
            $pdf = null;

            if( is_resource( $process ) ) {
            
                // write body and close stdin
                fwrite( $pipes[0], $this->_body );
                fclose( $pipes[0] );
               
                // read pdf
                $pdf = stream_get_contents( $pipes[1] );

                // close stdout/stderror
                fclose( $pipes[1] );
                fclose( $pipes[2] );

                // clean up 
                proc_close( $process );
            }
            
            return $pdf;
        }

    }

?>
