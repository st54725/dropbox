<?php

class Upload extends Zend_Db_Table_Abstract
{
    protected $_name = 'upload';

    public function getFiles($userid)
    {
        $db = new Upload();
        return $db->fetchAll('user_id='.$userid);
    }

    public function Uploadfile($filename,$size,$id,$downloadlink)
    {
        $table = new Upload();
        $data = array(
            'filename' => $filename,
            'size' => $size,
            'user_id' => $id,
            'downloadlink' => $downloadlink,
        );
        $table->insert($data);
    }
}