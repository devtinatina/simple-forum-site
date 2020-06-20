<!DOCTYPE html>
<html>
<head>
<meta charset = 'utf-8'>
<script src="https://kit.fontawesome.com/cb33a58ccf.js";
crossorigin="anonymous";></script>
<link rel="stylesheet" href="css/style.css">
<title>devtinatina | 글쓰기 페이지</title>
</head>

<body>

        <?php
        session_start();
        $URL = './index.php';
        if (!isset($_SESSION['userid'])) { ?>
 
                <script>
                        alert("need login !!");
                        location.replace("<?php echo $URL; ?>");
                </script>
        <?php }
        ?>
 
        <form method = "get" action = "write_action.php" enctype="multipart/form-data">
        <table  style="padding-top:50px" align = center width=700 border=0 cellpadding=2 >
                <tr>
                <td height=20 align= center bgcolor=#ccc><font color=black> 글쓰기</font></td>
                </tr>
                <tr>
                <td bgcolor=white>
                <table class = "table2">
                        <tr>
                        <td>
                                <span>User</span>
                        </td>
                        <td><input type="hidden" name="name" value="<?= $_SESSION[
                            'userid'
                        ] ?>"><?= $_SESSION['userid'] ?></td>
                        </tr>
 
                        <tr>
                        <td>
                                <span>Title</span>
                        </td>
                        <td><input type = text name = title size=60></td>
                        </tr>
 
                        <tr>
                        <td>
                                <span>Contents</span>
                        </td>
                        <td><textarea name = content cols=85 rows=15></textarea></td>
                        </tr>

                        <tr>
                        <td>
                                <span>File</span>
                        </td>
                        <td><input type = "file" name = "b_file"></td>
                        </tr>
 
                        </table>
                          <center>
                        <input type = "submit" value="작성">
                        </center>
                </td>
                </tr>
        </table>
        </form>
</body>
</html>