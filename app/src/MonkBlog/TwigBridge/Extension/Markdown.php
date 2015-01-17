<?php namespace MonkBlog\TwigBridge\Extension;

use Twig_Extension;
use Twig_SimpleFunction;
use GrahamCampbell\Markdown\Markdown as Md;

class Markdown extends Twig_Extension
{
    /**
     * @var \GrahamCampbell\Markdown\Markdown
     */
    protected $md;

    /**
     * Create a new md extension.
     *
     * @param \GrahamCampbell\Markdown\Markdown $md
     */
    public function __construct(Md $md)
    {
        $this->md = $md;
    }

    /**
     * {@inheritDoc}
     */
    public function getName()
    {
        return 'MonkBlog_TwigBridge_Extension_Markdown';
    }

    /**
     * {@inheritDoc}
     */
    public function getFunctions()
    {
        return [
            new Twig_SimpleFunction('md_render', [$this->md, 'render']),
        ];
    }
}