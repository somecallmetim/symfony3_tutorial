<?php
/**
 * Created by PhpStorm.
 * User: Tim'sMac
 * Date: 11/19/2016
 * Time: 11:33 AM
 */

namespace AppBundle\Twig;

use AppBundle\Service\MarkdownTransformer;

class MarkdownExtension extends \Twig_Extension
{
    private $markdownTransformer;

    public function __construct(MarkdownTransformer $markdownTransformer)
    {
        $this->markdownTransformer = $markdownTransformer;
    }

    public function parseMarkdown($str)
    {
        return $this->markdownTransformer->parse($str);
    }

    public function getName(){
        return 'app_markdodwn';
    }

    public function getFilters()
    {
        return [
            new \Twig_SimpleFilter('markdownify', array($this, 'parseMarkdown'), [
                'is_safe' => ['html']
            ])
        ];
    }
}