<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 4/20/2015
 * Time: 10:32 AM
 */

namespace Dymantic\Presenters;


class SiteBriefPresenter extends Presenter {

    public function hasDomain()
    {
        switch ($this->entity->hasdomain) {
            case 0:
                return 'No, I would like you to do that for me.';
                break;
            case 1:
                return 'No, but we will organise that ourselves';
                break;
            case 2:
                return 'Yes, we already have one';
                break;
            default:
                return 'No valid response';
        }
    }

    public function hasHosting()
    {
        switch ($this->entity->hosting) {
            case 0:
                return 'No, we would like you to do that for me.';
                break;
            case 1:
                return 'No, but we will organise that ourselves';
                break;
            case 2:
                return 'Yes, we already have hosting';
                break;
            default:
                return 'No valid response';
        }
    }

    public function briefAsHtml()
    {
        return '<p class="question">Do you have your own domain?</p>
    <p class="answer">'.$this->hasDomain().'</p>
    <p class="question">Your domain (what you have or want)</p>
    <p class="answer">'.$this->entity->domain_name.'</p>
    <p class="question">Do you have your own hosting?</p>
    <p class="answer">'.$this->hasHosting().'</p>
    <p class="question">Can you describe your current/intended hosting setup?</p>
    <p class="answer">'.$this->entity->hosting_details.'</p>
    <p class="question">What type of website would you like developed?</p>
    <p class="answer">'.$this->entity->sitetype.'</p>
    <p class="question">Additional details on the type of site:</p>
    <p class="answer">'.$this->entity->sitetype_details.'</p>
    <p class="question">How would you like to manage the sites content?</p>
    <p class="answer">'.$this->entity->content_management.'</p>
    <p class="question">Additional details on content management:</p>
    <p class="answer">'.$this->entity->cm_details.'</p>
    <p class="question">What social media interaction would you like on the site?</p>
    <p class="answer">'.$this->entity->socialmedia.'</p>
    <p class="question">What are the definite requirements for the site?</p>
    <p class="answer">'.$this->entity->site_requirements.'</p>
    <p class="question">Is there a certain direction you want the site to go?</p>
    <p class="answer">'.$this->entity->site_direction.'</p>
    <p class="question">What is the target market and average user of your site?</p>
    <p class="answer">'.$this->entity->sitetarget.'</p>';
    }

}