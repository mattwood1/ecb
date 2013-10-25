<?php
/**
 * Scales or crops images, and saves them back to disk
 */
class Coda_Image_Resizer
{
    /**
     * @var resource
     */
    protected $_image;

    /**
     * @var int
     */
    protected $_width;

    /**
     * @var int
     */
    protected $_height;

    /**
     * @var resource
     */
    protected $_imageResized;

    /**
     * @param string $filepath
     */
    public function __construct($filepath)
    {
        // *** Open up the file
        $this->_image = $this->_openImage($filepath);

        // *** Get width and height
        $this->_width  = imagesx($this->_image);
        $this->_height = imagesy($this->_image);
    }

    /**
     * Create a new image resource from an existing file
     *
     * @param string $file
     * @return resource
     */
    protected function _openImage($file)
    {
        // *** Get extension
        $extension = strtolower(strrchr($file, '.'));

        switch($extension)
        {
            case '.jpg':
            case '.jpeg':
                $img = @imagecreatefromjpeg($file);
                break;
            case '.gif':
                $img = @imagecreatefromgif($file);
                break;
            case '.png':
                $img = @imagecreatefrompng($file);
                break;
            default:
                $img = false;
                break;
        }

        return $img;
    }

    /**
     * Resize the source image to a maximum height/width
     * Using in mode "auto" will scale the image, maintaining the image proportions
     *
     * @param int $newWidth
     * @param int $newHeight
     * @param string [$option]
     */
    public function resizeImage($newWidth, $newHeight, $option = 'auto')
    {
        // *** Get optimal width and height - based on $option
        $optionArray = $this->_getDimensions($newWidth, $newHeight, $option);

        $optimalWidth  = $optionArray['optimalWidth'];
        $optimalHeight = $optionArray['optimalHeight'];

        // *** Resample - create image canvas of x, y size
        $this->_imageResized = imagecreatetruecolor($optimalWidth, $optimalHeight);
        imagecopyresampled($this->_imageResized, $this->_image, 0, 0, 0, 0, $optimalWidth, $optimalHeight, $this->_width, $this->_height);

        // *** if option is 'crop', then crop too
        if ($option == 'crop') {
            $this->_crop($optimalWidth, $optimalHeight, $newWidth, $newHeight);
        }

        return $this;
    }

    /**
     * Get the dimensions of the image resource after applying the scale
     *
     * @param int $newWidth
     * @param int $newHeight
     * @param string $option
     * @return array
     */
    protected function _getDimensions($newWidth, $newHeight, $option)
    {
       switch ($option) {
            case 'exact':
                $optimalWidth = $newWidth;
                $optimalHeight= $newHeight;
                break;
            case 'portrait':
                $optimalWidth = $this->_getSizeByFixedHeight($newHeight);
                $optimalHeight= $newHeight;
                break;
            case 'landscape':
                $optimalWidth = $newWidth;
                $optimalHeight= $this->_getSizeByFixedWidth($newWidth);
                break;
            case 'auto':
                if ($this->_width < $newWidth && $this->_height < $newHeight) {
                    $optimalWidth = $this->_width;
                    $optimalHeight = $this->_height;
                    break;
                }

                $optionArray = $this->_getSizeByAuto($newWidth, $newHeight);
                $optimalWidth = $optionArray['optimalWidth'];
                $optimalHeight = $optionArray['optimalHeight'];
                break;
            case 'crop':
                $optionArray = $this->_getOptimalCrop($newWidth, $newHeight);
                $optimalWidth = $optionArray['optimalWidth'];
                $optimalHeight = $optionArray['optimalHeight'];
                break;
        }

        return array('optimalWidth' => $optimalWidth, 'optimalHeight' => $optimalHeight);
    }

    /**
     * @param int $newHeight
     * @return int
     */
    protected function _getSizeByFixedHeight($newHeight)
    {
        $ratio = $this->_width / $this->_height;
        $newWidth = $newHeight * $ratio;
        return $newWidth;
    }

    /**
     * @param int $newWidth
     * @return int
     */
    protected function _getSizeByFixedWidth($newWidth)
    {
        $ratio = $this->_height / $this->_width;
        $newHeight = $newWidth * $ratio;
        return $newHeight;
    }

    /**
     * @param int $newWidth
     * @param int $newHeight
     * @return array
     */
    protected function _getSizeByAuto($newWidth, $newHeight)
    {
        if ($this->_height < $this->_width)
        // *** Image to be resized is wider (landscape)
        {
            $optimalWidth = $newWidth;
            $optimalHeight= $this->_getSizeByFixedWidth($newWidth);
        }
        elseif ($this->_height > $this->_width)
        // *** Image to be resized is taller (portrait)
        {
            $optimalWidth = $this->_getSizeByFixedHeight($newHeight);
            $optimalHeight= $newHeight;
        }
        else
        // *** Image to be resizerd is a square
        {
            if ($newHeight < $newWidth) {
                $optimalWidth = $newWidth;
                $optimalHeight= $this->_getSizeByFixedWidth($newWidth);
            } else if ($newHeight > $newWidth) {
                $optimalWidth = $this->_getSizeByFixedHeight($newHeight);
                $optimalHeight= $newHeight;
            } else {
                // *** Sqaure being resized to a square
                $optimalWidth = $newWidth;
                $optimalHeight= $newHeight;
            }
        }

        return array('optimalWidth' => $optimalWidth, 'optimalHeight' => $optimalHeight);
    }

    /**
     * @param int $newWidth
     * @param int $newHeight
     * @return array
     */
    protected function _getOptimalCrop($newWidth, $newHeight)
    {

        $heightRatio = $this->_height / $newHeight;
        $widthRatio  = $this->_width /  $newWidth;

        if ($heightRatio < $widthRatio) {
            $optimalRatio = $heightRatio;
        } else {
            $optimalRatio = $widthRatio;
        }

        $optimalHeight = $this->_height / $optimalRatio;
        $optimalWidth  = $this->_width  / $optimalRatio;

        return array('optimalWidth' => $optimalWidth, 'optimalHeight' => $optimalHeight);
    }

    /**
     * @param int $optimalWidth
     * @param int $optimalHeight
     * @param int $newWidth
     * @param int $newHeight
     */
    protected function _crop($optimalWidth, $optimalHeight, $newWidth, $newHeight)
    {
        // *** Find center - this will be used for the crop
        $cropStartX = ( $optimalWidth / 2) - ( $newWidth /2 );
        $cropStartY = ( $optimalHeight/ 2) - ( $newHeight/2 );

        $crop = $this->_imageResized;
        //imagedestroy($this->_imageResized);

        // *** Now crop from center to exact requested size
        $this->_imageResized = imagecreatetruecolor($newWidth , $newHeight);
        imagecopyresampled($this->_imageResized, $crop , 0, 0, $cropStartX, $cropStartY, $newWidth, $newHeight , $newWidth, $newHeight);
    }

    /**
     * Save the file to the filesystem
     *
     * @param string $savePath
     * @param int $imageQuality
     */
    public function save($savePath, $imageQuality = 90)
    {
        // *** Get extension
        $extension = strrchr($savePath, '.');
        $extension = strtolower($extension);

        switch($extension) {
            case '.jpg':
            case '.jpeg':
                if (imagetypes() & IMG_JPG) {
                    imagejpeg($this->_imageResized, $savePath, $imageQuality);
                }
                break;

            case '.gif':
                if (imagetypes() & IMG_GIF) {
                    imagegif($this->_imageResized, $savePath);
                }
                break;

            case '.png':
                // *** Scale quality from 0-100 to 0-9
                $scaleQuality = round(($imageQuality/100) * 9);

                // *** Invert quality setting as 0 is best, not 9
                $invertScaleQuality = 9 - $scaleQuality;

                if (imagetypes() & IMG_PNG) {
                     imagepng($this->_imageResized, $savePath, $invertScaleQuality);
                }
                break;

            default:
                // *** No extension - No save.
                break;
        }

        imagedestroy($this->_imageResized);

        return true;
    }
}