<?php
/**
 * Created by PhpStorm.
 * User: marek
 * Date: 9/30/17
 * Time: 11:40 AM
 */

class ButtonPage
{
    private $howElement = null;
    public function __construct($howElement)
    {
        $this->howElement = $howElement;
    }

    public function getButton($countElement, $newStart)
    {
        echo '<div id="limit">'.$this->generateLeftButton($newStart).$this->generateRightButton($countElement, $newStart).'</div>';
    }

    private function generateLeftButton($start)
    {
        $tmpCode = '<form id="left">';
        if($start == $this->howElement)
        {
            $tmpCode .= '<button><i class="demo-icon icon-left-big"></i></button>';
        }
        else if($start != null)
        {
            $tmpCode .= '<input type="hidden" name="page" value="'.($start -$this->howElement).
                '"><button><i class="demo-icon icon-left-big"></i></button>';
        }else
        {
            $tmpCode .= '';
        }
        return $tmpCode.'</form>';
    }

    private function generateRightButton($count, $start = 0)
    {
        if(($start + $this->howElement) < $count)
        {
            return '<form id="right"><input type="hidden" name="page" value="'.($start + $this->howElement).
                '"><button><i class="demo-icon icon-right-big"></i></button></form>';
        }
    }
}