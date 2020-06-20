<?php
($connect = mysqli_connect('127.0.0.1', 'root', '762486', 'board')) or die('fail');

$id = $_GET[name]; //Writer
$pw = $_GET[pw]; //Password
$title = $_GET[title]; //Title
$content = $_GET[content]; //Content
$date = date('Y-m-d H:i:s'); //Date

$tmpfile = $_FILES['b_file']['tmp_name'];
$o_name = $_FILES['b_file']['name'];
$filename = iconv('UTF-8', 'EUC-KR', $_FILES['b_file']['name']);
$folder = '../../upload/' . $filename;
move_uploaded_file($tmpfile, $folder);

$URL = './index.php'; //return URL

$query = "insert into board (number,title, content, date, hit, id, password, file) 
                        values(null,'$title', '$content', '$date',0, '$id', '$pw', '$o_name')";

$result = $connect->query($query);
if ($result) { ?>                  <script>
                        alert("<?php echo '글이 등록되었습니다.'; ?>");
                        location.replace("<?php echo $URL; ?>");
                    </script>
<?php } else {echo 'FAIL';}

mysqli_close($connect);
?>
