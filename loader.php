<?php

$file_name = "./cache/cache.php";

$cache = false;

if( $cache )
{
    
    $fp = fopen( $file_name , "w" );
    fwrite( $fp , "<?php\n\n");

    function loadFiles( $path , $fp )
    {



        $dir = scandir($path);

        foreach( $dir as $k => $v )
        {
            if( $v != "." && $v != ".."  && $v != ".git")
            {
                 if( !is_dir(   $path . $v ) )
                {
                     $content  = file_get_contents($path . $v);
                     $content  = str_replace("<?php", "", $content);
                     $content  = str_replace("?>", "", $content);
                     fwrite($fp, $content . "\n");
                     //require_once  $path . $v;
                }
                else{
                    loadFiles($path . $v . "/" , $fp);
                }
            }


        }





    }

    loadFiles( "./pods/core/" , $fp);
    loadFiles( "./pods/visper/", $fp);
    loadFiles( "./pods/patterns/", $fp);

    loadFiles( "./pods/features/home/", $fp);
    fclose($fp);


}

 require_once $file_name;



