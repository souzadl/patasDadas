<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;
use Cake\Network\Exception\InternalErrorException;
use Cake\Utility\Text;
use Cake\ORM\TableRegistry;
use Cake\Core\Configure;

/**
 * Upload component
 */
class UploadComponent extends Component
{
    private $max_files = 3;
    public $fileNames = array();
    

    public function upload($data, $path){
        if(count($data) > $this->max_files){             
            $this->_registry->getController()->Flash
                ->error('Limite de arquivos excedido.');
            return false;
            //return $this->_registry->getController()
            //    ->redirect($this->_registry->getController()->referer());
        }
        //var_dump(count($data));
        //die();
        foreach($data as $file){
            $file_tmp_name = $file['tmp_name'];
            if(trim($file_tmp_name) != ''){     
                $filename = $file['name'];
                $file_ext = substr(strchr($filename,'.'),1);
                $dir = Configure::read('App.wwwRoot').Configure::read('App.imageBaseUrl').$path;
                $type_allowed = array('png','jpg','jpeg','gif');
                if(!in_array($file_ext, $type_allowed)){
                    $this->_registry->getController()->Flash
                        ->error('Tipo de arquivo não permitido: "'.$file['type'].'"');
                    return false;
                    //return $this->_registry->getController()
                    //    ->redirect($this->_registry->getController()->referer());
                }elseif(is_uploaded_file($file_tmp_name)){
                    $filename = Text::uuid().'.'.$file_ext;
                    //$file_db = TableRegistry::get('Images');
                    //$entity = $file_db->newEntity();
                    //$entity->image = $filename;
                    //$file_db->sabe($entity);
                    $this->fileNames[] = $filename;
                    move_uploaded_file($file_tmp_name, $dir.DS.$filename);
                }else{
                    $this->_registry->getController()->Flash
                        ->error('A imagem não pode ser salva. Por favor, tente novamente.');
                    //return $this->_registry->getController()
                    //    ->redirect($this->_registry->getController()->referer());
                    return false;
                }
            }
        }
        //var_dump( $this->fileNames);
        //die;
        //$this->_registry->getController()->Flash
        //    ->success('Imagens salvas.');
        //return $this->_registry->getController()->redirect(['action' => 'index']);
        return true;
    }
}
