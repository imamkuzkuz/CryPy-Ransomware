						<div class="sidebar">
                            <ul class="widget widget-menu unstyled">
                                <li class="active">
									<a href="<?=$GLOBALS['_CONF']['HTTP'];?>"><i class="menu-icon icon-home"></i>Dashboard</a>
								</li>
                                <li class="active">
                                    <a href="<?=$GLOBALS['_CONF']['HTTP'];?>?page=ransomware"><i class="menu-icon icon-group"></i>Ransomware</a>
                                </li>
                            </ul>
                            <!--/.widget-nav-->
							<ul class="widget widget-usage unstyled ">
                                        <li>
                                            <p>
                                                <strong>Victims</strong> <span class="pull-right small muted"><?=$GLOBALS['p_victim'];?>%</span>
                                            </p>
                                            <div class="progress tight">
                                                <div class="bar bar-warning" style="width: <?=$GLOBALS['p_admin'];?>%;">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <p>
                                                <strong>Unpaid</strong> <span class="pull-right small muted"><?=$GLOBALS['p_unpaid'];?>%</span>
                                            </p>
                                            <div class="progress tight">
                                                <div class="bar bar-danger" style="width: <?=$GLOBALS['p_emailist'];?>%;">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <p>
                                                <strong>Payed</strong> <span class="pull-right small muted"><?=$GLOBALS['p_payed'];?>%</span>
                                            </p>
                                            <div class="progress tight">
                                                <div class="bar bar-info" style="width: <?=$GLOBALS['p_emailist'];?>%;">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <p>
                                                <strong>Deleted</strong> <span class="pull-right small muted"><?=$GLOBALS['p_deleted'];?>%</span>
                                            </p>
                                            <div class="progress tight">
                                                <div class="bar" style="width: <?=$GLOBALS['p_paypal'];?>%;">
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                        </div>
                        <!--/.sidebar-->
