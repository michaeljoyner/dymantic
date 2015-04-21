<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 4/20/2015
 * Time: 11:25 AM
 */

namespace Dymantic\Presenters;


class TaskPresenter extends Presenter {

    public function statusWithIcon()
    {
        switch ($this->entity->status) {
            case "Underway":
                return '<span id="status-icon" class="fa fa-rocket"></span><span> <strong>Status: </strong><span id="task-status">'.$this->entity->status.'</span> </span>';
                break;
            case "Ongoing":
                return '<span id="status-icon" class="fa fa-cog"></span><span> <strong>Status: </strong><span id="task-status">'.$this->entity->status.'</span> </span>';
                break;
            case "Waiting on client":
                return '<span id="status-icon" class="fa fa-spinner"></span><span> <strong>Status: </strong><span id="task-status">'.$this->entity->status.'</span> </span>';
                break;
            case "Almost done":
                return '<span id="status-icon" class="fa fa-smile-o"></span><span> <strong>Status: </strong><span id="task-status">'.$this->entity->status.'</span> </span>';
                break;
            case "Aborted":
                return '<span id="status-icon" class="fa fa-thumbs-down"></span><span> <strong>Status: </strong><span id="task-status">'.$this->entity->status.'</span> </span>';
                break;
            case "Complete":
                return '<span id="status-icon" class="fa fa-check-circle"></span><span> <strong>Status: </strong><span id="task-status">'.$this->entity->status.'</span> </span>';
                break;
            default:
                return '<span id="status-icon" class="fa fa-check"></span><span> <strong>Status: </strong><span id="task-status">'.$this->entity->status.'</span> </span>';
        }
    }

}