<?php
($connect = mysqli_connect('127.0.0.1', 'root', '762486', 'board')) or die('connect fail');
$number = $_GET['number'];
$query = "select id from board where number=$number";
$result = $connect->query($query);
$rows = mysqli_fetch_assoc($result);

$usrid = $rows['id'];

session_start();

$URL = './index.php';

if (!isset($_SESSION['userid'])) { ?>              <script>
                                alert("권한이 없습니다.");
                                location.replace("<?php echo $URL; ?>");
                        </script>
        <?php } elseif ($_SESSION['userid'] == $usrid) { ?>
            <?php
            $query = "delete from board where number='$number'";
            $result = $connect->query($query);
            if ($result) { ?>
            <script>
                alert('삭제되었습니다.');
                location . replace("<?php echo $URL; ?>");
            </script>
                <?php } else { ?>
            <script>
                alert('삭제 실패!.');
                location . replace("<?php echo $URL; ?>");
            </script>
                <?php }
            ?>
        <?php }
?>
