<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 4/21/2015
 * Time: 2:04 PM
 */

namespace Dymantic\Presenters;


class TaskFilePresenter extends Presenter {

    public function fileAsHtmlView()
    {
        if (! file_exists(public_path() . '/' . $this->entity->filepath))
        {
            return '';
        }
        if ($this->fileIsImage($this->entity->filepath))
        {
            return '<img src="/' . $this->entity->filepath . '" width="150" height="150"><p>' . $this->getNameFromFilePath($this->entity->filepath). '</p>';
        }
        return '<a href="/'.$this->entity->filepath.'" target="_blank" download><img src="/images/document-icon.png" width="150" height="150"></a><p>'.$this->getNameFromFilePath($this->entity->filepath).'</p>';
    }

    private function getNameFromFilePath($filepath)
    {
        return substr($filepath, strrpos($filepath, '/')+1);
    }

    private function fileIsImage($filename)
    {
        $imageTypes = [
            'png',
            'svg',
            'jpg',
            'jpeg',
            'gif'
        ];
        $extension = substr($filename, strrpos($filename, '.')+1);

        return in_array($extension, $imageTypes);

    }

}