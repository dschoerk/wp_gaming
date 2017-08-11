<?php
$a_id = bp_displayed_user_id();
$user = get_userdata($a_id);

 ?>
    <div class="col-lg-8 col-md-9 block">
        <div class="title-wrapper">
        	<h3 class="widget-title"><i class="fa fa-bullhorn"></i> <?php esc_html_e('INTRODUCTION','blackfyre'); ?></h3>
        </div>
        <div class="wcontainer">
            <?php if(get_the_author_meta('description', $a_id)){
                    echo nl2br(get_the_author_meta('description', $a_id));
            } ?>
        </div>
    </div>


		<div class="col-lg-4 col-md-4">
			<div class="block">
	        	<div class="title-wrapper">
	         		<h3 class="widget-title"><i class="fa fa-info-circle"></i> <?php esc_html_e('ABOUT ','blackfyre');  ?> </h3>
				</div>
				<ul class="about-profile">

	            <!--name-->
	            <?php if(get_the_author_meta('first_name', $a_id)){ ?>
	            	<li><strong><?php esc_html_e('NAME: ','blackfyre'); ?></strong>
	            	<?php echo get_the_author_meta('first_name', $a_id); ?>
	            <?php if(get_the_author_meta('last_name', $a_id)){
	                  echo get_the_author_meta('last_name', $a_id);
	            } ?> </li>
	            <?php } ?>
	            <!--name-->



	             <!--location-->
	            <?php
	            if(get_the_author_meta('usercountry_id', $a_id)){
	            $cid = get_the_author_meta('usercountry_id', $a_id);

	            global $wpdb;
	            $table = $wpdb->prefix."user_countries";
	            $countries = $wpdb->get_results("SELECT * FROM $table ORDER BY name");
	            foreach ($countries as $country) {
	                if ($cid==$country->id_country) { $count = $country->name;}
	            }
				?>
	            <li><strong> <?php esc_html_e('LOCATION: ','blackfyre');?></strong> <?php echo esc_attr($count);

	                if(get_the_author_meta('city', $a_id))
	                {echo ', ';echo get_the_author_meta('city', $a_id);} ?>
	            </li>
                <?php } ?>
	            <!--location-->

	            <!--age-->
	            <?php if(get_the_author_meta('age', $a_id) && get_the_author_meta('age', $a_id) != 'none'){ ?>

	            <li><strong><?php esc_html_e('AGE: ','blackfyre');?></strong>
	                 <?php
                    $age = get_the_author_meta('age', $a_id);
					echo  date_diff(date_create($age), date_create('today'))->y;
                } ?>
	            </li>


	            <!--age-->
					<li>
	            <!--joined-->
	           <strong> <?php esc_html_e('JOINED: ','blackfyre'); ?></strong>
	            <?php echo date("M, Y", strtotime(get_userdata($a_id)->user_registered)); ?>

	            <!--joined-->
					</li>
				  <?php
	            	global $wpdb;
					$custom_profile_fields = $wpdb->get_results('SELECT * FROM '.$wpdb->prefix.'bp_xprofile_fields');

					if (is_array($custom_profile_fields)) {
						foreach ($custom_profile_fields as $field) {
							if($field->id == 1)continue;
							$query = $wpdb->get_row($wpdb->prepare('SELECT * FROM '.$wpdb->prefix.'bp_xprofile_data WHERE user_id= %s AND field_id= %s LIMIT 1' , $a_id, $field->id ));
							if (isset($query->value)) {
								echo "<li>";
								echo "<strong>".strtoupper($field->name).": </strong>";
								$first = true;
								if (is_serialized($query->value)) {
									$row = unserialize($query->value);
									foreach ($row as $hold) {
										if ($first == true) {
											echo esc_attr($hold);
											$first = false;
										} else {
											echo ", ".esc_attr($hold);
										}
									}
								} else {
									echo esc_attr($query->value);
								}


								echo "</li>";
							}

						}
					}



	            ?>
	            <!--website-->
	            <?php if(get_the_author_meta('user_url', $a_id)){ ?>
	            <li><strong><?php esc_html_e('WEBSITE: ','blackfyre');?></strong>
	               <a target="_blank" href=" <?php echo get_the_author_meta('user_url', $a_id); ?>">   <?php
                     echo get_the_author_meta('user_url', $a_id); ?>
                 </a>
	            </li>
                <?php } ?>
	            <!--website-->

			<?php
			/*
			global $wpdb;
			$a_id = bp_displayed_user_id();
			$custom_profile_fields = $wpdb->get_results('SELECT * FROM '.$wpdb->prefix.'bp_xprofile_fields');
			if (is_array($custom_profile_fields)) {
				foreach ($custom_profile_fields as $field) {

				bp_member_profile_data(array('field' => $field->name));

				}
			}
			 */

			?>

			</ul>

	        </div>

	         
	        </div>
       </div>
