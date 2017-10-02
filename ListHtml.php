<?php
/**
 * Created by PhpStorm.
 * User: marek
 * Date: 10/2/17
 * Time: 5:25 PM
 */

class ListHtml
{
    private $list;
    private $listStart;

    public function __construct($listStart)
    {
        $this->list = '<'.$listStart.'>';
        $this->listStart = $listStart;
    }

    public function elementList($element)
    {
        $this->list = $this->list.'<li>'.$element.'</li>';
    }

    public function getList()
    {
        return $this->list.'</'.$this->listStart.'>';
    }
}
?>