<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 4/20/2015
 * Time: 10:20 PM
 */

namespace Dymantic\Presenters;


class PrintBriefPresenter extends Presenter {

    public function briefAsHtml()
    {
        return '<p class="question">What are you after?</p>
    <p class="answer">'.$this->entity->printdesc.'</p>
    <p class="question">Where and how will it be used?</p>
    <p class="answer">'.$this->entity->printuse.'</p>
    <p class="question">What are the specifics?</p>
    <p class="answer">'.$this->entity->printspecifics.'</p>
    <p class="question">Is there a certain direction you want to see it go in? Any specific ideas or imagery?</p>
    <p class="answer">'.$this->entity->printdirection.'</p>
    <p class="question">What written content will it include?</p>
    <p class="answer">'.$this->entity->printtext.'</p>
    <p class="question">Are there any restrictions or unique requests?</p>
    <p class="answer">'.$this->entity->printrestrictions.'</p>
    <p class="question">Is there a particular colour scheme you want to use?</p>
    <p class="answer">'.$this->entity->printcolour.'</p>
    <p class="question">Will you be requiring printing?</p>
    <p class="answer">'.($this->entity->printprint === 1 ? 'Yes' : 'No').'</p>
    <p class="question">What are your final requirements?</p>
    <p class="answer">'.$this->entity->printrequirements.'</p>';
    }

}