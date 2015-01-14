<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 1/6/2015
 * Time: 1:25 PM
 */

namespace Dymantic\Presenters;


class GeneralBriefPresenter extends Presenter {

    public function emailInfo()
    {
        $markup = '<h2 style="text-align:center;">';
        $markup .= '<span style="color:#F2842E;">'.$this->entity->contact_person.'</span>';
        if($this->entity->company != '')
        {
            $markup .= ' from '.'<span style="color:#F2842E;">'.$this->entity->company.'</span>';
        }
        $markup .= ' has submitted a brief.</h2>';
        $markup .= '<h3 style="text-align:center;color:#6FCCE2;">Here is a bit about us</h3>';

        if($this->entity->since != '' && $this->entity->industry != '')
        {
            $markup .= '<p>We have been operating in the <span style="color:#F2842E;">'.$this->entity->industry.'</span> industry since <span style="color:#F2842E;">'.$this->entity->since.'</span></p>';
        }

        if($this->entity->since != '' && $this->entity->industry == '')
        {
            $markup .= '<p>We have been operating since <span style="color:#F2842E;">'.$this->entity->since.'</span></p>';
        }

        if($this->entity->since == '' && $this->entity->industry != '')
        {
            $markup .= '<p>We operate in the <span style="color:#F2842E;">'.$this->entity->industry.'</span> industry</p>';
        }

        if($this->entity->background != '')
        {
            $markup .= '<p><span style="color:#F2842E;">A little about our background:</span> '.$this->entity->background.'</p>';
        }

        if($this->entity->reaction != '')
        {
            $markup .= '<p><span style="color:#F2842E;">Who we are targeting and what reaction we hope to achieve:</span> '.$this->entity->reaction.'</p>';
        }

        if($this->entity->nutshell != '')
        {
            $markup .= '<p><span style="color:#F2842E;">This is us in a nutshell:</span> '.$this->entity->nutshell.'</p>';
        }

        if($this->entity->current_website != '')
        {
            $markup .= '<p>Our current website is <a href="'.$this->entity->current_website.'">'.$this->entity->current_website.'</a></p>';
        }

        return $markup;

    }

}