<?php

function searchUrl(string $page): bool
{
    $resultFile = fopen('result_url.txt', 'w');
    if ($resultFile) {
        $doc = new DOMDocument();
        $doc->loadHTMLFile(trim($page));

        //$xpath = new DOMXpath($doc);

        $tagsA = $doc->getElementsByTagName('a');

        if (isset($tagsA->length)) {
            for ($i = $tagsA->length; --$i >= 0;) {
                $tagA = $tagsA->item($i);
                $href = $tagA->getAttribute('href');
                fwrite($resultFile, $href . "\n");
            }
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
            } else echo 'Smth is wrong! :(';
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    ?>
</h4>
</body>
</html>