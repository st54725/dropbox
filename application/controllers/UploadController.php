<?php
class UploadController extends Zend_Controller_Action
{
    public function indexAction()
    {

        $request = $this->getRequest();
        $auth		= Zend_Auth::getInstance();
        if(!$auth->hasIdentity()){
            $this->_redirect('/index');
        }

        $auth		= Zend_Auth::getInstance();
        $username	= $auth->getIdentity()->username;
        $registrationModel = new Registration();
        $userid = $registrationModel->getId($username);
        $userid = $userid['id'];
        $uploadModel = new Upload();
        $files = $uploadModel->getFiles((int)$userid);

        $this->view->content = $files;
    }

    public function logoutAction()
    {
        $auth = Zend_Auth::getInstance();
        $auth->clearIdentity();
        $this->_redirect('/index');
    }


    public function uploadAction()
    {
        $allowedExts = array("gif", "jpeg", "jpg", "png");
        $temp = explode(".", $_FILES["file"]["name"]);
        $extension = end($temp);
        if ((($_FILES["file"]["type"] == "image/gif")
            || ($_FILES["file"]["type"] == "image/jpeg")
            || ($_FILES["file"]["type"] == "image/jpg")
            || ($_FILES["file"]["type"] == "image/pjpeg")
            || ($_FILES["file"]["type"] == "image/x-png")
            || ($_FILES["file"]["type"] == "image/png"))
            && ($_FILES["file"]["size"] < 200000000000000)
            && in_array($extension, $allowedExts))
        {
            if ($_FILES["file"]["error"] > 0)
            {
                $content = "Return Code: " . $_FILES["file"]["error"] . "<br>";
            }
            else
            {
                if (file_exists($_SERVER['DOCUMENT_ROOT']. "files/" . $_FILES["file"]["name"]))
                {
                    $content = $_FILES["file"]["name"] . " already exists. ";
                }
                else
                {
                    move_uploaded_file($_FILES["file"]["tmp_name"],
                        $_SERVER['DOCUMENT_ROOT']. "files/" . $_FILES["file"]["name"]);
                    $content =  "Successfull uploaded! </br> Filename : " . $_FILES["file"]["name"];
                }
            }
        }
        else
        {
            $content = "File wasn't uploaded.Invalid file!";
        }

        $filename = $_FILES["file"]["name"];
        $size = ($_FILES["file"]["size"] / 1024);
        $uploadModel = new Upload();
        $registrationModel = new Registration();
        $auth		= Zend_Auth::getInstance();
        $username	= $auth->getIdentity()->username;
        $id = $registrationModel->getId($username);
        $downloadlink = "http://".$_SERVER['HTTP_HOST']."/files/" . $_FILES["file"]["name"];
        $uploadModel->Uploadfile($filename,$size,$id['id'],$downloadlink);

        $this->view->content = $content;

    }

}