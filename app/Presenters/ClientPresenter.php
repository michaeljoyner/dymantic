<?php

namespace Dymantic\Presenters;

class ClientPresenter extends Presenter
{
    private $default = 'images/admin/clients/octo.jpg';
    public function clientImage()
    {
        if(! $this->entity->image_path) {
            return $this->default;
        }

        return $this->entity->image_path;
    }
}
