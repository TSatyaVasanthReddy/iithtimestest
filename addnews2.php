<?php 

if(!isset($_SESSION['login_user']))
{
#header("location: login.php");
}
if(!isset($_POST['headline']))
{
echo "here";
#header("location: postlogin.php");
}

include 'helperfunctions.php';
session_start();
$upload_dir="uploads";
$unique_id=0;
$timestamp_=0;
$date = date_create();
$timestamp_=date_timestamp_get($date);
$tagid=$_POST['tagid'];
$tagid = preg_replace('/\s+/','',$tagid);
$unique_id=$tagid."_".$timestamp_ ;

$loc=0;
try {
        if (!isset($_FILES["upfile"]['error']) ||is_array($_FILES["upfile"]['error']))
        {
            throw new RuntimeException('Invalid parameters.');
        }
        switch ($_FILES['upfile']['error']) {
            case UPLOAD_ERR_OK:
                break;
            case UPLOAD_ERR_NO_FILE:
                throw new RuntimeException('No file sent.');
            case UPLOAD_ERR_INI_SIZE:
            case UPLOAD_ERR_FORM_SIZE:
                throw new RuntimeException('Exceeded filesize limit.');
            default:
                throw new RuntimeException('Unknown errors.');
        }
        if ($_FILES['upfile']['size'] > 1000000) {
            throw new RuntimeException('Exceeded filesize limit.');
        }
        $finfo = new finfo(FILEINFO_MIME_TYPE);
        if (false === $ext = array_search(
        $finfo->file($_FILES['upfile']['tmp_name']),
            array(
                'jpg' => 'image/jpeg',
                'png' => 'image/png',
                'gif' => 'image/gif',
            ),
            true
        ))
        {
            throw new RuntimeException('Invalid file format.');
        }
          $loc=$upload_dir."/".$unique_id.".".$ext;
      
        if (!move_uploaded_file($_FILES['upfile']['tmp_name'],$loc) )
        {
            throw new RuntimeException('Failed to move uploaded file.');
        }
    
    
        $loc=$upload_dir."/".$unique_id.".".$ext;
        
       # rename($unique_id."_thumb.".$ext, $upload_dir."/".$unique_id."_thumb.".$ext);
        
        if (!isset($_FILES["thupfile"]['error']) ||is_array($_FILES["thupfile"]['error']))
        {
            throw new RuntimeException('Invalid parameters.');
        }
        switch ($_FILES['thupfile']['error']) {
            case UPLOAD_ERR_OK:
                break;
            case UPLOAD_ERR_NO_FILE:
                throw new RuntimeException('No file sent.');
            case UPLOAD_ERR_INI_SIZE:
            case UPLOAD_ERR_FORM_SIZE:
                throw new RuntimeException('Exceeded filesize limit.');
            default:
                throw new RuntimeException('Unknown errors.');
        }
        if ($_FILES['thupfile']['size'] > 1000000) {
            throw new RuntimeException('Exceeded filesize limit.');
        }
        $finfo = new finfo(FILEINFO_MIME_TYPE);
        if (false === $ext = array_search(
            $finfo->file($_FILES['thupfile']['tmp_name']),
            array(
                'jpg' => 'image/jpeg',
                'png' => 'image/png',
                'gif' => 'image/gif',
            ),
            true
        )) {
            throw new RuntimeException('Invalid file format.');
        }

        
        
            $locth=$upload_dir."/".$unique_id."_thumb.".$ext;
            
           # rename($unique_id."_thumb.".$ext, $upload_dir."/".$unique_id."_thumb.".$ext);
        if (!move_uploaded_file($_FILES['thupfile']['tmp_name'],$locth) )
        {
            throw new RuntimeException('Failed to move uploaded file.');
        }





    echo 'File is uploaded successfully.\n';

} catch (RuntimeException $e) {

    echo $e->getMessage();

}
$news_hl=$_POST['headline'];
$news_cat=$_POST['category'];
$news_desc=$_POST['description'];
$news_brief=$_POST['brief'];
$news_id=$unique_id;
$news_timestamp=$timestamp_;
$news_user=$_SESSION['login_user'];
$news_image=$loc;
$news_thimage=$locth;
$conn=connecttodb();
echo $news_cat;
addnews("testtab2",$news_id,$news_hl,$news_brief,$news_desc,$news_image,$news_thimage,$news_user,$news_timestamp,$conn,$news_cat);
echo $news_timestamp;

#header("location: postlogin.php");

?>