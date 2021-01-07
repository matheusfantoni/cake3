<?php

namespace App\Model\Behavior;

use Cake\ORM\Behavior;
use Cake\ORM\Table;
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;

/**
 * UploadRed behavior
 */
class UploadRedBehavior extends Behavior
{

    protected $_defaultConfig = [];

    public function uploadImgRed(array $file, $destino, $largura, $altura)
    {
        $this->criarDiretorioImgRed($destino);

        $this->verExtensaoImg($file, $destino, $largura, $altura);
        // return $this->upload($file, $destino);
        return false;
    }

    public function verExtensaoImg(array $file, $destino, $largura, $altura)
    {

        extract($file);
        var_dump($file);
        switch ($type) {
            case 'image/jpeg';
            case 'image/pjpeg';

                echo "Imagem Jpeg";
                break;


            case 'image/png';
            case 'image/x-png';

                echo "Imagem PNG";
                break;
        }
    }

    public function criarDiretorioImgRed($destino)
    {

        $diretorio = new Folder($destino);

        if (is_null($diretorio->path)) {
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

    public function slugUploadImgRed($name)
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
