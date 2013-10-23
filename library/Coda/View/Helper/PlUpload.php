<?php
class Coda_View_Helper_PlUpload extends Zend_View_Helper_Abstract
{
    /**
     * @return Xigen_View_Helper_TwitterBootstrap
     */
    public function plUpload()
    {
        return $this;
    }

    public function enable()
    {
        // Third party script for BrowserPlus runtime (Google Gears included in Gears runtime now)
        $this->view->headScript()->appendFile('http://bp.yahooapis.com/2.4.21/browserplus-min.js');

        // Load our js
        $this->view->headScript()->appendFile('/js/uploader.js');

        // Load plupload and all it's runtimes and finally the jQuery queue widget
        $this->view->headScript()->appendFile('/js/plupload/js/plupload.full.js');
        $this->view->headScript()->appendFile('/js/plupload/js/jquery.plupload.queue/jquery.plupload.queue.js');
        $this->view->headLink()->appendStylesheet('/js/plupload/js/jquery.plupload.queue/css/jquery.plupload.queue.css');

        $this->view->uploader = '<div id="uploader"><p>You browser doesn\'t have Flash, Silverlight, Gears, BrowserPlus or HTML5 support.</p></div>';
    }
}
