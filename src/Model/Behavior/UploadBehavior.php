<?php

namespace App\Model\Behavior;

use Cake\ORM\Behavior;
use Cake\ORM\Table;
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;

/**
 * Upload behavior
 */
class UploadBehavior extends Behavior
{
    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    public function singleUpload(array $file, $destino)
    {
        $this->criarDiretorio($destino);

        return $this->upload($file, $destino);
    }

    public function criarDiretorio($destino){

        $diretorio = new Folder($destino);

        if(is_null($diretorio->path)){
            $diretorio->create($destino);
        }
    }

    protected function upload($file, $destino)
    {
        extract($file);
        //$name = $this->slug($name);
        if (move_uploaded_file($tmp_name, $destino . $name)) {
            return $name;
        } else {
            return false;
        }
    }

    public function slugSingleUpload($name)
    {

        $formato['a'] = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜüÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿRr"!@#$%&*()_-+={[}]/?;:,\\\'<>°ºª';
        $formato['b'] = 'aaaaaaaceeeeiiiidnoooooouuuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr                                ';
        $name = strtr(utf8_decode($name), utf8_decode($formato['a']), $formato['b']);
        $name = str_replace(' ', '-', $name);

        $name = str_replace(['-----', '----', '---', '--'], '-', $name);

        $name = strtolower($name);

        return $name;
    }
}
