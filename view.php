<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://kit.fontawesome.com/cb33a58ccf.js";
crossorigin="anonymous";></script>
<link rel="stylesheet" href="css/style.css">
<title>devtinatina | 뷰 페이지</title>
</head>


<body>
    <?php
    $connect = mysqli_connect('127.0.0.1', 'root', '762486', 'board');
    $number = $_GET['number'];
    session_start();
    $query = "select title, content, date, hit, id from board where number =$number";
    $result = $connect->query($query);
    $rows = mysqli_fetch_assoc($result);
    $hit = "update board set hit=hit+1 where number=$number"; // 조회수
    $connect->query($hit);
    ?>
 
        <table class="view_table" align=center>
        <tr>
                <td colspan="4" class="view_title"><?php echo $rows['title']; ?></td>
        </tr>
        <tr>
                <td class="view_id">작성자</td>
                <td class="view_id2"><?php echo $rows['id']; ?></td>
                <td class="view_hit">조회수</td>
                <td class="view_hit2"><?php echo $rows['hit']; ?></td>
        </tr>
 
 
        <tr>
                <td colspan="4" class="view_content" valign="top">
                <?php echo $rows['content']; ?></td>
        </tr>

        <!-- 파일 첨부 기능 -->
        <tr>
        
        </tr>
        </table>
 
        <!-- 수정 & 삭제 -->
        <div class="view_btn">
                <button class="view_btn1" onclick="location.href='./index.php'">목록으로</button>
                <button class="view_btn1" onclick="location.href='./modify.php?number=<?= $number ?>&id=<?= $_SESSION[
    'userid'
] ?>'">수정</button>
                <button class="view_btn1" onclick="location.href='./delete.php?number=<?= $number ?>&id=<?= $_SESSION[
    'userid'
] ?>'">삭제</button>
        </div>
</body>
</html>



