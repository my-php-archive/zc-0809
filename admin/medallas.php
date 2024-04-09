<?php
require_once("header.php");

$n2 = time();
// Perfil Completo
$sql = "SELECT * FROM usuarios WHERE porperfil='100'";
$rs = mysql_query($sql);
while($row = mysql_fetch_array($rs))
{
$autor = $row['id'];

$sqlp=$db->query("SELECT id FROM medallas where usuario='$autor' AND causa='Perfil Completo'");
$existep=$db->num_rows($sqlp);
if($existep==0){
$tipo = 'Perfil Completo';
$medalla = 'medalla-bronce';
$detalles = 'Perfil Completo';
	//insetamos la medalla :D
	$db->query("INSERT INTO medallas (medalla, causa, fecha, usuario, detalles) VALUES ('$medalla', '$tipo', unix_timestamp(), '$autor', '$detalles')");
	//insetamos la notificacion
	$db->query("INSERT INTO notificaciones (id_autor, id_user, id_post, id_tema, id_comuni, puntos, detalle, detalle2, medalla, concepto, fecha, estatus) VALUES ('1', '$autor', '1', '1', '1', '', 'icon-medallas', 'medal', '$medalla', '$tipo', '$n2', '1')");//Avisamos De La Notificacion
	$sql = "Update usuarios Set notificaciones=notificaciones+'1' where id='".$autor."' ";
mysql_query($sql);

}}
//Fin Perfil Completo

//Administradores
$sql = "SELECT * FROM usuarios WHERE rango='255'";
$rs = mysql_query($sql);
while($row = mysql_fetch_array($rs))
{
$autor = $row['id'];

$sqlp=$db->query("SELECT id FROM medallas where usuario='$autor' AND causa='Administrador'");
$existep=$db->num_rows($sqlp);
if($existep==0){
$tipo = 'Administrador';
$medalla = 'medalla-great-user';
$detalles = 'Logr&oacute; el rango de administrador';
	//insetamos la medalla :D
	$db->query("INSERT INTO medallas (medalla, causa, fecha, usuario, detalles) VALUES ('$medalla', '$tipo', unix_timestamp(), '$autor', '$detalles')");
	//insetamos la notificacion
	$db->query("INSERT INTO notificaciones (id_autor, id_user, id_post, id_tema, id_comuni, puntos, detalle, detalle2, medalla, concepto, fecha, estatus) VALUES ('1', '$autor', '1', '1', '1', '', 'icon-medallas', 'medal', '$medalla', '$tipo', '$n2', '1')");//Avisamos De La Notificacion
	$sql = "Update usuarios Set notificaciones=notificaciones+'1' where id='".$autor."' ";
mysql_query($sql);

}}
//Fin Administradores

//Moderadores
$sql = "SELECT * FROM usuarios WHERE rango='100' or rango='255'";
$rs = mysql_query($sql);
while($row = mysql_fetch_array($rs))
{
$autor = $row['id'];

$sqlp=$db->query("SELECT id FROM medallas where usuario='$autor' AND causa='Moderadores'");
$existep=$db->num_rows($sqlp);
if($existep==0){
$tipo = 'Moderadores';
$medalla = 'medalla-moderador';
$detalles = 'Logr&oacute; el rango de Moderador';
	//insetamos la medalla :D
	$db->query("INSERT INTO medallas (medalla, causa, fecha, usuario, detalles) VALUES ('$medalla', '$tipo', unix_timestamp(), '$autor', '$detalles')");
	//insetamos la notificacion
	$db->query("INSERT INTO notificaciones (id_autor, id_user, id_post, id_tema, id_comuni, puntos, detalle, detalle2, medalla, concepto, fecha, estatus) VALUES ('1', '$autor', '1', '1', '1', '', 'icon-medallas', 'medal', '$medalla', '$tipo', '$n2', '1')");//Avisamos De La Notificacion
	$sql = "Update usuarios Set notificaciones=notificaciones+'1' where id='".$autor."' ";
mysql_query($sql);

}}
//Fin Moderadores

//Gold Users
$sql = "SELECT * FROM usuarios WHERE rango='14' or rango='100' or rango='255'";
$rs = mysql_query($sql);
while($row = mysql_fetch_array($rs))
{
$autor = $row['id'];

$sqlp=$db->query("SELECT id FROM medallas where usuario='$autor' AND causa='Gold User'");
$existep=$db->num_rows($sqlp);
if($existep==0){
$tipo = 'Gold User';
$medalla = 'medalla-diamante';
$detalles = 'Distinguido como Gold User por una acci&oacute;n especial';
	//insetamos la medalla :D
	$db->query("INSERT INTO medallas (medalla, causa, fecha, usuario, detalles) VALUES ('$medalla', '$tipo', unix_timestamp(), '$autor', '$detalles')");
	//insetamos la notificacion
	$db->query("INSERT INTO notificaciones (id_autor, id_user, id_post, id_tema, id_comuni, puntos, detalle, detalle2, medalla, concepto, fecha, estatus) VALUES ('1', '$autor', '1', '1', '1', '', 'icon-medallas', 'medal', '$medalla', '$tipo', '$n2', '1')");//Avisamos De La Notificacion
	$sql = "Update usuarios Set notificaciones=notificaciones+'1' where id='".$autor."' ";
mysql_query($sql);

}}
//Fin Gold Users

//Silver Users
$sql = "SELECT * FROM usuarios WHERE rango='13' or rango='14' or rango='100' or rango='255'";
$rs = mysql_query($sql);
while($row = mysql_fetch_array($rs))
{
$autor = $row['id'];

$sqlp=$db->query("SELECT id FROM medallas where usuario='$autor' AND causa='Silver User'");
$existep=$db->num_rows($sqlp);
if($existep==0){
$tipo = 'Silver User';
$medalla = 'medalla-platino';
$detalles = 'Distinguido como Silver User por una acci&oacute;n especial';
	//insetamos la medalla :D
	$db->query("INSERT INTO medallas (medalla, causa, fecha, usuario, detalles) VALUES ('$medalla', '$tipo', unix_timestamp(), '$autor', '$detalles')");
	//insetamos la notificacion
	$db->query("INSERT INTO notificaciones (id_autor, id_user, id_post, id_tema, id_comuni, puntos, detalle, detalle2, medalla, concepto, fecha, estatus) VALUES ('1', '$autor', '1', '1', '1', '', 'icon-medallas', 'medal', '$medalla', '$tipo', '$n2', '1')");//Avisamos De La Notificacion
	$sql = "Update usuarios Set notificaciones=notificaciones+'1' where id='".$autor."' ";
mysql_query($sql);

}}
//Fin silver Users

//Great Users
$sql = "SELECT * FROM usuarios WHERE rango='13' or rango='14' or rango='100' or rango='255'";
$rs = mysql_query($sql);
while($row = mysql_fetch_array($rs))
{
$autor = $row['id'];

$sqlp=$db->query("SELECT id FROM medallas where usuario='$autor' AND causa='Great User'");
$existep=$db->num_rows($sqlp);
if($existep==0){
$tipo = 'Great User';
$medalla = 'medalla-great-user';
$detalles = 'Distinguido como Great User por una acci&oacute;n especial';
	//insetamos la medalla :D
	$db->query("INSERT INTO medallas (medalla, causa, fecha, usuario, detalles) VALUES ('$medalla', '$tipo', unix_timestamp(), '$autor', '$detalles')");
	//insetamos la notificacion
	$db->query("INSERT INTO notificaciones (id_autor, id_user, id_post, id_tema, id_comuni, puntos, detalle, detalle2, medalla, concepto, fecha, estatus) VALUES ('1', '$autor', '1', '1', '1', '', 'icon-medallas', 'medal', '$medalla', '$tipo', '$n2', '1')");//Avisamos De La Notificacion
	$sql = "Update usuarios Set notificaciones=notificaciones+'1' where id='".$autor."' ";
mysql_query($sql);

}}
//Fin Great Users

//Full Users
$sql = "SELECT * FROM usuarios WHERE rango='0' or rango='13' or rango='14' or rango='100' or rango='255'";
$rs = mysql_query($sql);
while($row = mysql_fetch_array($rs))
{
$autor = $row['id'];

$sqlp=$db->query("SELECT id FROM medallas where usuario='$autor' AND causa='Full User'");
$existep=$db->num_rows($sqlp);
if($existep==0){
$tipo = 'Full User';
$medalla = 'medalla-oro';
$detalles = 'Distinguido como Full User por una acci&oacute;n especial';
	//insetamos la medalla :D
	$db->query("INSERT INTO medallas (medalla, causa, fecha, usuario, detalles) VALUES ('$medalla', '$tipo', unix_timestamp(), '$autor', '$detalles')");
	//insetamos la notificacion
	$db->query("INSERT INTO notificaciones (id_autor, id_user, id_post, id_tema, id_comuni, puntos, detalle, detalle2, medalla, concepto, fecha, estatus) VALUES ('1', '$autor', '1', '1', '1', '', 'icon-medallas', 'medal', '$medalla', '$tipo', '$n2', '1')");//Avisamos De La Notificacion
	$sql = "Update usuarios Set notificaciones=notificaciones+'1' where id='".$autor."' ";
mysql_query($sql);

}}
//Fin Full Users

//New Full Users
$sql = "SELECT * FROM usuarios WHERE rango='12' or rango='0' or rango='13' or rango='14' or rango='100' or rango='255'";
$rs = mysql_query($sql);
while($row = mysql_fetch_array($rs))
{
$autor = $row['id'];

$sqlp=$db->query("SELECT id FROM medallas where usuario='$autor' AND causa='New Full User'");
$existep=$db->num_rows($sqlp);
if($existep==0){
$tipo = 'New Full User';
$medalla = 'medalla-plata';
$detalles = 'Distinguido como New Full User por Puntuacion Requerida';
	//insetamos la medalla :D
	$db->query("INSERT INTO medallas (medalla, causa, fecha, usuario, detalles) VALUES ('$medalla', '$tipo', unix_timestamp(), '$autor', '$detalles')");
	//insetamos la notificacion
	$db->query("INSERT INTO notificaciones (id_autor, id_user, id_post, id_tema, id_comuni, puntos, detalle, detalle2, medalla, concepto, fecha, estatus) VALUES ('1', '$autor', '1', '1', '1', '', 'icon-medallas', 'medal', '$medalla', '$tipo', '$n2', '1')");//Avisamos De La Notificacion
	$sql = "Update usuarios Set notificaciones=notificaciones+'1' where id='".$autor."' ";
mysql_query($sql);

}}
//Fin New Full Users

//Novatos
$sql = "SELECT * FROM usuarios WHERE rango='11' or rango='12' or rango='0' or rango='13' or rango='14' or rango='100' or rango='255'";
$rs = mysql_query($sql);
while($row = mysql_fetch_array($rs))
{
$autor = $row['id'];

$sqlp=$db->query("SELECT id FROM medallas where usuario='$autor' AND causa='Novato'");
$existep=$db->num_rows($sqlp);
if($existep==0){
$tipo = 'Novato';
$medalla = 'medalla-bronce';
$detalles = 'Distinguido como Novato por Inscripcion a MexicanosLibres';
	//insetamos la medalla :D
	$db->query("INSERT INTO medallas (medalla, causa, fecha, usuario, detalles) VALUES ('$medalla', '$tipo', unix_timestamp(), '$autor', '$detalles')");
	//insetamos la notificacion
	$db->query("INSERT INTO notificaciones (id_autor, id_user, id_post, id_tema, id_comuni, puntos, detalle, detalle2, medalla, concepto, fecha, estatus) VALUES ('1', '$autor', '1', '1', '1', '', 'icon-medallas', 'medal', '$medalla', '$tipo', '$n2', '1')");//Avisamos De La Notificacion
	$sql = "Update usuarios Set notificaciones=notificaciones+'1' where id='".$autor."' ";
mysql_query($sql);

}}
//Fin Novatos

//MexicanosLibres! Team
$sql = "SELECT * FROM usuarios WHERE rango='100' or rango='255'";
$rs = mysql_query($sql);
while($row = mysql_fetch_array($rs))
{
$autor = $row['id'];

$sqlp=$db->query("SELECT id FROM medallas where usuario='$autor' AND causa='MexicanosLibres! Team'");
$existep=$db->num_rows($sqlp);
if($existep==0){
$tipo = 'MexicanosLibres! Team';
$medalla = 'medalla-bronce';
$detalles = 'Premio consuelo para el Staff de ML!';
	//insetamos la medalla :D
	$db->query("INSERT INTO medallas (medalla, causa, fecha, usuario, detalles) VALUES ('$medalla', '$tipo', unix_timestamp(), '$autor', '$detalles')");
	//insetamos la notificacion
	$db->query("INSERT INTO notificaciones (id_autor, id_user, id_post, id_tema, id_comuni, puntos, detalle, detalle2, medalla, concepto, fecha, estatus) VALUES ('1', '$autor', '1', '1', '1', '', 'icon-medallas', 'medal', '$medalla', '$tipo', '$n2', '1')");	
	//Avisamos De La Notificacion
	$sql = "Update usuarios Set notificaciones=notificaciones+'1' where id='".$autor."' ";
mysql_query($sql);

}}
//MexicanosLibres! Team

//Usuario mas comuentado
$sql = "SELECT * FROM usuarios WHERE numcomentarios>='3000'";
$rs = mysql_query($sql);
while($row = mysql_fetch_array($rs))
{
$autor = $row['id'];

$sqlp=$db->query("SELECT id FROM medallas where usuario='$autor' AND causa='Usuario m&aacute;s Comentador de la historia'");
$existep=$db->num_rows($sqlp);
if($existep==0){
$tipo = 'Usuario m&aacute;s Comentador de la historia';
$medalla = 'medalla-diamante';
$detalles = 'Distinguido como Usario Compulsivamente Comentador por Tener M&aacute; de<b>3000</b> Comentarios';
	//insetamos la medalla :D
	$db->query("INSERT INTO medallas (medalla, causa, fecha, usuario, detalles) VALUES ('$medalla', '$tipo', unix_timestamp(), '$autor', '$detalles')");
	//insetamos la notificacion
	$db->query("INSERT INTO notificaciones (id_autor, id_user, id_post, id_tema, id_comuni, puntos, detalle, detalle2, medalla, concepto, fecha, estatus) VALUES ('1', '$autor', '1', '1', '1', '', 'icon-medallas', 'medal', '$medalla', '$tipo', '$n2', '1')");//Avisamos De La Notificacion
	$sql = "Update usuarios Set notificaciones=notificaciones+'1' where id='".$autor."' ";
mysql_query($sql);

}}
//usuario mas comentado

//Usuario mas Puntuado
$sql = "SELECT * FROM usuarios WHERE puntos>='2000'";
$rs = mysql_query($sql);
while($row = mysql_fetch_array($rs))
{
$autor = $row['id'];

$sqlp=$db->query("SELECT id FROM medallas where usuario='$autor' AND causa='Usuario Top m&aacute;s Puntuado de la historia'");
$existep=$db->num_rows($sqlp);
if($existep==0){
$tipo = 'Usuario Top m&aacute;s Puntuado de la historia';
$medalla = 'medalla-diamante';
$detalles = 'Distinguido como Usuario Top m&aacute;s Puntuado de la historia por Tener M&aacute; de<b>2000</b> Puntos';
	//insetamos la medalla :D
	$db->query("INSERT INTO medallas (medalla, causa, fecha, usuario, detalles) VALUES ('$medalla', '$tipo', unix_timestamp(), '$autor', '$detalles')");
	//insetamos la medalla :D
	$db->query("INSERT INTO medallas (medalla, causa, fecha, usuario) VALUES ('$medalla', '$tipo', unix_timestamp(), '$autor')");
	//insetamos la notificacion
	$db->query("INSERT INTO notificaciones (id_autor, id_user, id_post, id_tema, id_comuni, puntos, detalle, detalle2, medalla, concepto, fecha, estatus) VALUES ('1', '$autor', '1', '1', '1', '', 'icon-medallas', 'medal', '$medalla', '$tipo', '$n2', '1')");//Avisamos De La Notificacion
	$sql = "Update usuarios Set notificaciones=notificaciones+'1' where id='".$autor."' ";
mysql_query($sql);

}}
//usuario mas puntuado

//Usuario mas Posteador
$sql = "SELECT * FROM usuarios WHERE numposts>='1000'";
$rs = mysql_query($sql);
while($row = mysql_fetch_array($rs))
{
$autor = $row['id'];

$sqlp=$db->query("SELECT id FROM medallas where usuario='$autor' AND causa='Usuario Top m&aacute;s Posteador de la historia'");
$existep=$db->num_rows($sqlp);
if($existep==0){
$tipo = 'Usuario Top m&aacute;s Posteador de la historia';
$medalla = 'medalla-diamante';
$detalles = 'Distinguido como Usuario Top m&aacute;s Posteador de la historia por Tener M&aacute; de<b>1000</b> Post';
	//insetamos la medalla :D
	$db->query("INSERT INTO medallas (medalla, causa, fecha, usuario, detalles) VALUES ('$medalla', '$tipo', unix_timestamp(), '$autor', '$detalles')");
	//insetamos la notificacion
	$db->query("INSERT INTO notificaciones (id_autor, id_user, id_post, id_tema, id_comuni, puntos, detalle, detalle2, medalla, concepto, fecha, estatus) VALUES ('1', '$autor', '1', '1', '1', '', 'icon-medallas', 'medal', '$medalla', '$tipo', '$n2', '1')");//Avisamos De La Notificacion
	$sql = "Update usuarios Set notificaciones=notificaciones+'1' where id='".$autor."' ";
mysql_query($sql);

}}
//usuario mas posteador

//Usuario mas comuentado
$sql = "SELECT * FROM usuarios WHERE numcomentarios='200'";
$rs = mysql_query($sql);
while($row = mysql_fetch_array($rs))
{
$autor = $row['id'];

$sqlp=$db->query("SELECT id FROM medallas where usuario='$autor' AND causa='Usario Compulsivamente Comentador'");
$existep=$db->num_rows($sqlp);
if($existep==0){
$tipo = 'Usario Compulsivamente Comentador';
$medalla = 'medalla-oro';
$detalles = 'Distinguido como Usario Compulsivamente Comentador por Tener <b>200</b> Comentarios';
	//insetamos la medalla :D
	$db->query("INSERT INTO medallas (medalla, causa, fecha, usuario, detalles) VALUES ('$medalla', '$tipo', unix_timestamp(), '$autor', '$detalles')");
	//insetamos la notificacion
	$db->query("INSERT INTO notificaciones (id_autor, id_user, id_post, id_tema, id_comuni, puntos, detalle, detalle2, medalla, concepto, fecha, estatus) VALUES ('1', '$autor', '1', '1', '1', '', 'icon-medallas', 'medal', '$medalla', '$tipo', '$n2', '1')");//Avisamos De La Notificacion
	$sql = "Update usuarios Set notificaciones=notificaciones+'1' where id='".$autor."' ";
mysql_query($sql);

}}
//usuario mas comentado

//Usuario mas Posteador
$sql = "SELECT * FROM usuarios WHERE numposts>='200'";
$rs = mysql_query($sql);
while($row = mysql_fetch_array($rs))
{
$autor = $row['id'];

$sqlp=$db->query("SELECT id FROM medallas where usuario='$autor' AND causa='Usario Compulsivamente Posteador'");
$existep=$db->num_rows($sqlp);
if($existep==0){
$tipo = 'Usario Compulsivamente Posteador';
$medalla = 'medalla-oro';
$detalles = 'Distinguido como Usario Compulsivamente Posteador por Tener <b>200</b> post';
	//insetamos la medalla :D
	$db->query("INSERT INTO medallas (medalla, causa, fecha, usuario, detalles) VALUES ('$medalla', '$tipo', unix_timestamp(), '$autor', '$detalles')");
	//insetamos la notificacion
	$db->query("INSERT INTO notificaciones (id_autor, id_user, id_post, id_tema, id_comuni, puntos, detalle, detalle2, medalla, concepto, fecha, estatus) VALUES ('1', '$autor', '1', '1', '1', '', 'icon-medallas', 'medal', '$medalla', '$tipo', '$n2', '1')");//Avisamos De La Notificacion
	$sql = "Update usuarios Set notificaciones=notificaciones+'1' where id='".$autor."' ";
mysql_query($sql);

}}
//usuario mas posteador

//Usuario mas comuentado
$sql = "SELECT * FROM usuarios WHERE numcomentarios>='100'";
$rs = mysql_query($sql);
while($row = mysql_fetch_array($rs))
{
$autor = $row['id'];

$sqlp=$db->query("SELECT id FROM medallas where usuario='$autor' AND causa='Usario Muy Comentador'");
$existep=$db->num_rows($sqlp);
if($existep==0){
$tipo = 'Usario Muy Comentador';
$medalla = 'medalla-plata';
$detalles = 'Distinguido como Usario Muy Comentador por Tener <b>100</b> Comentarios';
	//insetamos la medalla :D
	$db->query("INSERT INTO medallas (medalla, causa, fecha, usuario, detalles) VALUES ('$medalla', '$tipo', unix_timestamp(), '$autor', '$detalles')");
	//insetamos la notificacion
	$db->query("INSERT INTO notificaciones (id_autor, id_user, id_post, id_tema, id_comuni, puntos, detalle, detalle2, medalla, concepto, fecha, estatus) VALUES ('1', '$autor', '1', '1', '1', '', 'icon-medallas', 'medal', '$medalla', '$tipo', '$n2', '1')");//Avisamos De La Notificacion
	$sql = "Update usuarios Set notificaciones=notificaciones+'1' where id='".$autor."' ";
mysql_query($sql);

}}
//usuario mas comentado

//Usuario mas Posteador
$sql = "SELECT * FROM usuarios WHERE numposts>='100'";
$rs = mysql_query($sql);
while($row = mysql_fetch_array($rs))
{
$autor = $row['id'];

$sqlp=$db->query("SELECT id FROM medallas where usuario='$autor' AND causa='Usario Muy Posteador'");
$existep=$db->num_rows($sqlp);
if($existep==0){
$tipo = 'Usario Muy Posteador';
$medalla = 'medalla-plata';
$detalles = 'Distinguido como Usario Muy Posteador por Tener <b>100</b> post';
	//insetamos la medalla :D
	$db->query("INSERT INTO medallas (medalla, causa, fecha, usuario, detalles) VALUES ('$medalla', '$tipo', unix_timestamp(), '$autor', '$detalles')");
	//insetamos la notificacion
	$db->query("INSERT INTO notificaciones (id_autor, id_user, id_post, id_tema, id_comuni, puntos, detalle, detalle2, medalla, concepto, fecha, estatus) VALUES ('1', '$autor', '1', '1', '1', '', 'icon-medallas', 'medal', '$medalla', '$tipo', '$n2', '1')");//Avisamos De La Notificacion
	$sql = "Update usuarios Set notificaciones=notificaciones+'1' where id='".$autor."' ";
mysql_query($sql);

}}
//usuario mas posteador

//Usuario mas comuentado
$sql = "SELECT * FROM usuarios WHERE numcomentarios>='50'";
$rs = mysql_query($sql);
while($row = mysql_fetch_array($rs))
{
$autor = $row['id'];

$sqlp=$db->query("SELECT id FROM medallas where usuario='$autor' AND causa='Usario Comentador'");
$existep=$db->num_rows($sqlp);
if($existep==0){
$tipo = 'Usario Comentador';
$medalla = 'medalla-bronce';
$detalles = 'Distinguido como Usario Comentador por Tener <b>50</b> Comentarios';
	//insetamos la medalla :D
	$db->query("INSERT INTO medallas (medalla, causa, fecha, usuario, detalles) VALUES ('$medalla', '$tipo', unix_timestamp(), '$autor', '$detalles')");
	//insetamos la notificacion
	$db->query("INSERT INTO notificaciones (id_autor, id_user, id_post, id_tema, id_comuni, puntos, detalle, detalle2, medalla, concepto, fecha, estatus) VALUES ('1', '$autor', '1', '1', '1', '', 'icon-medallas', 'medal', '$medalla', '$tipo', '$n2', '1')");//Avisamos De La Notificacion
	$sql = "Update usuarios Set notificaciones=notificaciones+'1' where id='".$autor."' ";
mysql_query($sql);

}}
//usuario mas comentado

//Usuario mas Posteador
$sql = "SELECT * FROM usuarios WHERE numposts>='50'";
$rs = mysql_query($sql);
while($row = mysql_fetch_array($rs))
{
$autor = $row['id'];

$sqlp=$db->query("SELECT id FROM medallas where usuario='$autor' AND causa='Usario Posteador'");
$existep=$db->num_rows($sqlp);
if($existep==0){
$tipo = 'Usario Posteador';
$medalla = 'medalla-bronce';
$detalles = 'Distinguido como Usario Posteador por Tener <b>50</b> post';
	//insetamos la medalla :D
	$db->query("INSERT INTO medallas (medalla, causa, fecha, usuario, detalles) VALUES ('$medalla', '$tipo', unix_timestamp(), '$autor', '$detalles')");
	//insetamos la notificacion
	$db->query("INSERT INTO notificaciones (id_autor, id_user, id_post, id_tema, id_comuni, puntos, detalle, detalle2, medalla, concepto, fecha, estatus) VALUES ('1', '$autor', '1', '1', '1', '', 'icon-medallas', 'medal', '$medalla', '$tipo', '$n2', '1')");//Avisamos De La Notificacion
	$sql = "Update usuarios Set notificaciones=notificaciones+'1' where id='".$autor."' ";
mysql_query($sql);

}}
//usuario mas posteador

//top post mas comentado
$sql = "SELECT * FROM posts WHERE comentarios>='2000'";
$rs = mysql_query($sql);
while($row = mysql_fetch_array($rs))
{
$autor = $row['id_autor'];
$id_post = $row['id'];

$sqlp=$db->query("SELECT id FROM medallas where usuario='$autor' AND causa='TOP Post Historico Mas Comentado'");
$existep=$db->num_rows($sqlp);
if($existep==0){
$tipo = 'TOP Post Historico Mas Comentado';
$medalla = 'medalla-diamante';
$detalles = 'Cre&oacute; el post m&aacute;s comentado de la historia';
	//insetamos la medalla :D
	$db->query("INSERT INTO medallas (medalla, causa, fecha, usuario, detalles) VALUES ('$medalla', '$tipo', unix_timestamp(), '$autor', '$detalles')");
	//insetamos la notificacion
	$db->query("INSERT INTO notificaciones (id_autor, id_user, id_post, id_tema, id_comuni, puntos, detalle, detalle2, medalla, concepto, fecha, estatus) VALUES ('1', '$autor', '$id_post', '1', '1', '', 'icon-medallas', 'medal', '$medalla', '$tipo', '$n2', '1')");	
	//Avisamos De La Notificacion
	$sql = "Update usuarios Set notificaciones=notificaciones+'1' where id='".$autor."' ";
mysql_query($sql);

}}
//Fin top post mas comentado

//top post mas puntuado
$sql = "SELECT * FROM posts WHERE puntos>='2000'";
$rs = mysql_query($sql);
while($row = mysql_fetch_array($rs))
{
$autor = $row['id_autor'];
$id_post = $row['id'];

$sqlp=$db->query("SELECT id FROM medallas where usuario='$autor' AND causa='TOP Post Historico Mas Puntuado'");
$existep=$db->num_rows($sqlp);
if($existep==0){
$tipo = 'TOP Post Historico Mas Puntuado';
$medalla = 'medalla-diamante';
$detalles = 'Cre&oacute; el post m&aacute;s puntuado de la historia';
	//insetamos la medalla :D
	$db->query("INSERT INTO medallas (id_posts, medalla, causa, fecha, usuario, detalles) VALUES ('$id_post', '$medalla', '$tipo', unix_timestamp(), '$autor', '$detalles')");
	//insetamos la notificacion
	$db->query("INSERT INTO notificaciones (id_autor, id_user, id_post, id_tema, id_comuni, puntos, detalle, detalle2, medalla, concepto, fecha, estatus) VALUES ('1', '$autor', '$id_post', '1', '1', '', 'icon-medallas', 'medal', '$medalla', '$tipo', '$n2', '1')");	
	//Avisamos De La Notificacion
	$sql = "Update usuarios Set notificaciones=notificaciones+'1' where id='".$autor."' ";
mysql_query($sql);

}}
//Fin top post mas puntuado

//top post mas comentado del mes
$fechames = time() - (2592000);
$sql = "SELECT * FROM posts WHERE comentarios>='500' AND fecha2 BETWEEN '$fechames' AND unix_timestamp()";
$rs = mysql_query($sql);
while($row = mysql_fetch_array($rs))
{
$autor = $row['id_autor'];
$id_post = $row['id'];

$sqlp=$db->query("SELECT id FROM medallas where usuario='$autor' AND causa='TOP Post Mensual Mas Comentado'");
$existep=$db->num_rows($sqlp);
if($existep==0){
$tipo = 'TOP Post Mensual Mas Comentado';
$medalla = 'medalla-platino';
$detalles = 'Cre&oacute; el post m&aacute;s comentado del Mes';
	//insetamos la medalla :D
	$db->query("INSERT INTO medallas (id_posts, medalla, causa, fecha, usuario, detalles) VALUES ('$id_post', '$medalla', '$tipo', unix_timestamp(), '$autor', '$detalles')");
	//insetamos la notificacion
	$db->query("INSERT INTO notificaciones (id_autor, id_user, id_post, id_tema, id_comuni, puntos, detalle, detalle2, medalla, concepto, fecha, estatus) VALUES ('1', '$autor', '$id_post', '1', '1', '', 'icon-medallas', 'medal', '$medalla', '$tipo', '$n2', '1')");	
	//Avisamos De La Notificacion
	$sql = "Update usuarios Set notificaciones=notificaciones+'1' where id='".$autor."' ";
mysql_query($sql);

}}
//Fin top post mas comentado del mes

//top post mas puntuado del mes
$fechames = time() - (2592000);
$sql = "SELECT * FROM posts WHERE puntos>='500' AND fecha2 BETWEEN '$fechames' AND unix_timestamp()";
$rs = mysql_query($sql);
while($row = mysql_fetch_array($rs))
{
$autor = $row['id_autor'];
$id_post = $row['id'];

$sqlp=$db->query("SELECT id FROM medallas where usuario='$autor' AND causa='TOP Post Mensual Mas Puntuado'");
$existep=$db->num_rows($sqlp);
if($existep==0){
$tipo = 'TOP Post Mensual Mas Puntuado';
$medalla = 'medalla-platino';
$detalles = 'Cre&oacute; el post m&aacute;s puntuado del Mes';
	//insetamos la medalla :D
	$db->query("INSERT INTO medallas (id_posts, medalla, causa, fecha, usuario, detalles) VALUES ('$id_post', '$medalla', '$tipo', unix_timestamp(), '$autor', '$detalles')");
	//insetamos la notificacion
	$db->query("INSERT INTO notificaciones (id_autor, id_user, id_post, id_tema, id_comuni, puntos, detalle, detalle2, medalla, concepto, fecha, estatus) VALUES ('1', '$autor', '$id_post', '1', '1', '', 'icon-medallas', 'medal', '$medalla', '$tipo', '$n2', '1')");	
	//Avisamos De La Notificacion
	$sql = "Update usuarios Set notificaciones=notificaciones+'1' where id='".$autor."' ";
mysql_query($sql);

}}
//Fin top post mas puntuado del mes 

//top post mas comentado de la semana
$fusemana = time() - (60*60*24*7);
$sql = "SELECT * FROM posts WHERE comentarios>='100'  AND fecha2 BETWEEN '$fusemana' AND unix_timestamp()";
$rs = mysql_query($sql);
while($row = mysql_fetch_array($rs))
{
$autor = $row['id_autor'];
$id_post = $row['id'];

$sqlp=$db->query("SELECT id FROM medallas where usuario='$autor' AND causa='TOP Post Semanal Mas Comentado'");
$existep=$db->num_rows($sqlp);
if($existep==0){
$tipo = 'TOP Post Semanal Mas Comentado';
$medalla = 'medalla-oro';
$detalles = 'Cre&oacute; el post m&aacute;s comentado de la Semana';
	//insetamos la medalla :D
	$db->query("INSERT INTO medallas (id_posts, medalla, causa, fecha, usuario, detalles) VALUES ('$id_post', '$medalla', '$tipo', unix_timestamp(), '$autor', '$detalles')");
	//insetamos la notificacion
	$db->query("INSERT INTO notificaciones (id_autor, id_user, id_post, id_tema, id_comuni, puntos, detalle, detalle2, medalla, concepto, fecha, estatus) VALUES ('1', '$autor', '$id_post', '1', '1', '', 'icon-medallas', 'medal', '$medalla', '$tipo', '$n2', '1')");	
	//Avisamos De La Notificacion
	$sql = "Update usuarios Set notificaciones=notificaciones+'1' where id='".$autor."' ";
mysql_query($sql);

}}
//Fin top post mas comentado de la semana

//top post mas puntuado de la semana
$fusemana = time() - (60*60*24*7);
$sql = "SELECT * FROM posts WHERE puntos>='100' AND fecha2 BETWEEN '$fusemana' AND unix_timestamp()";
$rs = mysql_query($sql);
while($row = mysql_fetch_array($rs))
{
$autor = $row['id_autor'];
$id_post = $row['id'];

$sqlp=$db->query("SELECT id FROM medallas where usuario='$autor' AND id_posts='$id_post'");
$existep=$db->num_rows($sqlp);
if($existep==0){
$tipo = 'TOP Post  Semanal Mas Puntuado';
$medalla = 'medalla-oro';
$detalles = 'Cre&oacute; el post m&aacute;s puntuado de la Semana';
	//insetamos la medalla :D
	$db->query("INSERT INTO medallas (id_posts, medalla, causa, fecha, usuario, detalles) VALUES ('$id_post', '$medalla', '$tipo', unix_timestamp(), '$autor', '$detalles')");
	//insetamos la notificacion
	$db->query("INSERT INTO notificaciones (id_autor, id_user, id_post, id_tema, id_comuni, puntos, detalle, detalle2, medalla, concepto, fecha, estatus) VALUES ('1', '$autor', '$id_post', '1', '1', '', 'icon-medallas', 'medal', '$medalla', '$tipo', '$n2', '1')");	
	//Avisamos De La Notificacion
	$sql = "Update usuarios Set notificaciones=notificaciones+'1' where id='".$autor."' ";
mysql_query($sql);

}}
//Fin top post mas puntuado de la semana
?>