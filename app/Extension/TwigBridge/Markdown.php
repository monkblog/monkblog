<?php

namespace MonkBlog\Extension\TwigBridge;

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
    public function __construct(Md $md)
    {
        $this->md = $md;
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'MonkBlog_Extension_TwigBridge_Markdown';
    }

    /**
     * {@inheritdoc}
     */
    public function getFunctions()
    {
        return [
            new Twig_SimpleFunction('md_render', [$this->md, 'defaultTransform']),
        ];
    }
}
