<?php include ROOT."content/theme/header.php";?>
	<?php if(isset($_SESSION['LOGIN'])){ ?>
		<div class="wrapper">
            <div class="container">
                <div class="row">
                    <div class="span3">
					<?php include ROOT."content/page/sidebar.php";?>
					</div>
					<div class="span9">
                        <div class="content">
							<div class="row-fluid">
                                <div class="span12">
									<?=$GLOBALS['notice']->showSuccess();?>
                                    <?=$GLOBALS['notice']->showError();?>
                                </div>
                            </div>
                                <div class="btn-box-row row-fluid">
                                <div class="row-fluid">
								<?php include ROOT."content/theme/banner.php";?>
							</div>
                          </div>
							<div class="module">
                                <div class="module-head">
                                    <h3><i class=" icon-lock"></i> Change Password</h3>
                                </div>
										<div class="module-body">
											<form method="post" action="<?=$GLOBALS['_CONF']['HTTP'];?>?page=changepassword_do" class="form-horizontal row-fluid">
												<div class="control-group">
													<label class="control-label" for="basicinput">New Password</label>
													<div class="controls">
														<input  type="password" class="span8 tip" name="cpassword1" placeholder="**********">
													</div>
												</div>
												<div class="control-group">
													<label class="control-label" for="basicinput">Comfirm New Password</label>
													<div class="controls">
														<input  type="password" class="span8 tip" name="cpassword2" placeholder="**********">
													</div>
												</div>
												<div class="control-group">
													<label class="control-label" for="basicinput">Old Password</label>
													<div class="controls">
														<input  type="password" class="span8 tip" name="password" placeholder="**********">
													</div>
												</div>
												<div class="control-group">
													<div class="controls">
												<input type="submit" class="btn btn-success" value=" Submit "><br><br>
													</div>
												</div>
											</form>
										</div>
									</div>								
								</div>
							</div>
						</div>
					</div>
				</div>
	<?php 
	} else {
		header("location: ".$GLOBALS['_CONF']['HTTP']);
	} ?>
<?php include ROOT."content/theme/footer.php"; ?>