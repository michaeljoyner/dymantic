<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 4/20/2015
 * Time: 10:57 AM
 */

namespace Dymantic\Presenters;


class LogoBriefPresenter extends Presenter {

    public function hasExistingLogo()
    {
        switch ($this->entity->haslogo) {
            case 0:
                return 'No, we don\'t';
                break;
            case 1:
                return 'Yes, we do.';
                break;
            default:
                return 'No valid response';
        }
    }

    public function briefAsHtml()
    {
        return '<p class="question">Do you have an existing logo?</p>
    <p class="answer">'.$this->hasExistingLogo().'</p>
    <p class="question">Do you have a colour scheme you want the logo to follow?</p>
    <p class="answer">'.$this->entity->logocolours.'</p>
    <p class="question">Is the a certain direction you want your logo to go in?</p>
    <p class="answer">'.$this->entity->logodirection.'</p>
    <p class="question">Are there any restrictions?</p>
    <p class="answer">'.$this->entity->logorestrictions.'</p>
    <p class="question">What are your final requirements?</p>
    <p class="answer">'.$this->entity->logorequirements.'</p>';
    }
}