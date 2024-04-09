<style>code#highlight { font-family: monospace; }

        code#highlight ol { color: #c4c1ba; }

            code#highlight ol li { border-left: 3px solid #1da625; }

                code#highlight ol li:nth-child(odd) { background-color: #eee; }

                code#highlight ol li p {
                    display:inline;
                    color: #414141;
                    margin-left: 10px; }</style>

                    <?php
/**
 * Basic Syntax Highlighter 0.1
 *
 * @author Diego Saint Esteben <me@dii3g0.com.ar>
 *
 * @param string    $code    The code
 *
 * @return string
 */
function syntaxHighlighter($code)
{
    static $output, $replacements, $chunks;

    $output = "<code id='highlight'><ol>";

    //Elimina espacios en blanco al principio y al final del $code
    $code = trim($code);

    //Es un archivo PHP??
    if(substr($code, 0, 5) == '<?php' || substr($code, 0, 2) == '<?')
    {
        //Colorea el codigo y elimina la etiqueta <code> generada
        $code = highlight_string($code, true);
        $code = substr($code, 6, -7);

        //Separo el $code
        $chunks = explode('<br />', $code);
    }
    else
    {
        //Convierto los caracteres HTML a sus respectivas entidades
        $code = htmlentities($code);

        //Caracteres especiales
        $replacements = array(
            "\t" => '&nbsp;&nbsp;&nbsp;&nbsp;',
            ' ' => '&nbsp;'
        );

        //Remplaza los caracteres especiales en el $code
        $code = str_replace(array_keys($replacements), array_values($replacements), $code);

        //Separo el $code
        $chunks = preg_split('/[\\n]/i', $code);
    }

    //Recorro las todas las partes,
    foreach($chunks as $key => $value)
    {
        $output .= "<li><p>";
        $output .= ($value) ? $value : '&nbsp;'; //Si es una linea vacia, agrego un espacio
        $output .= "</p></li>";
    }

    $output .= "</ol></code>";

    return $output;
}

?>

<?php
$code = <<<CODE
<?php
echo 'Fabri have a girlfriend... Challenge acepted';
?>
CODE;

echo syntaxHighlighter($code);
?>