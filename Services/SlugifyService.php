<?php
namespace HappyR\SlugifyBundle\Services;

use URLify;

/**
 * Class Slugifier
 *
 * @author Tobias Nyholm
 *
 * Class to make a string more beautiful
 */
class SlugifyService
{
    /**
     * @var \URLify urlify
     *
     *
     */
    protected $urlify;

    /**
     * @param URLify $urlify
     */
    public function __construct(URLify $urlify)
    {
        $this->urlify = $urlify;
    }



    public function downcode($text, $language = ""){
        return $this->urlify->downcode($text, $language);
    }

    public function filter($text, $length = 60, $language = "", $file_name = false){
        return $this->urlify->filter($text, $length, $language, $file_name);
    }

    public function slugify($text){
        return $this->filter($text);
    }

    public function transliterate($text){
        return $this->urlify->transliterate($text);
    }
}
