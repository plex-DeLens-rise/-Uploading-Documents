<?

function all_docs_install($id) ///Получение пути раздела
{
    $dir = $id;
    $f = scandir($dir); ///Получение массива файлов в директории
    $st=0;
    foreach ($f as $file){ ///Перебираем полученные файлы
        if(substr($file, 0, 1)!="@"&&substr($file, 0, 1)!="." &&substr($file, 0, 1)!="~" &&substr($file, 0, 6)!="Thumbs" && $id!=null) ///Фильтруем, исключая системные файлы
        {
                $filepath=$dir.'/'.$file; ///Путь к файлу
                $image = file_get_contents($filepath); ///Получение всей строки из файла
                $result[$st]= array( urldecode(basename($file)), base64_encode($image) ) ; ///Записываем в массив наименование файла и его содержимое
                $st++;

        }

    }
    return $result; ///Возвращаем массив с полученным результатом
}

?>
