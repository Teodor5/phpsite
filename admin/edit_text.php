<?php 
include ("lock.php");
include ("blocks/bd.php");
if (isset($_GET['id'])) {$id = $_GET['id'];}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<title>Страница изменения текстов</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<table width="690" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" class="main_border">
<!--Подключаем шапку сайта-->
<? include("blocks/header.php");   ?> 
  <tr>
    <td><table width="690" border="0" cellspacing="0" cellpadding="0">
      <tr>
<!--Подключаем левый блок сайта-->
<? include ("blocks/lefttd.php");  ?>      
        <td valign="top">
<p><strong>Виберіть сторінку для редагування</strong></p>      
<? 

if (!isset($id))

{
$result = mysql_query("SELECT title,id FROM settings");      
$myrow = mysql_fetch_array($result);

do 
{
printf ("<p><a href='edit_text.php?id=%s'>%s</a></p>",$myrow["id"],$myrow["title"]);
}

while ($myrow = mysql_fetch_array($result));

}

else

{

$result = mysql_query("SELECT * FROM settings WHERE id=$id");      
$myrow = mysql_fetch_array($result);

print <<<HERE

<form name="form1" method="post" action="update_text.php">
         <p>
           <label>Введіть назву сторінки (тег title)<br>
             <input value="$myrow[title]" type="text" name="title" id="title">
             </label>
         </p>
         <p>
           <label>Введіть короткий опис сторінки<br>
           <input value="$myrow[meta_d]" type="text" name="meta_d" id="meta_d">
           </label>
         </p>
         <p>
           <label>Введіть ключові слова сторінки<br>
           <input value="$myrow[meta_k]" type="text" name="meta_k" id="meta_k">
           </label>
         </p>
        
         <p>
           <label>Введіть повний текст сторінки з тегами
           <textarea name="text" id="text" cols="40" rows="20">$myrow[text]</textarea>
           </label>
         </p>
         
		 <input name="id" type="hidden" value="$myrow[id]">
		 
         <p>
           <label>
           <input type="submit" name="submit" id="submit" value="Зберегти зміни">
           </label>
         </p>
       </form>



HERE;
}


?>
       
       
       </td>
      </tr>
    </table></td>
  </tr>
<!--Подключаем нижний графический элемент-->  
<?  include ("blocks/footer.php");        ?>  
</table>
</body>
</html>
