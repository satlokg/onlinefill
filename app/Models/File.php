<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable=[
    	"filename",'project_id','user_id'
    ];
    static function generateFile($filepath=NULL){ 
        $USER_PATH=public_path()."/upload_file/";
        //dd($USER_PATH);
        if($filepath){
            if(!is_dir($USER_PATH)) mkdir($USER_PATH,0777);
            if(!is_dir(dirname($filepath))) mkdir(dirname($filepath),0777,1);
            $fileinfo = pathinfo($filepath); 
            $suffix = 1;
            while(is_file($filepath)) $filepath = dirname($filepath) . "/" . self::sanitize($fileinfo['filename']) . "_" . $suffix++ . "." . $fileinfo['extension']; 
            
            return $filepath;
        }
    }

    static function generateFilename($filepath=NULL){ 
        $USER_PATH=public_path()."/upload_file/";
        //dd($USER_PATH);
        if($filepath){
            if(!is_dir($USER_PATH)) mkdir($USER_PATH,0777);
            
            $fileinfo = pathinfo($filepath); 
            $suffix = 1;
            while(is_file($filepath)) $filepath = dirname($filepath) . "/" . self::sanitize($fileinfo['filename']) . "_" . $suffix++ . "." . $fileinfo['extension']; 
            
            return $filepath;
        }
    }
    
    
    static function sanitize($string, $force_lowercase = true, $anal = false) {
        $strip = array("~", "`", "!", "@", "#", "$", "%", "^", "&", "*", "(", ")", "_", "=", "+", "[", "{", "]",
                       "}", "\\", "|", ";", ":", "\"", "'", "&#8216;", "&#8217;", "&#8220;", "&#8221;", "&#8211;", "&#8212;",
                       "—", "–", ",", "<", ">", "/", "?");
        $clean = trim(str_replace($strip, "", strip_tags($string)));
        $clean = preg_replace('/\s+/', "-", $clean);
        $clean = ($anal) ? preg_replace("/[^a-zA-Z0-9]/", "", $clean) : $clean ;
        return ($force_lowercase) ? (function_exists('mb_strtolower')) ? mb_strtolower($clean, 'UTF-8') : strtolower($clean) : $clean;
    }
    
    public function project(){

    	return $this->belongsTo(Project::class);
    }
}
