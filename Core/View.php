<?php
namespace App\Core;
class View
{
    private $ViewPath;
        function __construct()
        {
            $this->ViewPath=dirname(__DIR__ , 2)."/View/";
            
        }
  public function Show(string $path, array $data = null)
    {   
        if($data!=null)
        foreach ($data as $key => $value) {
            $$key = $value;
        }


        ob_start();
        include $this->ViewPath . "Main.php";
        $main = ob_get_contents();
        ob_end_clean();

        ob_start();
        include $this->ViewPath."layout/" . $path . ".php";
        $content = ob_get_contents();
        ob_end_clean();

        echo str_replace("{{Content}}", $content, $main);
    }

    public function putNavbar(bool $doPut=true)
    {   
        
        
        ob_start();
        include $this->ViewPath . "Main.php";
        $main = ob_get_contents();
        ob_end_clean();

        ob_start();
        include $this->ViewPath."layout/navbar.php";
        $content = ob_get_contents();
        ob_end_clean();

        echo str_replace("{{Content}}", $content, $main);
    }
}
