<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Wish : Admin Panel</title>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/bootstrap.min.css" />
    </head>

<style type="text/css">
.admin_login{
	  bottom: 0;
	  left:0;                
	  position: absolute;                
	  right: 0;
	  top:0;
	  margin-left: auto;
	  height: 250px;
	  margin-right: auto;
	  margin-top: auto;
	  margin-bottom: auto;
	  border:1px solid #ccc;
	  padding:20px;
}
</style>   
<body>
        
        <div class="row">
        	<div class="col-md-4"></div>
            <div class="col-md-4 admin_login">
            <h2 style="text-align:center">Manager Login</h2>
            	<?php echo validation_errors(); ?>
                <form action="<?php echo $action; ?>" method="post" class="form-horizontal">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">User Name</label>
                    <div class="col-sm-8">
                      <input type="text" name="username" class="form-control" id="inputEmail3" placeholder="User name">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPassword3" class="col-sm-4 control-label">Password</label>
                    <div class="col-sm-8">
                      <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                    <input type="submit" name="login" value="Login" class="btn btn-info">
                      
                    </div>
             	 </div>
         		</form>
             </div>
             <div class="col-md-4"></div>
        </div> 
    </body>
</html>
