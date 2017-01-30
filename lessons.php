<?php 
include ("blocks/bd.php"); /*Соединяемся с базой*/
$result = mysql_query("SELECT title,meta_d,meta_k,text FROM settings WHERE page='lessons'",$db);
$myrow = mysql_fetch_array($result); 
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta name="description" content="<?php echo $myrow['meta_d']; ?>">
<meta name="keywords" content="<?php echo $myrow['meta_k']; ?>">

<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<title><?php echo $myrow['title']; ?></title>
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
          <p><?php echo $myrow['text']; ?>          </p>
          
          
<?php  

$result = mysql_query ("SELECT id,title,description,author,date FROM lessons",$db);

$myrow = mysql_fetch_array ($result); 

do {
        
printf ("<table align='center' class='lesson'>
         
		 <tr>
         <td class='lesson_title'>
		 <p class='lesson_name'><a href='view_lesson.php?id=%s'>%s</a></p>
		 <p class='lesson_adds'>Дата додавання: %s</p>
		 <p class='lesson_adds'>Автор статті: %s</p></td>
         </tr>
         
		 <tr>
         <td>%s</td>
         </tr>
         
		 </table><br><br>", $myrow["id"], $myrow["title"],$myrow["date"],$myrow["author"],$myrow["description"]); 
		  		  
}

while ($myrow = mysql_fetch_array ($result));	
?>	  
		  
		           
          <p>&nbsp;</p></td>
      </tr>
    </table></td>
  </tr>
<!--Подключаем нижний графический элемент-->  
<?  include ("blocks/footer.php");        ?>  
</table>
</body>
</html>
