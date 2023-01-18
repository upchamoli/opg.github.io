<?PHP
include 'db/dbhandler.php';
    if(isset($_POST['picsubmit'])){
        extract($_POST);
        
        $tmpname = $_FILES['userpic']['tmp_name'];
        $pic = addslashes(file_get_contents($tmpname));
        
        if(!mysqli_query($conn, "UPDATE users SET profilephoto='$pic' WHERE userid = '$uid'")){
            echo '<script>'.mysqli_error($conn).'"</script>';
        }
        
        echo '<script>window.href="profile.php?uname1='.$uname.'"</script>';
    }

?>
<!---- Upload Profile pic Modal -->
    <div class="modal" id="uploadpropic">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Change Profile Pic</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="hidden" name="uname1" value="<?PHP echo $uname ?>">
                        </div>
                        <div class="form-group">
                            <label>Profile Pic : </label>
                            <input type="file" class="form-control-file" name="userpic" required>
                        </div>
                        <br><hr>
                        <center><input type="submit" name="picsubmit" class="btn btn-success"></center>
                    </form>
                </div>
            </div>
        </div>
    </div>
