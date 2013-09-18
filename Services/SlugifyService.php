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
     * @var URLify $urlify
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


    /**
     * Transliterates characters to their ASCII equivalents.
     *
     * @param string $text
     * @param string $language
     *
     * @return mixed
     */
    public function downcode($text, $language = ""){
        return $this->urlify->downcode($text, $language);
    }

    /**
     * Filters a string, e.g., "Petty theft" to "petty-theft"
     *
     * @param string $text
     * @param int $length
     * @param string $language
     * @param bool $fileName
     *
     * @return string
     */
    public function filter($text, $length = 60, $language = "", $fileName = false){
        return $this->urlify->filter($text, $length, $language, $fileName);
    }


    /**
     * Alias of filter
     *
     * @param string $text
     *
     * @return string
     */
    public function slugify($text){
        return $this->filter($text);
    }

    /**
     * Alias of downcode
     *
     * @param string $text
     *
     * @return mixed
     */
    public function transliterate($text){
        return $this->urlify->transliterate($text);
    }
}
