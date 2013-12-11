<?php

namespace HappyR\SlugifyBundle\Twig;

use HappyR\SlugifyBundle\Services\SlugifyService;

/**
 *
 * Class SlugifyExtension
 *
 * @author Kevin Bond <kevinbond@gmail.com>
 * @author Tobias Nyholm
 *
 *
 */
class SlugifyExtension extends \Twig_Extension
{
    /**
     * @var \HappyR\SlugifyBundle\Services\SlugifyService slugify
     *
     *
     */
    protected $slugify;

    /**
     * @param SlugifyService $slugify
     */
    public function __construct(SlugifyService $slugify)
    {
        $this->slugify = $slugify;
    }

    /**
     * Get twig filters
     *
     *
     * @return array
     */
    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('slugify', array($this, 'slugify')),
        );
    }

    /**
     * Do the actual slugify
     *
     * @param string $text
     *
     * @return string
     */
    public function slugify($text)
    {
        return $this->slugify->slugify($text);
    }

    /**
     *
     * The name
     *
     * @return string
     */
    public function getName()
    {
        return 'happyr_slugify';
    }

}
