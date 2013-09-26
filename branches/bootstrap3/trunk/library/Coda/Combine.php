<?php
/**
 * Combines a set of files into a single one.
 * Very useful for merging CSS and JS files together before sending to the browser as we
 * save on expensive HTTP request
 *
 * @author david@xigen.co.uk
 */
class Coda_Combine
{
    /**
     * The files to combine
     *
     * @var array
     */
    protected $_files = array();

    /**
     * Set the files to combine
     *
     * @param array $files
     */
    public function setFiles(array $files)
    {
        foreach (array_unique($files) as $file) {
            $info[] = array('file' => $file, 'mtime' => filemtime($file));
        }

        $this->_files = $info;
    }

    /**
     * Check to see if this combine file already exists
     *
     * @return bool|string
     */
    public function fileExists()
    {
        return file_exists($this->_getFilename()) ? $this->_getFilename() : false;
    }

    /**
     * Save the combined file to disk and return filename
     *
     * @return string
     */
    public function save()
    {
        $content = '';

        foreach ($this->_files as $file) {
            $content .= '/* ' . $file['file'] . ' */' . PHP_EOL;
        }

        foreach ($this->_files as $file) {
            $content .= file_get_contents($file['file']) . PHP_EOL;
        }

        $filename = $this->_getFilename();

        $fp = fopen($filename, 'w');
        fputs($fp, $content);
        fclose($fp);

        return $filename;
    }

    /**
     * Get the full filepath to the combined file
     *
     * @return string
     */
    protected function _getFilename()
    {
        $fileKey = md5(serialize($this->_files));
        return realpath(APPLICATION_PATH . '/../public/cachedAssets') . '/' . $fileKey . '.' . $this->_getType();
    }

    /**
     * Get the file type (extension) for this combined file
     *
     * @throws Exception
     * @return string
     */
    protected function _getType()
    {
        if (! isset($this->_files[0])) {
            throw new Xigen_Exception('There are no files to combine.');
        }

		$exploded = explode('.', $this->_files[0]['file']);
        return end( $exploded );
    }
}
