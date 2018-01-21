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
                                    <h3><i class=" icon-barcode"></i> Setting</h3>
                                </div>
										<div class="module-body">
										<?php 
										$db->go("SELECT * FROM settings");
										while($data = $db->fetchArray()){
										?>
											<form method="post" action="<?=$GLOBALS['_CONF']['HTTP'];?>?page=setting_do" class="form-horizontal row-fluid">
												<div class="control-group">
													<label class="control-label" for="basicinput">Bitcoin Address</label>
													<div class="controls">
														<input  type="text" class="span8 tip" name="address" value="<?=$data['btc_address'];?>">
													</div>
												</div>
												<div class="control-group">
													<label class="control-label" for="basicinput">Bitcoin Callback Url</label>
													<div class="controls">
														<input  type="text" class="span8 tip" name="callback" value="<?=$data['callback_url'];?>">
													</div>
												</div>
												<div class="control-group">
													<label class="control-label" for="basicinput">Price in Bitcoin</label>
													<div class="controls">
														<input  type="text" class="span8 tip" name="price" value="<?=$data['price'];?>">
													</div>
												</div>
												<div class="control-group">
													<div class="controls">
												<input type="submit" class="btn btn-success" value=" Submit "><br><br>
													</div>
												</div>
											</form>
										<?php } ?>
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