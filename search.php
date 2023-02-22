<?php
// Array with names
$dir    = '../htdocs';
$scanDir = scandir($dir,0);
$files = array_diff($scanDir, array('.', '..','index.php','phpinfo.php','search.php'));

// Get the a parameter from URL
$a = $_REQUEST["a"];

$search = "";

// lookup all searchs from array if $a is different from ""
if($a !== "") {
    $a = strtolower($a);
    $len=strlen($a);
    foreach($files as $file) {
        if(stristr($a, substr($file, 0, $len))) {
            $search .= '
            <div class="col-sm-3 pb-4">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-sm-6"><h6 class="card-title text-uppercase">'.$file.'</h6></div>
                            <div class="col-sm-6 text-end"><span>'.date("d-m-Y", filemtime($file)).'</span></div>
                        </div>
                    </div>
                    <div class="card-body">
                        <a href="'.$file.'" class="btn btn-primary btn-sm ">GO TO YOUR PROJECT</a>
                    </div>
                </div>
            </div>';
        }
    }
} else {
    foreach($files as $file) {
        $search .= '
        <div class="col-sm-3 pb-4">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-6"><h6 class="card-title text-uppercase">'.$file.'</h6></div>
                        <div class="col-sm-6 text-end"><span>'.date("d-m-Y", filemtime($file)).'</span></div>
                    </div>
                </div>
                <div class="card-body">
                    <a href="'.$file.'" class="btn btn-primary btn-sm">GO TO YOUR PROJECT</a>
                </div>
            </div>
        </div>';
    }
}
// Out put "No Result" if no search was found or output correct values
echo $search === "" ? "No result" : $search;
?>