<?php
ini_set('display_errors', 'Off');

function searchUrl(string $page): bool
{
    $resultFile = fopen('result_url.html', 'w');
    if ($resultFile) {
        $doc = new DOMDocument();
        $doc->loadHTMLFile(trim($page));
        $k1 = stristr(trim($page), '.', true); //ссылка до точки домена
        $k2 = stristr(trim($page), '.'); //ссылка, начиная с точки в домене
        $k3 = stristr($k2, '/', true); //домен
        $domName = $k1 . $k3;
        //echo $domName . "\n";
        $tagsA = $doc->getElementsByTagName('a');

        if (isset($tagsA->length)) {
            fwrite($resultFile, '<!DOCTYPE html>' . "\n");
            fwrite($resultFile, '<body>' . "\n");
            for ($i = $tagsA->length; --$i >= 0;) {
                $tagA = $tagsA->item($i);
                $href = $tagA->getAttribute('href');
                if ($href !== '#' && $href !== ' ' && $href !== '' && $href !== '/') {
                    fwrite($resultFile, '<a href="' . $href . '">' . $href . '</a><br>' . "\n");
                }
                if ($href[0] === '/') {
                    fwrite($resultFile, '<a href="' . $domName . $href . '">' . $domName . $href . '</a><br>' . "\n");
                }
            }
            fwrite($resultFile, '</body>' . "\n");
            fclose($resultFile);
            return true;
        } else throw new Exception('There are no links on the page.');
    } else throw new Exception('Result file was not created/opened.');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tasks PHP Part 2. Task 1</title>
</head>
<body>
<h3>Введите страницу, данные которой хотите спарсить.</h3>
<form action="" method="post" id="parser">
    <label for="input_page"></label><label>
        <input type="text" name="input_page" required>
    </label>
    <input type="submit" value="Парсить">
</form>
<h4>
    <?php
    if (isset($_POST['input_page'])) {
        try {
            if(searchUrl($_POST['input_page'])) {
                echo 'Success!';
    ?><a href="result_url.html">Посмотреть результат</a> <?php
            } else echo 'Smth is wrong! :(';
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    ?>
</h4>
</body>
</html>