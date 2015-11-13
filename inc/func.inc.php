<?php
/*	list contents of directory
*		$dir - directory to list contents
*		$sub [boolen] - get contents of sub directories (optional)
*/
function lsDir($directory = null, $sub = false) {
    if($dir = opendir($directory)) {

        $tmp = Array();

        // add the files
        while($file = readdir($dir)) {
			// make sure we're looking at a file
            if($file != "." && $file != ".." && $file[0] != '.') {
                // if a directiry, list all files within it
                if(is_dir($directory . "/" . $file) && $sub == true) {
                    $tmp2 = lsDir($directory . "/" . $file);
                    if(is_array($tmp2)) {
                        $tmp = array_merge($tmp, $tmp2);
                    }
				// make sure not to include folder names, only file names
                } else if(strstr($file,".")) {
                    array_push($tmp, $directory . "/" . $file);
                }
            }
        }
        closedir($dir);
        return $tmp;
    }
}
?>