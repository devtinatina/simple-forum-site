<!DOCTYPE html>
<html>
<head>
<meta charset = 'utf-8'>
<script src="https://kit.fontawesome.com/cb33a58ccf.js";
crossorigin="anonymous";></script>
<link rel="stylesheet" href="css/style.css">
<title>devtinatina | 메인 페이지</title>
</head>
<body>
<?php
($connect = mysqli_connect('127.0.0.1', 'root', '762486', 'board')) or die('connect fail');
$query = 'select * from board order by number desc';
$result = $connect->query($query);
$total = mysqli_num_rows($result);

session_start();

if (isset($_SESSION['userid'])) { ?>
    <span class="welcome">어서오세요 </span> 
    <?php echo $_SESSION['userid']; ?>
                <button onclick="location.href='./logout_action.php'">로그아웃</button>
        <?php } else { ?>              <button onclick="location.href='./login.php'">로그인</button>
        <?php }
?>

        <h2 align=center>리뷰 게시판</h2>
        <table align = center>
        <thead align = "center">
        <tr>
        <td width = "50" align="center">번호</td>
        <td width = "500" align = "center">제목</td>
        <td width = "100" align = "center">작성자</td>
        <td width = "200" align = "center">날짜</td>
        <td width = "50" align = "center">조회수</td>
        </tr>
        </thead>
 
        <tbody>
        <?php while ($rows = mysqli_fetch_assoc($result)) {
            //DB에 저장된 데이터 수 (열 기준)
            if ($total % 2 == 0) { ?>                      <tr class = "even">
                        <?php } else { ?>                      <tr>
                        <?php } ?>
               <td width = "50" align = "center"><?php echo $total; ?></td>
                <td width = "500" align = "center">
                <a href = "view.php?number=<?php echo $rows['number']; ?>">
                <?php echo $rows['title']; ?></td>
                  <td width = "100" align = "center"><?php echo $rows['id']; ?></td>
                <td width = "200" align = "center"><?php echo $rows['date']; ?></td>
                <td width = "50" align = "center"><?php echo $rows['hit']; ?></td>
                </tr>
        <?php $total--;
        } ?>
       </tbody>
        </table>
 
        <div class = text>
        <span onClick="location.href='./write.php'">글작성</span>
        </div>
</body>
</html>