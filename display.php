<?php
    include 'connect.php';

    $sql = "select * from `house`";
    $result = mysqli_query($con, $sql);
    if ($result){
        while($row=mysqli_fetch_assoc($result)){
            $txtid=$row['id'];
            $txthouseCode = $row['houseCode'];
            $txthouseNo = $row['houseNo'];
            $txtsubNo  = $row['subNo'];
            $txtstreet = $row['street'];
            $txttown = $row['town'];
            $txtpaxCap = $row['paxCap'];
            $txtextra = $row['extra'] ;
            $txtrentRate = $row['rentRate'] ;
        }
        
    }
    
    if (isset($_POST['cmdSearch'])){
        $txtSearch=$_POST['txtSearch'];

        $sql = "select * from `house` where houseCode=$txtSearch";
        $result = mysqli_query($con, $sql);
        if($result){

            while($row=mysqli_fetch_assoc($result)){
                $txtid=$row['id'];
                $txthouseCode = $row['houseCode'];
                $txthouseNo = $row['houseNo'];
                $txtsubNo  = $row['subNo'];
                $txtstreet = $row['street'];
                $txttown = $row['town'];
                $txtpaxCap = $row['paxCap'];
                $txtextra = $row['extra'];
                $txtrentRate = $row['rentRate'];
            }

        }else{
            echo "Select statement error!";
        }
        
    }
    //-----------------------------------------------
    if (isset($_POST['cmdSave'])){
        $newPress=$_POST['newPress'];
        $txtid=$_POST['txtid'];
        $txthouseCode=$_POST['txthouseCode'];
        $txthouseNo=$_POST['txthouseNo'];
        $txtsubNo=$_POST['txtsubNo'];
        $txtstreet=$_POST['txtstreet'];
        $txttown=$_POST['txttown'];
        $txtpaxCap=$_POST['txtpaxCap'];
        $txtextra=$_POST['txtextra'];
        $txtrentRate=$_POST['txtrentRate'];

        if($newPress === "false"){
            $sql="update `house` set id='$txtid', houseCode='$txthouseCode', houseNo='$txthouseNo', subNo='$txtsubNo', street='$txtstreet', town='$txttown', paxCap='$txtpaxCap', extra='$txtextra', rentRate='$txtrentRate' where houseCode='$txthouseCode'";

            $result=mysqli_query($con, $sql);
            if($result){
                echo "Record is updated";
            }else{
                die(mysql_error($con));
            }

        }elseif($txthouseCode <> ""){
            $sql = "select * from `house` where houseCode=$txthouseCode";

            $result = mysqli_query($con, $sql);
            if($result){
                if(mysqli_num_rows($result)>0){
                    echo"HouseCode already exist!";
                }else{
                    $sql="insert into `house` (houseCode,houseNo,subNo,street,town,paxCap,extra,rentRate) values ('$txthouseCode', '$txthouseNo', '$txtsubNo', '$txtstreet', '$txttown', '$txtpaxCap', '$txtextra', '$txtrentRate')";
            
                    $result=mysqli_query($con, $sql);
                    if($result){
                        echo "New record is added";
                    }else{
                        die(mysql_error($con));
                    }
                }
            }else{
                die(mysql_error($con));
            }  
        }

    }
    
    //-----------------------------------------------
    if(isset($_POST['cmdNoSave'])){
        header('location:display.php');
    }
    //-----------------------------------------------
    if(isset($_POST['cmdPrev'])){
        $txtid = $_POST['txtid'];

        $sql = "select * from `house` where id<$txtid order by id";
        $result = mysqli_query($con, $sql);
        if($result){
            if(mysqli_num_rows($result)>0){
                 while($row=mysqli_fetch_assoc($result)){
                    $txtid=$row['id'];
                    $txthouseCode = $row['houseCode'];
                    $txthouseNo = $row['houseNo'];
                    $txtsubNo  = $row['subNo'];
                    $txtstreet = $row['street'];
                    $txttown = $row['town'];
                    $txtpaxCap = $row['paxCap'];
                    $txtextra = $row['extra'];
                    $txtrentRate = $row['rentRate'];
                 }
                 
            }else{
                $sql = "select * from `house` order by id desc";

                $result = mysqli_query($con, $sql);
                if($result){
                    while($row=mysqli_fetch_assoc($result)){
                        $txtid=$row['id'];
                        $txthouseCode = $row['houseCode'];
                        $txthouseNo = $row['houseNo'];
                        $txtsubNo  = $row['subNo'];
                        $txtstreet = $row['street'];
                        $txttown = $row['town'];
                        $txtpaxCap = $row['paxCap'];
                        $txtextra = $row['extra'];
                        $txtrentRate = $row['rentRate'];
                    }
                }
            }
        }else{
            die(mysql_error($con));
        }

    }
    //-----------------------------------------------
    if(isset($_POST['cmdNext'])){
        $txtid = $_POST['txtid'];

        $sql = "select * from `house` where id>$txtid order by id desc";
        $result = mysqli_query($con, $sql);
        if($result){
            while($row=mysqli_fetch_assoc($result)){
                $txtid=$row['id'];
                $txthouseCode = $row['houseCode'];
                $txthouseNo = $row['houseNo'];
                $txtsubNo  = $row['subNo'];
                $txtstreet = $row['street'];
                $txttown = $row['town'];
                $txtpaxCap = $row['paxCap'];
                $txtextra = $row['extra'];
                $txtrentRate = $row['rentRate'];
            }
        }else{
            $sql = "select * from `house`";

            $result = mysqli_query($con, $sql);
            if($result){
                while($row=mysqli_fetch_assoc($result)){
                    $txtid=$row['id'];
                    $txthouseCode = $row['houseCode'];
                    $txthouseNo = $row['houseNo'];
                    $txtsubNo  = $row['subNo'];
                    $txtstreet = $row['street'];
                    $txttown = $row['town'];
                    $txtpaxCap = $row['paxCap'];
                    $txtextra = $row['extra'];
                    $txtrentRate = $row['rentRate'];
                }
            }else{
                die(mysql_error($con));
            }
        }
        
    }
    //-----------------------------------------------
    if(isset($_POST['cmdExit'])){
        exit("Bye Bye");
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <title>Define House</title>
</head>
<body>
<form method="post">
    <label>HouseCode Search</label>
    <input type="text" class="txtSearch" name="txtSearch">
    <input type="submit" name="cmdSearch" value="Search">
    <br>

    <input type="text" id="newPress" name="newPress" value="" hidden>
    <br>

    <input type="text" class="txtData" name="txtid" value="<?php echo $txtid; ?>" hidden >
    <br>

    <label>House Code</label>
    <input type="text" id="txthouseCode" class="txtData" name="txthouseCode" value="<?php echo $txthouseCode; ?>" disabled="true">
    <br>

    <label>House No</label>
    <input type="text" class="txtData" name="txthouseNo" value="<?php echo $txthouseNo; ?>" disabled="true">
    <br>

    <label>Sub No</label>
    <input type="text" class="txtData" name="txtsubNo" value="<?php echo $txtsubNo; ?>" disabled="true">
    <br>

    <label>Street</label>
    <input type="text" class="txtData" name="txtstreet" value="<?php echo $txtstreet; ?>" disabled="true">
    <br>

    <label>Township</label>
    <input type="text" class="txtData" name="txttown" value="<?php echo $txttown; ?>" disabled="true">
    <br>

    <label>Pax Cap</label>
    <input type="text" class="txtData" name="txtpaxCap" value="<?php echo $txtpaxCap; ?>" disabled="true">
    <br>

    <label>Extra</label>
    <input type="text" class="txtData" name="txtextra" value="<?php echo $txtextra; ?>" disabled="true">
    <br>

    <label>Rent Rate</label>
    <input type="text" class="txtData" name="txtrentRate" value="<?php echo $txtrentRate; ?>" disabled="true">
    <br>

    <input type="button" id="cmdAdd" name="cmdAdd" value="New House" onclick="newPressTrue()">
    <input type="button" id="cmdEdit" name="cmdEdit" value="Edit" onclick="newPressFalse()">
    <input type="submit" id="cmdSave" name="cmdSave" value="Save" disabled="true">
    <input type="submit" id="cmdNoSave" name="cmdNoSave" value="No Save" disabled="true">
    <input type="submit" id="cmdPrev" name="cmdPrev" value="Previous">
    <input type="submit" id="cmdNext" name="cmdNext" value="Next">
    <input type="submit" id="cmdExit" name="cmdExit" value="Exit">

</form>
<script>
function newPressTrue(){
    document.getElementById('newPress').value="true";
    
    const nodeList = document.querySelectorAll(".txtData");
    for (let i = 0; i < nodeList.length; i++) {
      nodeList[i].value="";
    }
    saveState();

}

function newPressFalse(){
    document.getElementById('newPress').value="false";

    saveState();
    document.getElementById('txthouseCode').readOnly=true;
}

function saveState(){
    const nodeList = document.querySelectorAll(".txtData");
    for (let i = 0; i < nodeList.length; i++) {
      nodeList[i].disabled=false;
    }

    document.getElementById("cmdAdd").disabled=true;
    document.getElementById("cmdEdit").disabled=true;
    document.getElementById("cmdSave").disabled=false;
    document.getElementById("cmdNoSave").disabled=false;
   
}

</script>
</body>

</html>