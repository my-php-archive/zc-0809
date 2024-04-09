<?php  
function countRepeat(array $array)
{    
    $output = array();
    
    foreach($array as $key => $value)
    {
        if( array_key_exists($value, $output) )
        {
            ++$output[$value];
        }
        else
        {
            $output[$value] = 1;
        }
    }
    
    return $output;
}

$el_array = array('good', 'hi', 'bad', 'hi');

echo '<pre>';
print_r( countRepeat($el_array) );
echo '</pre>';