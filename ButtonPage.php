<?php
/**
 * Created by PhpStorm.
 * User: marek
 * Date: 9/30/17
 * Time: 11:40 AM
 */

class ButtonPage
{
    public function getButton($countElement, $newStart)
    {
        echo '<div id="limit">'.$this->generateLeftButton($newStart).$this->generateRightButton($countElement, $newStart).'</div>';
    }

    private function generateLeftButton($start)
    {
        $tmpCode = '<form id="left">';
        if($start == 10)
        {
            $tmpCode .= '<button><i class="demo-icon icon-left-big"></i></button>';
        }
        else if($start != null)
        {
            $tmpCode .= '<input type="hidden" name="page" value="'.($start -10).
                '"><button><i class="demo-icon icon-left-big"></i></button>';
        }else
        {
            $tmpCode .= '';
        }
        return $tmpCode.'</form>';
    }

    private function generateRightButton($count, $start = 0)
    {
        if(($start + 10) < $count)
        {
            return '<form id="right"><input type="hidden" name="page" value="'.($start + 10).
                '"><button><i class="demo-icon icon-right-big"></i></button></form>';
        }
    }
}