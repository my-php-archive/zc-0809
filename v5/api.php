<?php

function parsear($i,$f,$s) {
    list($crap,$y) = explode($i,$s,2);
    list($x,$shit) = explode($f,$y,2);
    return $x;
}



function get_zincomienzo_info( $nick ){
    if($html = @file_get_contents('http://www.zincomienzo.net/perfil/'.$nick)){
        $piece = parsear('<ul class="clearfix">','</ul>',$html);
        list($nada,$rango,$puntos,$posts,$comentarios,$seguidores) = explode('<li',$piece,6);
        $r['usuario'] = parsear('<h1 class="nick">','<',$html);
        $r['nombre'] = parsear('<span class="name">','</span>',$html);
        $r['medallas'] = parsear('<span>','<',parsear('<h3>Medallas</h3>','</div>',$html));
        $r['rango'] = parsear('<strong>','<',$rango);
        $r['puntos'] = parsear('<strong>','<',$puntos);
        $r['posts'] = parsear('<strong>','<',$posts);
        $r['comentarios'] = parsear('<strong>','<',$comentarios);
        $r['seguidores'] = parsear('<strong>','<',$seguidores);
        $r['bio'] = utf8_decode(parsear('class="bio">','</span>',$html));
        $r['sexo'] = (parsear('s un ','bre',$r['bio'])=='hom')?'Hombre':'Mujer';
        $r['pais'] = parsear('Vive en ',' y se u',$r['bio']);
        $r['avatar_url'] = parsear('src="','"',parsear('perfil-avatar','</div>',$html));
        return $r;
    } else return array();
}

$zincomienzo = get_zincomienzo_info( 'lean18' ); 

?>