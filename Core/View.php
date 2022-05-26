<?php
namespace Core;
class View
{
    private $ViewPath;
    function __construct()
    {
        $this->ViewPath=dirname(__DIR__ )."/View/";
    }
  public function Show(string $path, array $data = null )
    {   
        if($data!=null)
        foreach ($data as $key => $value) {
            $$key = $value;
            // echo'kay '.$$key;
            // // var_dump($value);
            // echo"<br>";
           
        }
        $list=$data;
        $main = $this->get_ob('Main');
        $content = $this->get_ob( $path,"layout");
        $m4 = $this->get_ob( '_404',"layout");

           $this->putReplace('{{top}}', $m4,$main);
       echo  $this->putReplace('{{Content}}', $content,$main);
      
    }
    
    
  

 

    public function get_ob(string $path ,string $file='' )
    {   

        ob_start();
        include $this->ViewPath. $file."/".$path.".php";
        $layout = ob_get_contents();
        ob_end_clean();
        return $layout;
    }
    public function putReplace(string $placeholder, string $content, string $where)
    {   
        return str_replace($placeholder, $content,$where);
    }
}
