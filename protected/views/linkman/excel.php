<html xmlns:x="urn:schemas-microsoft-com:office:excel">
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
            <table x:str border=1>
<?php 
    $name = 'contact';
//    header("Content-type: text/html; charset=utf-8"); 
    header('Content-type: application/vnd.ms-excel');
    header('Content-Disposition: filename='.$name.'.xls');
    header('Cache-Control: max-age=0');
    $data = $options['dataProvider']->getData();
    $field = $options['dataProvider']->model->attributeDownLoadLabels();
    unset($field['checkbox']);
    foreach($field as $f){
        echo '<th>'.$f . '</th>';
    }
    foreach($data as $k=>$d){
        echo '<tr>';
        foreach($field as $key=>$f){
            $keys = explode('.', $key);
//            var_dump($keys);
            if(isset($keys[1])){
                echo '<td>'.$d->$keys[0]->$keys[1] . '</td>';
            }else
                echo '<td>'.$d[$key] . '</td>';
        }
        echo '</tr>';
    }
   
    
?>
    </table>
</html>