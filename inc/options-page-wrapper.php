<div class="wrap">

	<div id="icon-options-general" class="icon32"></div>
	<h1>PlaysTV Watcher</h1>

	<div id="poststuff">

		<div id="post-body" class="metabox-holder columns-2">

			<!-- main content -->
			<div id="post-body-content">

				<div class="meta-box-sortables ui-sortable">

                    <?php if(!isset($ptv_watcher_search) || $ptv_watcher_search == ''): ?>
                    
                    <div class="postbox">

						<div class="handlediv" title="Click to toggle"><br></div>
						<!-- Toggle -->

						<h2 class="hndle"><span>Getting Started</span>
						</h2>

						<div class="inside">
                        <form method="post" action="">
                            
                            <!-- hidden field -->
                            <input type="hidden" name="ptv_watcher_form_submitted" value="Y">

                            <table class="form-table">
                                <tr valign="top">
                                    <td scope="row"><label for="tablecell">Search String</label></td>
                                    <td><input name="ptv_watcher_search" id="ptv_watcher_search" type="text" value="" class="regular-text" /></td>
                                </tr>
                                <tr valign="top">
                                    <td scope="row"><label for="tablecell">APP ID</label></td>
                                    <td><input name="ptv_watcher_appid" id="ptv_watcher_appid" type="text" value="" class="regular-text" /></td>
                                </tr>
                                <tr valign="top">
                                    <td scope="row"><label for="tablecell">API Key</label></td>
                                    <td><input name="ptv_watcher_apikey" id="ptv_watcher_apikey" type="text" value="" class="regular-text" /></td>
                                </tr>
                            </table>
                                <p>
                                    <input class="button-primary" type="submit" name="ptv_watcher_submit" value="Save" />
                                </p>
                        </form>
						</div>
						<!-- .inside -->

                    </div>
                    
                    <?php else: ?>
					<!-- .postbox -->
                    <div class="postbox">

                        <div class="handlediv" title="Click to toggle"><br></div>
                        <!-- Toggle -->

                        <h2 class="hndle"><span>Latest Results</span>
                        </h2>

                        <div class="inside">
                            <p>Latest in String</p>
                                <ul class="ptv-watcher">

                                <?php for( $i = 0; $i <= 4; $i++ ):?>
                                    <li>
                                        <ul>
                                            <li>
                                                <img width="120px" src="<?php echo $plugin_url . '/img/pg_dummy.jpg'?>">
                                            </li>

                                            <li class="ptv-watcher-name">
                                                <a href="#">
                                                    Highlight Title and Link
                                                </a>
                                            </li>

                                            <li class="ptv-watcher-paragraph">
                                                <p>First line of content</p>
                                            </li>

                                        </ul>
                                    </li>
                                    <?php endfor; ?>
                                </ul>
                        </div>
                        <!-- .inside -->
                        </div>
                        <?php endif ?>
                        <!-- .postbox -->

				</div>
				<!-- .meta-box-sortables .ui-sortable -->

			</div>
			<!-- post-body-content -->

			<!-- sidebar -->
			<div id="postbox-container-1" class="postbox-container">

				<div class="meta-box-sortables">

                    <?php if(isset($ptv_watcher_search) && $ptv_watcher_search != ''): ?>

					<div class="postbox">

						<div class="handlediv" title="Click to toggle"><br></div>
						<!-- Toggle -->

						<h2 class="hndle"><span>Settings</span></h2>

						<div class="inside">
                        <form method="post" action="">
                            <!-- hidden field -->
                            <input type="hidden" name="ptv_watcher_form_submitted" value="Y">

                            <p>
                                <input name="ptv_watcher_search" id="ptv_watcher_search" type="text" value="<?php echo $ptv_watcher_search; ?>" class="all-options" />
                                <input name="ptv_watcher_appid" id="ptv_watcher_appid" type="text" value="<?php echo $ptv_watcher_appid; ?>" class="all-options" />
                                <input name="ptv_watcher_apikey" id="ptv_watcher_apikey" type="text" value="<?php echo $ptv_watcher_apikey; ?>" class="all-options" />
                            </p>
                            
                            <p>
                                <input class="button-primary" type="submit" name="ptv_watcher_submit" value="Update" />
                            </p>
                        </form>
                        </div>
                        <?php endif; ?>
						<!-- .inside -->

					</div>
					<!-- .postbox -->

				</div>
				<!-- .meta-box-sortables -->

			</div>
			<!-- #postbox-container-1 .postbox-container -->

		</div>
		<!-- #post-body .metabox-holder .columns-2 -->

		<br class="clear">
	</div>
	<!-- #poststuff -->

</div> <!-- .wrap -->