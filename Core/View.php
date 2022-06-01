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
        
        $main = $this->get_ob('Main');
        $content = $this->get_ob( $path,"layout",$data);

       echo  $this->putReplace('{{Content}}', $content,$main);
      
    }
    
    
  

 

    public function get_ob(string $path ,string $file=''  ,$data=null)
    {   
        if($data!=null)
        foreach ($data as $key => $value) {
            $$key = $value;
        }

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
