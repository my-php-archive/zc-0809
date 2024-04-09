<html> 
<head> 
<title>Zincomienzo - Escribir al reves</title> 
<meta http-equiv="content-type" content="text/html; charset=utf-8" /> 
<script type="text/javascript"> 
function fliptext(){ 
    var inputText = document.getElementById('textin').value; 
    var textArray = new Array(); 
    var flipped = document.getElementById('flip'); 
    for( i = 0; i < inputText.length; i++ ){ 
        textArray[i] = inputText.charAt(i); 
    } 
    var reverseText = textArray.reverse(); 
    flipped.innerHTML = ""; 
    for( i = 0; i < reverseText.length; i++ ){ 
        flipped.innerHTML += upsideDown(reverseText[i]); 
    } 
} 
function upsideDown( ch ){ 
    switch (ch){ 
        case 'a': return "\u0250"; 
        case 'A': return "\u0250"; 
        case 'b': return "q"; 
        case 'B': return "q"; 
        case 'c': return "\u0254"; 
        case 'C': return "\u0254"; 
        case 'd': return "p"; 
        case 'D': return "p"; 
        case 'e': return "\u01dd"; 
        case 'E': return "\u01dd"; 
        case 'f': return "\u025f"; 
        case 'F': return "\u025f"; 
        case 'g': return "\u0183"; 
        case 'G': return "\u0183"; 
        case 'h': return "\u0265"; 
        case 'H': return "\u0265"; 
        case 'i': return "\u0131"; 
        case 'I': return "\u0131"; 
        case 'j': return "\u027e"; 
        case 'J': return "\u027e"; 
        case 'k': return "\u029e"; 
        case 'K': return "\u029e"; 
        case 'l': return "l"; 
        case 'L': return "l"; 
        case 'm': return "\u026f"; 
        case 'M': return "\u026f"; 
        case 'n': return "u"; 
        case 'N': return "u"; 
        case 'o': return "o"; 
        case 'O': return "o"; 
        case 'p': return "d"; 
        case 'P': return "d"; 
        case 'q': return "b"; 
        case 'Q': return "b"; 
        case 'r': return "\u0279"; 
        case 'R': return "\u0279"; 
        case 's': return "s"; 
        case 'S': return "s"; 
        case 't': return "\u0287"; 
        case 'T': return "\u0287"; 
        case 'u': return "n"; 
        case 'U': return "n"; 
        case 'v': return "\u028c"; 
        case 'V': return "\u028c"; 
        case 'w': return "\u028d"; 
        case 'W': return "\u028d"; 
        case 'x': return "x"; 
        case 'X': return "x"; 
        case 'y': return "\u028e"; 
        case 'Y': return "\u028e"; 
        case 'z': return "z"; 
        case 'Z': return "z"; 
        case '0': return "0"; 
        case '1': return "\u21c2"; 
        case '2': return "\u1105"; 
        case '3': return "\u1110"; 
        case '4': return "\u3123"; 
        case '5': return "S"; 
        case '6': return "9"; 
        case '7': return "L"; 
        case '8': return "8"; 
        case '9': return "6"; 
        case ' ': return " "; 
        case '\n': return "<br />"; 
        case '.': return "\u02d9"; 
        case ',': return "\'"; 
        case '\'': return ","; 
        case '\"': return ",,"; 
        case '!': return "?"; 
        case '?': return "\u00bf"; 
        case '@': return "@"; 
        case '#': return "#"; 
        case '$': return "$"; 
        case '%': return "%"; 
        case '^': return "v"; 
        case '/': return "/"; 
        case '\\': return "\\"; 
        case '<': return ">"; 
        case '>': return "<"; 
        case '(': return ")"; 
        case ')': return "("; 
        case '[': return "]"; 
        case ']': return "["; 
        case '{': return "}"; 
        case '}': return "{"; 
        case ':': return ":"; 
        case '*': return "*"; 
        case '-': return "-"; 
        case '+': return "+"; 
        case '=': return "="; 
        case '&': return "+"; 
        default: return ""; 
    } 
} 
</script> 
<style type="text/css"> 
div{ 
    font-family: Courier; 
    width: 400px; 
    text-align: right; 
} 
</style> 
</head> 
<body> 
<form> 
<textarea id="textin" cols="35" rows="5" onkeypress="fliptext();" onkeyup="fliptext();">
</textarea> 
<br /> 
<div id="flip"></span> 
</form> 


</body> 
</html> 