<!DOCTYPE html>
<?php
$fule_rate = 0.14 + 0.135;

if ($_POST['distance']!=NULL)
{
    $distance = $_POST['distance'];
}
else
{
    $distance = 220;
}
if ($_POST['num_person']!=NULL)
{
    $num_person = $_POST['num_person'];
}
else
{
    $num_person = 3;
}
if ($_POST['num_car']!=NULL)
{
    $num_car = $_POST['num_car'];
}
else
{
    $num_car = 1;
}
if ($_POST['etc']!=NULL)
{
    $etc = $_POST['etc'];
}
else
{
    $etc = 10;
}

?>

<html lang="ko">
<head>
  <title>동출비 계산</title>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
<div class="container">
    <form class="form-horizontal" action="cal.php" method="post">
        <div class="row">
            <div class="col-sm-3">
                <label>왕복거리:</label>
            </div>
            <div class="col-sm-3"> 
                <select class="form-control" id="distance" name="distance" required>
                    <option value="100" <?php echo($distance==100?"selected":"") ?>>100km</option>
                    <option value="150" <?php echo($distance==150?"selected":"") ?>>150km</option>
                    <option value="200" <?php echo($distance==200?"selected":"") ?>>200km</option>
                    <option value="220" <?php echo($distance==220?"selected":"") ?>>220km: 스내퍼</option>
                    <option value="250" <?php echo($distance==250?"selected":"") ?>>250km</option>                    
                    <option value="300" <?php echo($distance==300?"selected":"") ?>>300km: 뉴카슬</option>
                    <option value="350" <?php echo($distance==350?"selected":"") ?>>350km</option>
                    <option value="410" <?php echo($distance==410?"selected":"") ?>>400km: 참호</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3">
                <label>사람수:</label>
            </div>
            <div class="col-sm-3"> 
                <select class="form-control" id="num_person" name="num_person" required>
                    <option value="2" <?php echo($num_person==2?"selected":"") ?>>2</option>
                    <option value="3" <?php echo($num_person==3?"selected":"") ?>>3</option>
                    <option value="4" <?php echo($num_person==4?"selected":"") ?>>4</option>
                    <option value="5" <?php echo($num_person==5?"selected":"") ?>>5</option>
                    <option value="6" <?php echo($num_person==6?"selected":"") ?>>6</option>
                    <option value="7" <?php echo($num_person==7?"selected":"") ?>>7</option>
                    <option value="8" <?php echo($num_person==8?"selected":"") ?>>8</option>
                    <option value="9" <?php echo($num_person==9?"selected":"") ?>>9</option>
                    <option value="10" <?php echo($num_person==10?"selected":"") ?>>10</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3">
                <label>차량수:</label>
            </div>
            <div class="col-sm-3"> 
                <select class="form-control" id="num_car" name="num_car" required>
                    <option value="1" <?php echo($num_car==1?"selected":"") ?>>1</option>
                    <option value="2" <?php echo($num_car==2?"selected":"") ?>>2</option>
                    <option value="3" <?php echo($num_car==3?"selected":"") ?>>3</option>
                    <option value="4" <?php echo($num_car==4?"selected":"") ?>>4</option>
                    <option value="5" <?php echo($num_car==5?"selected":"") ?>>5</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3">
                <label>기타:</label>
            </div>
            <div class="col-sm-3"> 
                <input type="number" id="etc" name="etc" min="0" max="100" value="<?php echo $etc?>">
            </div>
        </div>
        <br><br>
        <div class="row">
            <div class="col-sm-5"> 
            </div>
            <div class="col-sm-2"> 
                <button type="submit" class="btn btn-primary btn-block">확인</button>
            </div>
        </div>
    </form>
</div>
<br><br>
<?php
$_fule = $fule_rate * $distance * $num_car;
$_etc = $etc;
$_total = $_fule + $_etc;
$_per_person = $_total / $num_person;
$_driver_get = ($_total - $_etc - $_per_person*$num_car) / $num_car;
if ($_POST['distance']!=NULL)
{
    printf('<div class="alert alert-success">');
    printf('    <strong>기름값: </strong> $%d', $_fule);
    printf('</div>');
    
    printf('<div class="alert alert-success">');
    printf('    <strong>총: </strong> $%d', $_total);
    printf('</div>');

    printf('<div class="alert alert-success">');
    printf('    <strong>개인 동출비(운전자 제외): </strong> $%d', $_per_person);
    printf('</div>');

    printf('<div class="alert alert-success">');
    printf('    <strong>운전자(받음): </strong> $%d', $_driver_get);
    printf('</div>');
}
?>
</body>
</html>
