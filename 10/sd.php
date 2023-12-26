<?php
  error_reporting(E_ERROR | E_PARSE);
  if(sizeof($argv)>1){
    $oldDomain = 'fishable-searches\.000webhostapp\.com';
    $newDomain = $argv[1];
    $idx       = $argv[2];
    $parts = explode('.', $oldDomain);
    $modString1 = "find ./ \( -type d -name .git -prune \) -o -type f -print0 | xargs -0 sed -i 's/$oldDomain/$newDomain/g'";
    @rmdir("converted");
    mkdir("converted");
    exec('cp * converted -r &> /dev/null');
    exec('cp .* converted &> /dev/null');
    chdir('converted');
    echo "\n\nrecursing... one moment...\n\n";
    exec($modString1);
    exec($modString2);
    exec($modString3);
    chdir("..");
    exec("rm -rf ../$idx");
    exec("mv converted ../$idx");
    echo "\n\nconversion complete. updated contents moved into \"../$idx ($newDomain)\"\n\n";
  }
?>
