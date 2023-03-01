

 <?php

spl_autoload_register(function ($sclass) {
    // tiep dau ngu khong gian ten
    // cac lop trong du an se su dung tiep dau ngu nay cho khong gian ten 
    $prefix='CT275\\Labs\\';
    // thu muc co so ung voi tiep dau ngu khong gian ten
    $base_dir=__DIR__ . '/src/';

    $len=strlen($prefix);
    if(strncmp($prefix, $sclass, $len) !==0 ){
        return;
    }

    $relative_class = substr($sclass, $len);

    $file=$base_dir . str_replace('\\','/',$relative_class)  . '.php';

    if(file_exists($file)){
        require $file;
    }

});

?>
