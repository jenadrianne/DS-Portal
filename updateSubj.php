<?php 
  include("controllers/admin_cSqlConnect.php");
  session_start();

  $_SESSION['rowID'] = $_GET['subjID'];
  
?>
<html>
<head>
</head>
<body>
	<form action="updateSubjProcess.php" method="POST" id="subject">
          <div class="form-group">
            <label for="subjCode">Subject Code</label>
             <input type="text" class="form-control" name="subjCode" placeholder="Subject Code" value='<?php echo $_GET['subjCode'];?>' required>
          </div>
          <div class="form-group">
            <label for="subjDesc">Subject Description</label>
            <input type="text" class="form-control" name="subjDesc" placeholder="Subject Description" value='<?php echo $_GET['subjDesc']?>'required>
          </div>

          <input type="submit" class="btn btn-success" value="UPDATE" name="save">      
    </form>
</body>
</html>