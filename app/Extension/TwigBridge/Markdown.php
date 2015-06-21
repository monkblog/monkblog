<?php namespace MonkBlog\Extension\TwigBridge;

use Twig_Extension;
use Twig_SimpleFunction;
use Michelf\Markdown as Md;

class Markdown extends Twig_Extension
{
    /**
     * @var \Michelf\Markdown
     */
    protected $md;

    /**
     * Create a new md extension.
     *
     * @param \Michelf\Markdown $md
     */
    public function __construct( Md $md )
    {
        $this->md = $md;
    }

    /**
     * {@inheritDoc}
     */
    public function getName()
    {
        return 'MonkBlog_Extension_TwigBridge_Markdown';
    }

    /**
     * {@inheritDoc}
     */
    public function getFunctions()
    {
        return [
            new Twig_SimpleFunction( 'md_render', [ $this->md, 'defaultTransform' ] ),
        ];
    }
}