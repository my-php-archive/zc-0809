<?php
require_once("header.php");
$n2= time();
$miembro =	$_SESSION['id'];
$action = no_injection($_POST['action']);
$type = no_injection($_POST['type']);
$obj = no_injection($_POST['obj']);

if($action==last){
$nots = mysql_query("SELECT n.*, u.nick FROM notificaciones n, usuarios u WHERE u.id=n.id_autor AND n.id_user='$miembro' ORDER BY n.fecha DESC LIMIT 20");

if(!mysql_num_rows($nots)){echo'No hay notificaciones';}

while($rowS=mysql_fetch_array($nots)){

$from	=	$rowS['id_autor'];
$ipost	=	$rowS['id_post'];
$itema	=	$rowS['id_tema'];
$icomu =	$rowS['id_comu'];
$puntotes	=	$rowS['puntos'];
$detalle	=	$rowS['detalle'];
$concepto	=	$rowS['concepto'];
$medalla	=	$rowS['medalla'];
?>
<li<?php if($rowS['estatus']=="1"){echo' class="unread"';}?>><span class="icon-noti <? if ($rowS['detalle']!='icon-medallas'){?><?=$rowS['detalle']?><? }else{?><?=$rowS['detalle']?> <?=$rowS['medalla']?><? }?>"></span><? if ($rowS['detalle']!='icon-medallas'){?><a href="/perfil/<?=$rowS['nick'];?>/"><?=$rowS['nick'];?></a><? }?> <?php 
if ($rowS['detalle']=='sprite-follow'){echo'te est&aacute; siguiendo';} 



$rspo = mysql_query("SELECT p.id as PID, p.titulo, p.categoria, c.* FROM categorias c, fotos p WHERE c.id_categoria=p.categoria AND p.id='$ipost'");
$fotoS = mysql_fetch_array($rspo);

$pid	=	$fotoS['PID'];
$ftitulo	=	centitulo($fotoS['titulo']);
$link_categoria =	$fotoS['link_categoria'];

$rspo = mysql_query("SELECT p.id as PID, p.titulo, p.categoria, c.* FROM categorias c, posts p WHERE c.id_categoria=p.categoria AND p.id='$ipost'");
$postS = mysql_fetch_array($rspo);

$pid	=	$postS['PID'];
$ptitulo	=	centitulo($postS['titulo']);
$link_categoria =	$postS['link_categoria'];

if ($rowS['detalle']=='sprite-ballooon-left'){echo'coment&oacute; en una <a href="/fotos/'.$link_categoria.'/'.$pid.'/.html" class="obj" title="'.$ftitulo.'">foto</a> tuya';} 
if ($rowS['detalle']=='sprite-balloon-left'){echo'coment&oacute; en un <a href="/posts/'.$link_categoria.'/'.$pid.'/'.corregir($ptitulo).'.html" class="obj" title="'.$ptitulo.'">post</a> tuyo';}
if ($rowS['detalle']=='sprite-balloon-left-blue'){echo'coment&oacute; en un <a href="/posts/'.$link_categoria.'/'.$pid.'/'.corregir($ptitulo).'.html" class="obj" title="'.$ptitulo.'">post</a> que sigues';}
if ($rowS['detalle']=='sprite-document-text-image'){echo'cre&oacute; un nuevo <a href="/posts/'.$link_categoria.'/'.$pid.'/'.corregir($ptitulo).'.html" class="obj" title="'.$ptitulo.'">post</a>';}
if ($rowS['detalle']=='sprite-point'){echo'dej&oacute; <b>'.$puntotes.'</b> puntos en tu <a href="/posts/'.$link_categoria.'/'.$pid.'/'.corregir($ptitulo).'.html" class="obj" title="'.$ptitulo.'">post</a>';}
if ($rowS['detalle']=='sprite-recomendar-p' and $itema=='0'){echo'te recomienda un <a href="/posts/'.$link_categoria.'/'.$pid.'/'.corregir($ptitulo).'.html" class="obj" title="'.$ptitulo.'">post</a>';}
if ($rowS['detalle']=='sprite-star'){echo'agreg&oacute; tu <a href="/posts/'.$link_categoria.'/'.$pid.'/'.corregir($ptitulo).'.html" class="obj" title="'.$ptitulo.'">post</a> a Favoritos';}
if ($rowS['detalle']=='spritee-star'){echo'agreg&oacute; tu <a href="/fotos/'.$link_categoria.'/'.$pid.'/.html" class="obj" title="'.$ftitulo.'">foto</a> a Favoritos';}
if ($rowS['detalle']=='icon-medallas'){echo'Recibiste una nueva <a href="/perfil/'.$rangoz['nick'].'/medallas" class="obj" title="'.$concepto.'">medalla</a>';}





$rsco = mysql_query("SELECT co.nombre, co.shortname, ct.titulo, ct.idte FROM c_comunidades co, c_temas ct WHERE co.idco=ct.idcomunid AND ct.idte='$itema'");
$temaS = mysql_fetch_array($rsco);

$idte	=	$temaS['idte'];
$short	=	$temaS['shortname'];
$ctitulo	=	centitulo($temaS['titulo']);
$nombrec =	$temaS['nombre'];

if ($rowS['detalle']=='sprite-block'){echo'cre&oacute; un <a href="/comunidades/'.$short.'/'.$idte.'/'.corregir($ctitulo).'.html" class="obj" title="'.$ctitulo.'">tema</a> en una <a href="/comunidades/'.$short.'/" title="'.$nombrec.'">comunidad</a>';}
if ($rowS['detalle']=='sprite-balloon-left-green'){echo'respondi&oacute; un <a href="/comunidades/'.$short.'/'.$idte.'/'.corregir($ctitulo).'.html" class="obj" title="'.$ctitulo.'">tema</a>';} 
if ($rowS['detalle']=='sprite-recomendar-p' and $ipost=='0'){echo'te recomienda un <a href="/comunidades/'.$short.'/'.$idte.'/'.corregir($ctitulo).'.html" class="obj" title="'.$ctitulo.'">tema</a>';} 
echo'</li>';}

mysql_query("UPDATE usuarios SET notificaciones='0' WHERE id='".$miembro."'");
mysql_query("UPDATE notificaciones SET estatus='0' WHERE id_user='".$miembro."'");}

//Seguidores

if($action=='follow'){
    
    //Temas
    if ($type=='tema'){
        
        $rspuntosv = mysql_query("SELECT id_seguidor FROM seguidor WHERE id_seguidor=".$miembro." AND id_post_seguido=".$obj);
        $existe = mysql_num_rows($rspuntosv);
    
    
        if ($existe<=0){
            $minuto = time() - (20);
            $sqlflood=$db->query("SELECT id FROM usuarios WHERE ultimaaccion2 BETWEEN '$minuto' AND unix_timestamp() AND id='{$_SESSION['id']}'");
            
            if($db->num_rows($sqlflood)){
                die("0-1-0-No es posible seguir tantos temas en tan poco tiempo. Por favor espere unos instantes y vuelva a intentar.");
            }
            
            $sql = "INSERT INTO seguidor (id_tema_seguido, id_seguidor) VALUES ('$obj', '$miembro')";
            $rs = mysql_query($sql, $con) or die("Error al grabar un mensaje: ".mysql_error);
            
            mysql_query("UPDATE c_temas SET seguite=seguite+'1' WHERE idte='".$obj."' ");
            mysql_query("UPDATE usuarios SET ultimaaccion2=unix_timestamp() WHERE id='".$miembro."' ");
            
            $rim = mysql_query("SELECT t.seguite,t.idcomunid,t.idte,t.titulo,c.shortname,c.idco FROM (c_temas AS t, c_comunidades AS c) WHERE idte=$obj AND  t.idcomunid=c.idco");
            $echi = mysql_fetch_array($rim);
    
            $href2 = "/posts/{$echi['shortname']}/{$echi['idte']}/".corregir($echi['titulo']).".html";        
            $tipo_ac = tipo_accion("sigue-tema");
            mysql_query("insert into acciones (ida,idu,tipo,html,fecha,otro) values (NULL,'{$miembro}','{$tipo_ac}','Sigue el tema <a href=\"$href2\">".htmlentities($echi['titulo'])."</a>',unix_timestamp(),'')");
            
            $seguidores = $echi['seguite'];
            
            echo"0-1-$seguidores++";
        }
    }    
       //Usuarios
    
    if ($type==user){
        
        if($miembro==$obj){
        die("0-1-0-No es posible seguirte a ti mismo :/");}
        
        $rspuntosv = mysql_query("SELECT id_seguidor FROM seguidor WHERE id_seguidor=".$miembro." AND id_user=".$obj);
        $existe = mysql_num_rows($rspuntosv);
        
        if ($existe<=0){
        
        $minuto = time() - (20);
        $sqlflood=$db->query("SELECT id FROM usuarios WHERE ultimaaccion2 BETWEEN '$minuto' AND unix_timestamp() AND id='{$_SESSION['id']}'");
        
        if($db->num_rows($sqlflood)){
        die("0-1-0-No es posible seguir tantos usuarios en tan poco tiempo. Por favor espere unos instantes y vuelva a intentar.");}
        
        $sql = "INSERT INTO seguidor (id_user, id_seguidor) VALUES ('$obj', '$miembro')";
        $rs = mysql_query($sql, $con) or die("Error al grabar un mensaje: ".mysql_error);
        
        mysql_query("UPDATE usuarios SET seguidores=seguidores+'1' WHERE id='".$obj."' ");
        mysql_query("UPDATE usuarios SET notificaciones=notificaciones+'1' WHERE id='".$obj."'");
        
        mysql_query("INSERT INTO notificaciones (id_autor, id_user, id_post, detalle, detalle2, fecha, estatus) VALUES ('$miembro', '$obj', '1', 'sprite-follow','friend-new','$n2','1')");
        mysql_query("UPDATE usuarios SET ultimaaccion2=unix_timestamp() WHERE id='".$miembro."'");
        
        $ram = mysql_query("SELECT seguidores FROM usuarios WHERE id='".$obj."'");
        $echa = mysql_fetch_array($ram);
        
        $seguidores = $echa['seguidores'];
        
        echo"0-1-$seguidores++";}
    }

    
    //Posts
    if ($type==post){
        
        $rspuntosv = mysql_query("SELECT id_seguidor FROM seguidor WHERE id_seguidor=".$miembro." AND id_post_seguido=".$obj);
        $existe = mysql_num_rows($rspuntosv);
        
        if ($existe<=0){    
            $minuto = time() - (20);
            $sqlflood=$db->query("SELECT id FROM usuarios WHERE ultimaaccion2 BETWEEN '$minuto' AND unix_timestamp() AND id='{$_SESSION['id']}'");
            
            if($db->num_rows($sqlflood)){
            die("0-1-0-No es posible seguir tantos posts en tan poco tiempo. Por favor espere unos instantes y vuelva a intentar.");}
            	
            $sql = "INSERT INTO seguidor (id_post_seguido, id_seguidor) VALUES ('$obj', '$miembro')";
            $rs = mysql_query($sql, $con) or die("Error al grabar un mensaje: ".mysql_error);
    
    
            //  Agregar Accion
            $p = mysql_query("SELECT p.id, p.titulo, c.link_categoria, c.id_categoria
                             FROM (posts AS p, categorias AS c)
                             WHERE p.id = {$obj} and p.categoria = c.id_categoria");
            $p = mysql_fetch_object(($p));
            $href2 = "/posts/{$p->link_categoria}/{$p->id}/".corregir($p->titulo).".html";
            
                        
            $tipo_ac = tipo_accion("sigue-post");
            mysql_query("insert into acciones (ida,idu,tipo,html,fecha,otro) values (NULL,'{$miembro}','{$tipo_ac}','Sigue el Post <a href=\"$href2\" >".urlencode($p->titulo)."</a>',unix_timestamp(),'')");
    
            mysql_query("UPDATE posts SET seguidores=seguidores+'1' WHERE id='".$obj."'");
            mysql_query("UPDATE usuarios SET ultimaaccion2=unix_timestamp() WHERE id='".$miembro."'");
            
            $rem = mysql_query("SELECT seguidores FROM posts WHERE id='".$obj."'");
            $eche = mysql_fetch_array($rem);
            
            $seguidores = $eche['seguidores'];
            
            echo"0-1-$seguidores++";
        }
    
    }
    
 //Comunidades
    
    if ($type==comunidad){
        
        $rspuntosv = mysql_query("SELECT id_seguidor FROM seguidor WHERE id_seguidor=".$miembro." AND id_comu_seguida=".$obj);
        $existe = mysql_num_rows($rspuntosv);
        
        if ($existe<=0){
        
            $minuto = time() - (1);
            $sqlflood=$db->query("SELECT id FROM usuarios WHERE ultimaaccion2 BETWEEN '$minuto' AND unix_timestamp() AND id='{$_SESSION['id']}'");
            
            if($db->num_rows($sqlflood)){
                die("0-1-0-No es posible seguir tantas comunidades en tan poco tiempo. Por favor espere unos instantes y vuelva a intentar.");
            }
            
            $sql = "INSERT INTO seguidor (id_comu_seguida, id_seguidor) VALUES ('$obj', '$miembro')";
            $rs = mysql_query($sql, $con) or die("Error al grabar un mensaje: ".mysql_error);
            
            mysql_query("UPDATE c_comunidades SET seguico=seguico+'1' WHERE idco='".$obj."' ");
            mysql_query("UPDATE usuarios SET ultimaaccion2=unix_timestamp() WHERE id='".$miembro."' ");
            
            $rim = mysql_query("SELECT seguico FROM c_comunidades WHERE idco='".$obj."'");
            $echi = mysql_fetch_array($rim);
            
            $seguidores = $echi['seguico'];
            
            echo"0-1-$seguidores++";
            
        }
        
    }


}

//Un-Seguidores ^^

if($action==unfollow){
    
    //Usuarios
    if ($type==user){
        mysql_query("DELETE FROM seguidor WHERE id_seguidor='".$miembro."' AND id_user='".$obj."'");
        mysql_query("UPDATE usuarios SET seguidores=seguidores-'1' WHERE id='".$obj."'");
        
        $ram = mysql_query("SELECT seguidores FROM usuarios WHERE id='".$obj."'");
        $echa = mysql_fetch_array($ram);
        
        $seguidores = $echa['seguidores']--;
        
        echo"0-1-{$seguidores}";
    }
    
    //Posts
    
    if ($type==post){
        
        $rspuntosv = mysql_query("SELECT id_seguidor FROM seguidor WHERE id_seguidor=".$miembro." AND id_post_seguido=".$obj);
        $existe = mysql_num_rows($rspuntosv);
        
        if ($existe!=0){
        
            mysql_query("DELETE FROM seguidor WHERE id_seguidor='".$miembro."' AND id_post_seguido='".$obj."'");
            mysql_query("UPDATE posts SET seguidores=seguidores-'1' WHERE id='".$obj."'");
            
            $rem = mysql_query("SELECT seguidores FROM posts WHERE id='".$obj."'");
            $eche = mysql_fetch_array($rem);
            
            $seguidores = $eche['seguidores']--;
            
            echo"0-1-{$seguidores}";
        }
    }
    
    //Temas
    
    if ($type==tema){
    
    $rspuntosv = mysql_query("SELECT id_seguidor FROM seguidor WHERE id_seguidor=".$miembro." AND id_tema_seguido=".$obj);
    $existe = mysql_num_rows($rspuntosv);
    
        if($existe!=0){
        
            mysql_query("DELETE FROM seguidor WHERE id_seguidor='".$miembro."' AND id_tema_seguido='".$obj."'");
            mysql_query("UPDATE c_temas SET seguite=seguite-'1' WHERE idte='".$obj."'");
            
            $rim = mysql_query("SELECT seguite FROM c_temas WHERE idte='".$obj."'");
            $echi = mysql_fetch_array($rim);
            
            $seguidores = $echi['seguidote']--;
            
            echo"0-1-{$seguidores}";
        }
    }
    
    //Comunidades
    
    if ($type==comunidad){
        $rspuntosv = mysql_query("SELECT id_seguidor FROM seguidor WHERE id_seguidor=".$miembro." AND id_comu_seguida=".$obj);
        $existe = mysql_num_rows($rspuntosv);
        
        if($existe!=0){
        
            mysql_query("DELETE FROM seguidor WHERE id_seguidor='".$miembro."' AND id_comu_seguida='".$obj."'");
            mysql_query("UPDATE c_comunidades SET seguico=seguico-'1' WHERE idco='".$obj."'");
            
            $rim = mysql_query("SELECT seguico FROM c_comunidades WHERE idco='".$obj."'");
            $echi = mysql_fetch_array($rim);
            
            $seguidores = $echi['seguico']--;
            
            echo"0-1-{$seguidores}";
        }
    }

}

//Recomendar posts

if ($action==spam){
    
    $idrecomienda = no_injection($_POST['postid']);
    
    $sqlp=$db->query("SELECT s.id_user, s.id_seguidor , u.* FROM seguidor as s, usuarios as u WHERE s.id_user='$miembro' AND s.id_seguidor=u.id ORDER BY id desc");
    $existep=$db->num_rows($sqlp);
    
    $sql=$db->query("SELECT id_autor FROM posts WHERE id='$idrecomienda'");
    $wowp=$db->fetch_array($sql);
    
    $creador = $wowp['id_autor'];
    
    if($creador==$miembro){
        die("0-No puedes recomendar tus posts.");
    }
    
    if($existep!=0){
        
        $salp = $db->query("SELECT * FROM notificaciones WHERE id_autor='$miembro' AND id_post='$idrecomienda' AND detalle='sprite-recomendar-p'");
        if(!$db->num_rows($salp)){
            
            while($postz=$db->fetch_array($sqlp)){        
                mysql_query("INSERT INTO notificaciones (id_autor, id_user, id_post, detalle, detalle2, fecha, estatus) VALUES ('$miembro', '{$postz['id']}',  '$idrecomienda', 'sprite-recomendar-p','post-spam','$n2','1')");
                mysql_query("Update usuarios Set notificaciones=notificaciones+'1' where id='{$postz['id']}'");
            }
            
                //  Agregar Accion
                $p = mysql_query("SELECT p.id, p.titulo, c.link_categoria, c.id_categoria
                                FROM (posts AS p, categorias AS c)
                                WHERE p.id = {$idrecomienda} and p.categoria = c.id_categoria");
                $p = mysql_fetch_object(($p));
                $href2 = "/posts/{$p->link_categoria}/{$p->id}/".corregir($p->titulo).".html";
            
                $tipo_ac = tipo_accion("recomendo-post");
                mysql_query("insert into acciones (ida,idu,tipo,html,fecha,otro) values (NULL,'{$miembro}','{$tipo_ac}','Recomend&#243; el post <a href=\"$href2\" >".urlencode($p->titulo)."</a>',unix_timestamp(),'')");
            
        }else{
            die("0-No puedes recomendar un post mas de una vez.");
        }
    }




}

//Recomendar temas

if ($action==c_spam){

$temaid = (int)$_POST['temaid'];

$sqlc=$db->query("SELECT s.id_user, s.id_seguidor , u.* FROM seguidor as s, usuarios as u WHERE s.id_user='$miembro' AND s.id_seguidor=u.id ORDER BY id desc");
$existec=$db->num_rows($sqlc);

$sql=$db->query("SELECT id_autor FROM c_temas WHERE idte='$temaid'");
$wowc=$db->fetch_array($sql);

$creador = $wowc['id_autor'];

if($creador==$miembro){
die("0-No puedes recomendar tus temas.");}

if($existec!=0){

$salc=$db->query("SELECT * FROM notificaciones WHERE id_autor='$miembro' AND id_tema='$temaid' AND detalle='sprite-recomendar-p'");
if(!$db->num_rows($salc)){

while($postz=$db->fetch_array($sqlc)){

mysql_query("INSERT INTO notificaciones (id_autor, id_user, id_tema, id_post, detalle, detalle2, fecha, estatus) VALUES ('$miembro', '{$postz['id']}', '$temaid', '0', 'sprite-recomendar-p','post-spam','$n2','1')");
mysql_query("Update usuarios Set notificaciones=notificaciones+'1' where id='{$postz['id']}'");}

}else{die("0-No puedes recomendar un tema mas de una vez.");}}}
?>