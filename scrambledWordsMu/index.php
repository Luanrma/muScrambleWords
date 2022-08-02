

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scramble Words MU</title>
</head>
<body style="margin: 2rem 2rem 2rem 2rem">
    <h2>Scramble Words MU</h2>
    <form style="margin-bottom: 2rem" action="./" method="post">
        <input type="text" name="scrambedWord">
        <button type="submit">Enviar</button>
    </form>
    <input type="text" id="word"/>
    <button onclick="saveWord()" type="button">Gravar</button>
    
</body>
<script>
    async function saveWord() {
        let word = document.getElementById('word').value

        if (word != '' && confirm("Deseja mesmo gravar")) {
            await fetch('./muScrambleFile.php?word=' + word)
        }
    }
</script>
</html>

<?php
if (isset($_POST['scrambedWord'])) {
    unscrambleWords(strtolower($_POST['scrambedWord']));
}

function unscrambleWords(string $scrambedWord) {
    $wordsList = explode("\n", strtolower(file_get_contents('./muScramble.txt')));
    $wordSearch = count_chars($scrambedWord, 1);
    
    echo "<ul style=font-size:30px;>";
    foreach($wordsList as $word) {
        if ($wordSearch === count_chars($word, 1)) {
            echo "<li style='margin: 0 0 0.5rem 0';>" . $word . "</li>";
        }
    }
    echo "</ul>";
}
?>