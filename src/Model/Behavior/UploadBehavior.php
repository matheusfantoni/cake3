<?php
namespace App\Model\Behavior;

use Cake\ORM\Behavior;
use Cake\ORM\Table;

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

    public function singleUpload(array $file, $destino){
        echo "UploadBehavior";
        var_dump($file);

        return $this->upload($file, $destino);
        
    }

    protected function upload($file, $destino){
        extract($file);
        if(move_uploaded_file($tmp_name, $destino . $name)){
            return true;
        }else{
            return false;
        }

    }
}
