<?php include ROOT."content/theme/header.php"; ?>
<?php
if(isset($_SESSION['LOGIN'])){
backup_tables(SERVER_NAME,SERVER_USER,SERVER_PASS,SERVER_DB);
?>
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
                                    <h3><i class=" icon-camera"></i> Backup Database</h3>
                                </div>
										<div class="module-body">
												<div class="control-group">
													<label class="control-label" for="basicinput">File Location</label>
													<div class="controls">
														<input  type="text" class="span8 tip" name="directory" value="<?=$GLOBALS['_CONF']['HTTP'];?>content/backup/backup-<?php echo date("Y-m-d");?>.sql">
													</div>
												</div>
												<div class="control-group">
													<label class="control-label" for="basicinput">File Content</label>
													<div class="controls">
														<textarea class="span8 tip" cols="100" rows="6" placeholder="Source"><?php $file = $GLOBALS['_CONF']['HTTP']."content/backup/backup-".date('Y-m-d').".sql"; echo file_get_contents($file);?></textarea>
													</div>
												</div>
												<div class="control-group">
													<div class="controls">
													<a class="btn btn-success" href="<?=$GLOBALS['_CONF']['HTTP'];?>content/backup/backup-<?php echo date("Y-m-d");?>.sql">Download</a>
													<br>
													</div>
												</div>
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