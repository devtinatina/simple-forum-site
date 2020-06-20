<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://kit.fontawesome.com/cb33a58ccf.js";
crossorigin="anonymous";></script>
<link rel="stylesheet" href="css/style.css">
<title>devtinatina | 수정 페이지</title>
</head>
<body>
        
<?php
($connect = mysqli_connect('127.0.0.1', 'root', '762486', 'board')) or die('connect fail');
$id = $_GET['id'];
$number = $_GET['number'];
$query = "select title, content, date, id from board where number=$number";
$result = $connect->query($query);
$rows = mysqli_fetch_assoc($result);

$title = $rows['title'];
$content = $rows['content'];
$usrid = $rows['id'];

session_start();

$URL = './index.php';

if (!isset($_SESSION['userid'])) { ?>              <script>
                                alert("권한이 없습니다.");
                                location.replace("<?php echo $URL; ?>");
                        </script>
        <?php } elseif ($_SESSION['userid'] == $usrid) { ?>
        <form method = "get" action = "modify_action.php">
        <table  style="padding-top:50px" align = center width=700 border=0 cellpadding=2 >
                <tr>
                <td height=20 align= center bgcolor=lightgray><font color=black> 글수정</font></td>
                </tr>
                <tr>
                <td bgcolor=white>
                <table class = "table2">
                <tr>
                        <td>User</td>
                        <td><input type="hidden" name="id" value="<?= $_SESSION[
                            'userid'
                        ] ?>"><?= $_SESSION['userid'] ?></td>
                        </tr>
 
                        <tr>
                        <td>Title</td>
                        <td><input type = text name = title size=60 value="<?= $title ?>"></td>
                        </tr>
 
                        <tr>
                        <td>Contents</td>
                        <td><textarea name = content cols=85 rows=15><?= $content ?></textarea></td>
                        </tr>
 
                        </table>
 
                        <center>
                        <input type="hidden" name="number" value="<?= $number ?>">
                        <input type = "submit" value="작성">
                        </center>
                </td>
                </tr>
        </table>
        <?php } else { ?>              <script>
                                alert("권한이 없습니다.");
                                location.replace("<?php echo $URL; ?>");
                        </script>
        <?php }
?>

</body>
</html>


