<?php
/**
 * Created by PhpStorm.
 * User: Tim'sMac
 * Date: 11/19/2016
 * Time: 6:03 AM
 */

namespace AppBundle\Service;


use Knp\Bundle\MarkdownBundle\MarkdownParserInterface;
use Doctrine\Common\Cache\Cache;

class MarkdownTransformer
{
    private $markdownParser;
    private $cache;

    public function __construct(MarkdownParserInterface $markdownParser, Cache $cache)
    {
        $this->markdownParser = $markdownParser;
        $this->cache = $cache;
    }

    public function parse($str){


        $cache = $this->cache;
        $key = md5($str);
        if ($cache->contains($key)) {
            return $cache->fetch($key);
        }
        sleep(1);
        $str = $this->markdownParser
            ->transformMarkdown($str);
        $cache->save($key, $str);
        return $str;
    }
}