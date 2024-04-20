<?php
    use Models\user as user;
    $user = new user();
    $category = $user->toCategory();
    

    if($_POST){
        $Id = $_POST["txtId"];
        $UserName = $_POST["txtUserName"];
        $Password = $_POST["txtPassword"];
        $Name = $_POST["txtName"];
        $Email = $_POST["txtEmail"];
        $Phone = $_POST["txtPhone"];
        $Category_Id = $_POST["cboCategory"];
        $Administrator = (isset($_POST["chkAdministrator"])?"1":"0");
        $Active = (isset($_POST["chkActive"])?"1":"0");

        $query = "
            UPDATE users
            SET Username = '$UserName',
            Password = '$Password',
            Name = '$Name',
            Email = '$Email',
            Phone = '$Phone',
            Category_Id = '$Category_Id',
            Administrator = '$Administrator',
            Active = '$Active',
            Avatar = ''
            WHERE Id = '$Id';";

        $user->Registry($query);
        //echo $query;
    
        }

?>
<form method="post">
<div class="row">
<div class="col-md-12">
    <div class="title">
        <h3 class="tile-title">Registro de Usuario</h3>   
    <div class="tile-body">
       

        <input id="txtId" name="txtId" class="form-control" type="hidden" placeholder="Id" value="<?= $JData["Id"]; ?>">
        

       <div class="row">
        <div class="col-md-3">
                <label class="form-label" for="txtUserName">UserName</label>
                <input id="txtUserName" name="txtUserName" class="form-control" type="text" placeholder="UserName" value="<?= $JData["Username"]; ?>">
            </div>

            <div class="col-md-3">
                <label class="form-label" for="txtPassword">Password</label>
                <input id="txtPassword" name="txtPassword" class="form-control" type="password" placeholder="Password" value="<?= $JData["Password"]; ?>">
            </div>
       </div>

        <div class="mb-3">
            <label class="form-label" for="txtName">Name</label>
            <input id="txtName" name="txtName" class="form-control" type="text" placeholder="Name" value="<?= $JData["Name"]; ?>">
        </div>

        <div class="row">
            <div class="mb-3 col-md-8">
                <label class="form-label" for="txtEmail">Email</label>
                <input id="txtEmail" name="txtEmail" class="form-control" type="email" placeholder="Email" value="<?= $JData["Email"]; ?>">
            </div>

            <div class="mb-3 col-md-4">
                <label class="form-label" for="txtPhone">Phone</label>
                <input id="txtPhone" name="txtPhone" class="form-control" type="text" placeholder="Phone" value="<?= $JData["Phone"]; ?>">
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label" for="cboCategory">Category</label>
            <select name="cboCategory" id="cboCategory" class="form-control">
                <?php
                    foreach($category as $key => $value){
                        $select = trim($value["Id"]) == trim($JData["Category_Id"]) ? "selected":"";
                        echo '<option '.$select.' value="'.$value["Id"].'">'.$value["Description"].'</option>';    
                    }
                ?>
            </select>
        </div>

        <div class="mb-3">
            <div class="form-check">
            <label class="form-check-label">
                <input id="chkAdministrator" name="chkAdministrator" class="form-check-input" type="checkbox" <?= $JData["Administrator"]==1?"checked":""; ?> > Administrator
            </label>
            </div>
        </div>

        <div class="mb-3">
            <div class="form-check">
            <label class="form-check-label">
                <input id="chkActive" name="chkActive" class="form-check-input" type="checkbox" <?= $JData["Active"]==1?"checked":""; ?>> Active
            </label>
            </div>
        </div>

        
    </div>
    <div class="tile-footer">
        <button class="btn btn-primary" type="submit"><i class="bi bi-check-circle-fill me-2"></i>Register</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="/User"><i class="bi bi-x-circle-fill me-2"></i>Cancel</a>
    </div>
    </div>
</div>
</div>
</form>