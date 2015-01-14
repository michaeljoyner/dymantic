<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 12/22/2014
 * Time: 11:43 AM
 */

namespace Dymantic\AjaxFileUploads;


abstract class FileStorer {

    protected  $path = 'useruploads';

    protected  $unique_iterater = 1;

    protected  $prefix;

    function __construct()
    {
        $now = new \DateTime();
        $this->prefix = $now->format('Y/m');
    }


    public function store($file)
    {

        $name = str_replace(' ', '_', $file->getClientOriginalName());
        while($this->fileNameExists($name))
        {
            $name = $this->getUniqueName($name);
        }
        $file->move($this->getFilePath(), $name);

        return $this->path.'/'.$this->prefix.'/'.$name;
    }

    /**
     *
     * @param $name
     * @return bool
     */
    private function fileNameExists($name)
    {
        return file_exists($this->getFilePath() . '/' . $name);
    }

    /**
     * @param $name
     * @internal param $counter
     * @return string
     */
    private function getUniqueName($name)
    {
        $ext_period_pos = strrpos($name, '.');
        $extension = substr($name, $ext_period_pos);
        $name = substr($name, 0, $ext_period_pos) . $this->unique_iterater . $extension;
        $this->unique_iterater++;
        return $name;
    }

    private function getFilePath()
    {
        return public_path().'/'.$this->path.'/'.$this->prefix.'/';
    }
}