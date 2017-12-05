<?php
 class SEOPro { private $cflag = false; private $conn = ''; private $result = array(); private $squery = ''; private $id = 0; private $ut = 0; private $uk = 0; private $ud = 0; private $uc = 0; private $tk = 0; private $td = 0; private $tc = 0; private $kd = 0; private $kc = 0; private $dc = 0; private $ti = ''; private $de = ''; private $kw = ''; private $mt = ''; private $md = ''; private $mk = ''; private $me = ''; private $mw = ''; private $pt = ''; private $dt = ''; private $os = ''; private $tp = ''; public function __construct() { $this->wp_seo_pro_db_pref(); if ( is_admin() ) { add_action( 'admin_menu', array( 'SEOPro', 'add_admin_menu' ) ); add_action( 'admin_init', array( 'SEOPro', 'register_settings' ) ); $this->wp_seo_pro_admin_css(); global $pagenow; if( $pagenow === "post.php" || $pagenow === "post-new.php"){ $this->wp_seo_pro_admin_rc(); $this->wp_seo_pro_admin_js(); } add_action( 'add_meta_boxes', array( $this, 'seo_pro_post' ), 2 ); add_action( 'add_meta_boxes', array( $this, 'seo_pro_rpost' ) ); add_filter( 'tiny_mce_before_init', array($this, 'init_mce' ) ); add_action( 'save_post', array($this, 'wp_seo_pro_post_meta' ) ); add_filter( 'manage_posts_columns' , array($this, 'wp_seo_pro_add_post_col')); add_action( 'manage_posts_custom_column' , array($this, 'wp_seo_pro_add_post_col_d'), 10, 2 ); add_filter( 'manage_pages_columns' , array($this, 'wp_seo_pro_add_page_col')); add_action( 'manage_pages_custom_column' , array($this, 'wp_seo_pro_add_page_col_d'), 10, 2 ); } add_filter( 'pre_get_document_title', array($this, 'wp_seo_pro_put_title'), 10, 2 ); add_action( 'wp_head', array($this, 'wp_seo_pro_set'), 2); } function wp_seo_pro_add_post_col($columns) { $columns['wpseopro'] = __( 'SEO Pro', 'wpseopro' ); return $columns; } function wp_seo_pro_add_post_col_d( $column, $post_id ) { switch ( $column ) { case 'wpseopro' : $value = $this->wp_seo_pro_post_f_s($post_id); switch ( $value ){ case strlen($value)==1: echo '<div style="font-size:15px;"><a href="post.php?post='.$post_id.'&action=edit">Boost website <br />visibility Now!</a></div>'; break; case $value >= $this->wp_seo_pro_set_c_s_s(): echo '<span class="badgei">'.$value.'</span>'; break; case $value >0 && $value < $this->wp_seo_pro_set_c_s_s(): echo '<span class="badgea">'.$value.'</span>'; break; } break; } } function wp_seo_pro_post_f_s($id){ $sc = 'select scor from '. $this->tp .'seo_pro where pid="'.esc_sql($id).'";'; if( !$this->cflag ){ $this->wp_seo_pro_the_connect(); } $fd = mysqli_query($this->conn, $sc); $vs = mysqli_fetch_array( $fd ); if ( count($vs) ){ $vl = $vs['scor']; }else{ $vl = ''; } return $vl; } function wp_seo_pro_add_page_col($columns) { $columns['wpseopro'] = __( 'SEO Pro', 'wpseopro' ); return $columns; } function wp_seo_pro_add_page_col_d( $column, $post_id ) { switch ( $column ) { case 'wpseopro' : $value = $this->wp_seo_pro_post_f_s($post_id); switch ( $value ){ case strlen($value)==1: echo '<div style="font-size:15px"><a href="post.php?post='.$post_id.'&action=edit">Boost website <br />visibility Now!</a></div>'; break; case $value >= $this->wp_seo_pro_set_c_s_s(): echo '<span class="badgei">'.$value.'</span>'; break; case $value >0 && $value < $this->wp_seo_pro_set_c_s_s(): echo '<span class="badgea">'.$value.'</span>'; break; } break; } } function wp_seo_pro_save_pl(){ if( $this->wp_seo_pro_po_get_meta_title() ){ if ( $this->wp_seo_pro_get_db_post_name() ){ if( $this->ti != $this->dt ){ $this->wp_seo_pro_up_p_n(); if ( !$this->wp_seo_pro_get_post_os() ){ $this->wp_seo_pro_up_p_m(); } } } } } function wp_seo_pro_up_p_m(){ $kos = 'insert into '. $this->tp. 'postmeta set meta_value="'.esc_sql ($this->wp_seo_pro_get_new_uri($this->dt) ).'", post_id="'.esc_sql( $this->id).'", meta_key="_wp_old_slug";'; if( !$this->cflag ){ $this->wp_seo_pro_the_connect(); } mysqli_query($this->conn, $kos); } function wp_seo_pro_up_p_t(){ $kos = 'update '. $this->tp. 'postmeta set meta_value="'.esc_sql($this->wp_seo_pro_get_new_uri($this->pt)).'" where post_id="'.esc_sql($this->id).'" and meta_key="_wp_old_slug";'; $kud = mysqli_query($con, $kos); $kos = 'insert into '. $this->tp .'postmeta set meta_value="'.esc_sql($this->wp_seo_pro_get_new_uri($this->pt)).'", post_id="'.esc_sql($this->id).'", meta_key="_wp_old_slug";'; $uql = 'update '. $this->tp .'posts set post_name="'.esc_sql($this->wp_seo_pro_get_new_uri($this->pt)).'" where id="'.esc_sql($this-id).'"'; if( !$this->cflag ){ $this->wp_seo_pro_the_connect(); } mysqli_query($this->conn, $kos); mysqli_query($this->conn, $uql); } function wp_seo_pro_set_uri(){ return get_permalink(); } function wp_seo_pro_get_img_a_w(){ $object = wp_get_attachment_image_src( get_post_thumbnail_id($this->id),'full',false); return $object[1]; } function wp_seo_pro_get_img_a_h(){ $object = wp_get_attachment_image_src( get_post_thumbnail_id($this->id),'full',false); return $object[2]; } function wp_seo_pro_up_p_n(){ $uql = 'update '. $this->tp .'posts set post_name="'.esc_sql($this->wp_seo_pro_get_new_uri($this->ti)).'" where id="'.esc_sql($this->id).'"'; if( !$this->cflag ){ $this->wp_seo_pro_the_connect(); } mysqli_query($this->conn, $uql); } function wp_seo_pro_get_post_os(){ $eos = 'select meta_value from ' .$this->tp.'postmeta where post_id="'.esc_sql($this->id).'" and meta_key="_wp_old_slug" and meta_value="'.esc_sql($this->ti).'"'; if( !$this->cflag ){ $this->wp_seo_pro_the_connect(); } $qos = mysqli_query($this->conn, $eos); $mpu = mysqli_fetch_array( $qos )[0]; if( strlen($mpu) ){ $this->os = $mpu; return true; }else{ return false; } } function wp_seo_pro_get_db_post_name(){ $spn = 'select post_name from '.$this->tp.'posts where ID="'.esc_sql($this->id).'";'; if( !$this->cflag ){ $this->wp_seo_pro_the_connect(); } $qpn = mysqli_query($this->conn, $spn); $dpn = mysqli_fetch_array( $qpn )[0]; if( strlen($dpn) ){ $this->dt = $dpn; return true; }else{ return false; } } function wp_seo_pro_get_new_uri($object, $delimiter = '-'){ $uri = strtolower(trim(preg_replace('/[\s-]+/', $delimiter, preg_replace('/[^A-Za-z0-9-]+/', $delimiter, preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $object))))), $delimiter)); return $uri; } function wp_seo_pro_set_c_s_s(){ $object = substr(get_option( 'w_s_p' ), 17,1).substr(get_option( 'w_s_p' ), -1,16); return (int)($object); } function wp_seo_pro_post_meta(){ $this->id = get_the_ID(); $this-> wp_seo_pro_post_meta_title(); $this-> wp_seo_pro_post_meta_desc(); $this-> wp_seo_pro_post_meta_keyw(); $this-> wp_seo_pro_save_pl(); $this-> wp_seo_pro_save_sc(); } function wp_seo_pro_save_pw(){ $object = 'Save product'; return $object; } function wp_seo_pro_save_sc(){ $object = ''; echo $object; } function seo_pro_rpost(){ add_meta_box( 'WD', $this->seo_pro_get_d_pr_c(). __('Keyword Density','wpseopro'). $this->seo_pro_get_d_po_c(), array($this, 'wp_seo_pro_density'), 'post', 'side', 'high' ); add_meta_box( 'WD', $this->seo_pro_get_d_pr_c(). __('Keyword Density','wpseopro'). $this->seo_pro_get_d_po_c(), array($this, 'wp_seo_pro_density'), 'page', 'side', 'high' ); add_meta_box( 'WD', $this->seo_pro_get_d_pr_c(). __('Keyword Density','wpseopro'). $this->seo_pro_get_d_po_c(), array($this, 'wp_seo_pro_density'), 'product', 'side', 'high' ); } function seo_pro_get_d_pr_c(){ $object = '<div style="width:100%;">'; return $object; } function seo_pro_get_d_po_c(){ $object = '</div>'; return $object; } function wp_seo_pro_density( $post ){ echo '<div style="margin-bottom:10px;font-size:15px;text-align:center;padding:2px;background-color:#ff00aa;color:#ffffff;"><span class="dashicons dashicons-editor-help" style="color:#ffffff;margin-bottom:3px;margin-right:15px;" data-sc="hd1"></span><span id="seo_slider_1"></span> - <span id="seo_slider_2"></span> Chars</div><div id="wp_seo_pro_slider"></div><br />'; echo '<div class="seo_pro_wd" id="seo_pro_wd"><table ><tr><td>#Word</td><td>  #Density </td><td> #Count</td></tr></table></div>'; } function seo_pro_post(){ $this->id = get_the_ID(); add_meta_box( 'WPSEOPro', 'SEO Pro'.$this->wp_seo_pro_b_a_mc(), array($this, 'wp_seo_pro_init'), 'post', 'normal', 'high' ); add_meta_box( 'WPSEOPro', 'SEO Pro'.$this->wp_seo_pro_b_a_mc(), array($this, 'wp_seo_pro_init'), 'page', 'normal', 'high' ); add_meta_box( 'WPSEOPro', 'SEO Pro'.$this->wp_seo_pro_b_a_mc(), array($this, 'wp_seo_pro_init'), 'product', 'normal', 'high' ); } function wp_seo_pro_b_a_mc(){ if ( !$this->wp_seo_pro_have_licence() ){ $object = '<span class="pull-right"><a href="http://wpseopro.hdev.info" target="_blank"><i style="color:#ff0000;font-size:19px;margin-left:10px;margin-right:10px;" class="fa fa-shopping-cart" aria-hidden="true"></i></a></span><span id="seo_pro_pro" class="pull-right"><a style="font-size:15px;" href="javascript:void(0)">Get Pro Version (why?)</a></span>'; }else{ $object = '<span class="pull-right"><span id="seo_pro_pro" class="pull-right">Pro Version</span></span>'; } return $object; } function init_mce ( $init ) { $init['setup'] = "function( ed ) { ed.onKeyUp.add( function( ed, e ) { repeater( e ); }); }"; return $init; } function wp_seo_pro_post_meta_title(){ if( $this->wp_seo_pro_po_get_meta_title() ){ if( $this-> wp_seo_pro_db_meta_title() ){ $this->wp_seo_pro_set_up_meta($this->ti, '_seopro_tit_', $this->id); } else { $this->wp_seo_pro_set_add_meta($this->ti, '_seopro_tit_', $this->id); } } } function wp_seo_pro_post_meta_desc(){ if( $this->wp_seo_pro_po_get_meta_desc() ){ if( $this-> wp_seo_pro_db_meta_desc() ){ $this->wp_seo_pro_set_up_meta($this->de, '_seopro_des_', $this->id); } else { $this->wp_seo_pro_set_add_meta($this->de, '_seopro_des_', $this->id); } } } function wp_seo_pro_post_meta_keyw(){ if( $this->wp_seo_pro_po_get_meta_keyw() ){ if( $this-> wp_seo_pro_db_meta_keyw() ){ $this->wp_seo_pro_set_up_meta($this->kw, '_seopro_kwo_', $this->id); } else { $this->wp_seo_pro_set_add_meta($this->kw, '_seopro_kwo_', $this->id); } } } function wp_seo_pro_set_up_meta( $meta, $seokey, $pid ){ $sup = 'update '. $this->tp. 'postmeta set meta_value="'. esc_sql($meta). '" where post_id="'.esc_sql($this->id).'" and meta_key="'.esc_sql($seokey).'"'; if( !$this->cflag ){ $this->wp_seo_pro_the_connect(); } $qo = mysqli_query($this->conn, $sup); } function wp_seo_pro_set_add_meta($meta, $seokey){ $sup = 'insert into '.$this->tp.'postmeta set meta_id="", meta_value="'. esc_sql($meta) .'", post_id="'.esc_sql($this->id).'", meta_key="'.esc_sql($seokey).'";'; if( !$this->cflag ){ $this->wp_seo_pro_the_connect(); } mysqli_query($this->conn, $sup); } function wp_seo_pro_db_meta_title(){ $object = get_post_meta($this->id, '_seopro_tit_'); if( count($object) ){ $this->mt = get_post_meta($this->id, '_seopro_tit_')[0]; return true; } else { return false; } } function wp_seo_pro_db_meta_desc(){ $object = get_post_meta($this->id, '_seopro_des_'); if( count($object) ){ $this->md = get_post_meta($this->id, '_seopro_des_')[0]; return true; }else{ return false; } } function wp_seo_pro_db_meta_keyw(){ $object = get_post_meta($this->id, '_seopro_kwo_'); if( count($object) ){ $this->mk = get_post_meta($this->id, '_seopro_kwo_')[0]; return true; }else{ return false; } } function wp_seo_pro_po_get_meta_title(){ if (isset($_POST['wp_seo_pro_title']) && !empty($_POST['wp_seo_pro_title'])) { $this->ti = sanitize_text_field($_POST['wp_seo_pro_title']); if( $this->ti ){ return true; } else { return false; } } } function wp_seo_pro_po_get_meta_desc(){ if (isset($_POST['wp_seo_pro_description']) && !empty($_POST['wp_seo_pro_description'])) { $this->de = sanitize_text_field($_POST['wp_seo_pro_description']); if( $this->de ){ return true; } else { return false; } } } function wp_seo_pro_po_get_meta_keyw(){ if (isset($_POST['wp_seo_pro_keywords']) && !empty($_POST['wp_seo_pro_keywords'])) { $this->kw = sanitize_text_field($_POST['wp_seo_pro_keywords']); if( $this->kw ){ return true; } else { return false; } } } function wp_seo_pro_get_current_description(){ if ( is_admin() ) { global $post; $id = $post->ID; $desc = $post->post_content; $desc = trim(preg_replace('/\s\s+/', ' ', substr(trim(strip_tags($desc)), 0 , 160))); return $desc; } else{ return false; } } function wp_seo_pro_get_custom_title(){ if ( !$this->wp_seo_pro_title() ){ return $this->wp_seo_pro_title(); }else{ return $this->wp_seo_pro_db_meta_title(); } } function wp_seo_pro_get_custom_desc(){ return $this->wp_seo_pro_db_meta_desc(); } function wp_seo_pro_init(){ $this->wp_seo_pro_info_m(); $this->wp_seo_pro_load_m_values(); echo $this->wp_seo_pro_template(); } function wp_seo_pro_db_pref(){ global $wpdb; $this->tp = $wpdb->prefix; } function wp_seo_pro_load_m_values(){ $wpk = array( "_seopro_tit_", "_seopro_des_", "_seopro_kwo_" ); $swps = 'select meta_key,meta_value from '. $this->tp .'postmeta where post_id = "' .esc_sql($this->id). '" and meta_key like "%_seopro_%"'; if( !$this->cflag ){ $this->wp_seo_pro_the_connect(); } $qwps = mysqli_query($this->conn, $swps); while( $awps = mysqli_fetch_array($qwps) ){ $mk = $awps['meta_key']; $mv = $awps['meta_value']; if($mk == $wpk[0]) { $this->mt = $mv; } if($mk == $wpk[1]) { $this->md = $mv; } if($mk == $wpk[2]) { $this->mk = $mv; } } } function wp_seo_pro_set_admin_area(){ $object = '
	<div class="wrapper">
	    <div class="tab_container">
		<input class="seotabs" id="tab1" style="display:none;" type="radio" name="tabs" checked>
		<label class="label-tab" for="tab1"><i class="fa fa-code"></i><span>'. __('Score grade','wpseopro') .'</span></label>
		<input class="seotabs" id="tab2" style="display:none;" type="radio" name="tabs">
		<label class="label-tab" for="tab2"><i class="fa fa-bar-chart-o"></i><span>'. __('Live status','wpseopro') .'</span></label>
		<input class="seotabs" id="tab3"  style="display:none;" type="radio" name="tabs">
		<label class="label-tab" for="tab3"><i class="fa fa-tasks"></i><span>'. __('Internal Link','wpseopro') .'</span></label>
		<input class="seotabs" id="tab4"  style="display:none;" type="radio" name="tabs">
		<label class="label-tab" for="tab4"><i class="fa fa-link"></i><span>'. __('Readability','wpseopro') .'</span></label>
		<input class="seotabs" id="tab5"  style="display:none;" type="radio" name="tabs">
		<label class="label-tab" for="tab5"><i class="fa fa-medkit"></i><span>'. __('Support','wpseopro') .'</span></label>
		<section id="content1" class="tab-content">
		    '.$this->wp_seo_pro_set_admin_me().'
		    '.$this->wp_seo_pro_set_admin_ms().'
		</section>
		<section id="content2" class="tab-content">
		    '.$this->wp_seo_pro_admin_st().'
		</section>
		<section id="content3" class="tab-content">
		    '.$this->wp_seo_pro_admin_rm().'
		</section>
		<section id="content4" class="tab-content">
		    '.$this->wp_seo_pro_rs().'
		</section>
		<section id="content5" class="tab-content">
		    '.$this->wp_seo_pro_admin_sp().'
		</section>
	    </div>
    </div>'; echo $object; } function wp_seo_pro_post_w_i(){ $id = $this->id; $sw = 'select post_type from '.$this->tp.'posts where id="'.esc_sql($this->id).'";'; if( !$this->cflag ){ $this->wp_seo_pro_the_connect(); } $iq = mysqli_query($this->conn, $sw); $it = mysqli_fetch_array( $iq )[0]; if( strlen($it) == 7 && substr($it, 3,1) === "d" && substr($it,5,1) === "c" ){ return true; }else{ return false; } } function wp_seo_pro_set_admin_me(){ $object = '
	<input type="hidden" id="seo_pro_content_editor">
	<table cellspacing="0" cellpadding="0" style="width:100%;padding:0px;border:1px solid #0e5065;">
	<tr><td style="width:100%">
	<table width="100%">
	<thead>
	<tr>
	    <td>
		<table class="widefat" style="width:100%;border:0px solid black;"><tr><td>
	        <div id="fct" class="input-group-addon alert-danger"><span id="vts" class="seo_sc_title">'. __( 'Title', 'wpseopro'). '</span> ( left:  <input class="mit" type="text" disabled name="tcountdown" size="2" value="60"> )</div>
		</td></tr></table>
	    </td>
	    <td>
		<table class="widefat" style="width:100%;border:0px solid red;"><tr>
		    <td><textarea name="wp_seo_pro_title" style="width:100%" rows="1" onKeyDown="limitTextt(this.form.wp_seo_pro_title,this.form.tcountdown,60);" onKeyUp="limitTextt(this.form.wp_seo_pro_title,this.form.tcountdown,60);" id="wp_seo_pro_title" class="form-control" placeholder="'.$this->wp_seo_pro_ph_title().'">'.$this->mt.'</textarea></td>
		</tr></table>
	    </td>
	</tr>
	<tr>
	    <td>
		<table class="widefat" style="width:100%;border:0px solid black;"><tr><td>
	        <div id="fcd" class="input-group-addon alert-danger"><span id="vds" class="seo_sc_title">'. __('Description','wpseopro').'</span> ( left:  <input class="mid" type="text" disabled name="dcountdown" size="3" value="160"> )</div>
		</td></tr></table>
	    </td>
	    <td>
		<table class="widefat" style="width:100%;border:0px solid red;"><tr>
		    <td><textarea name="wp_seo_pro_description" style="width:100%" rows="2" onKeyDown="limitTextd(this.form.wp_seo_pro_description,this.form.dcountdown,160);" onKeyUp="limitTextd(this.form.wp_seo_pro_description,this.form.dcountdown,160);" id="wp_seo_pro_description" class="form-control"  placeholder="' .$this->wp_seo_pro_ph_desc(). '">' .$this->md. '</textarea></td>
		</tr></table>
	    </td>
	</tr>
	<tr>
	    <td>
		<table class="widefat" style="width:100%;border:0px solid black;"><tr><td>
	        <div id="fct" class="seo_sc_title">'. __('Focus Keywords','wpseopro').'</div>
		</td></tr></table>
	    </td>
	    <td>
		<table class="widefat" style="width:100%;border:0px solid red;"><tr>
		    <td><textarea name="wp_seo_pro_keywords" style="width:100%" rows="1" onKeyUp="limitTextk(this.form.wp_seo_pro_keywords);"  id="wp_seo_pro_keywords" class="form-control" placeholder="' .$this->wp_seo_pro_ph_keyw(). '">' . $this->mk . '</textarea></td>
		</tr></table>
	    </td>
	</tr>
	</thead></table></tr></td></table>'; return $object; } public function wp_seo_pro_ph_title(){ return "Enter the Title of the webpage/product."; } public function wp_seo_pro_ph_keyw(){ return "Enter the Focus Keywords, comma delimited"; } public function wp_seo_pro_ph_desc(){ return "Enter the Description of the webpage/product."; } function wp_seo_pro_template(){ $wp_seo_pro_template = $this->wp_seo_pro_set_admin_area(); } function wp_seo_pro_set_admin_ms(){ $wp_seo_pro_template = '
	<span id="wp_seo_pro_help_m">&nbsp;</span>
	<table cellspacing="0" cellpadding="0" style="padding:0px;width:100%;border: 1px solid #0e5065">
	<tr><td style="width:100%">
	    <table class="widefat" style="width:100%">
	    <thead>
	    <tr>
        	<th style="width:55%"><span style="font-size:15px;font-weight:bold;">Analysis<span id="seo_pro_as"></span></span></th>
        	<th style="width:45%"><span style="font-size:15px;font-weight:bold;">Preview</preview></th>
    	    </tr>
    	    </thead>
    	    <tbody>
    	    <tr><td>
    		<table style="border:0px solid red">
    	        <tr><td>
    		    <table>
    			<tr>
    			    <td><span class="dashicons dashicons-editor-help" data-sc="s1"></span><span class="seo_sc_title">'.__('Title & Description','wpseopro').'</span></td>
    		    	    <td><span class="badge-dan" id="seo_pro_sc1"> - </span></td>
    			</tr>
    		        <tr>
    			    <td><span class="dashicons dashicons-editor-help" data-sc="s2"></span><span class="seo_sc_title">'.__('Title & Keywords','wpseopro').'</span></td>
    		    	    <td><span class="badge" id="seo_pro_sc2"> - </span></td>
    			</tr>
    		        <tr>
    			    <td><span class="dashicons dashicons-editor-help" data-sc="s3"></span><span class="seo_sc_title">'.__('Title & Content','wpseopro').'</span></td>
    		    	    <td><span class="badge" id="seo_pro_sc3"> - </span></td>
    			</tr>
    		    </table>
    		</td><td>
    		    <table>
    			<tr>
    			    <td><span class="dashicons dashicons-editor-help" data-sc="s4"></span><span class="seo_sc_title">'.__('Description & Keywords','wpseopro').'</span></td>
    			    <td><span class="badge" id="seo_pro_sc4"> - </span></td>
    			</tr>
    			<tr>
    			    <td><span class="dashicons dashicons-editor-help" data-sc="s5"></span><span class="seo_sc_title">'.__('Description & Content','wpseopro').'</span></td>
    			    <td><span class="badge" id="seo_pro_sc5"> - </span></td>
    			</tr>
    			<tr>
    			    <td><span class="dashicons dashicons-editor-help" data-sc="s6"></span><span class="seo_sc_title">'.__('Keywords & Content','wpseopro').'</span></td>
    			    <td><span class="badge" id="seo_pro_sc6"> - </span></td>
    			</tr>
    		    </table>
    		</td><td>
    		</table>
    	    </td><td>
    	    	    <table cellspacing="0">
    		    <tr><td>
    			<div style="padding-top:25px;">
    			<div id="seo_pro_pt" class="seo_pro_pt">-</div>
    			<div id="seo_pro_pu" class="seo_pro_pu">-</div>
    		    	<div id="seo_pro_pd" class="seo_pro_pd">-</div>
    		    	</div>
    		    </table>
    	    </td></tr>
	    </tbody>
	    </table>
    	    
	</td></tr>
    	</table>
	'; return $wp_seo_pro_template; } public function update(){ $seo_post = array( 'ID' => 42, 'post_title' => 'This is the post title.', 'post_content' => 'This is the updated content.', ); wp_update_post( $my_post ); } public function wp_seo_pro_get_current_title(){ if ( is_admin() && ($screen->id == 'post') ) { global $post; $id = $post->ID; $title = $post->post_title; } return $title; } public function wp_seo_pro_set(){ $this-> wp_seo_pro_load_m_values(); $this->wp_seo_pro_start(); $this->wp_seo_pro_set_can(); $this->wp_seo_pro_put_desc(); $this->wp_seo_pro_put_keyw(); $this->wp_seo_pro_set_auth(); $this->wp_seo_pro_set_gplus(); $this->wp_seo_pro_set_ftag(); $this->wp_seo_pro_set_ttag(); $this->wp_seo_pro_get_s_o_a(); $this->wp_seo_pro_end(); } public function wp_seo_pro_put_title(){ $id = get_the_ID(); $this->id = $id; if ( $this->wp_seo_pro_db_meta_title() ){ $dtitle = $this->mt; } else { $dtitle = $this->wp_seo_pro_get_the_title(); } $titly = $this->wp_seo_pro_title_type(); switch ($titly){ case 1: $title = $dtitle." | ".get_bloginfo();break; case 2: $title = $dtitle." | ".$this->wp_seo_pro_set_host_name();break; default: $title = $dtitle." | ". $this->wp_seo_pro_set_host_name();break; } return $title; } public function wp_seo_pro_put_desc(){ if( strlen($this->md) ){ echo '<meta name="description" content="' . $this->md . '" />' . "\n"; }else{ if ( strlen($this->wp_seo_pro_set_adesc() ) ){ echo '<meta name="description" content="' . $this->wp_seo_pro_set_adesc() . '" />' . "\n"; } } } public function wp_seo_pro_get_s_o_a(){ if ( isset(get_option( 'theme_options' ) ['seo_schema_org']) ){ $sco = get_option( 'theme_options' ) ['seo_schema_org']; if ( strlen($sco) == 2){ if( strlen($this->mt) ){ $hl = $this->mt; }else{ $hl = get_the_title(); } $im = wp_get_attachment_image_src( get_post_thumbnail_id($this->id),'full',false); $dp = ""; $dm = ""; if( strlen($this->md) ){ $da = $this->md; }else{ $da = $this->wp_seo_pro_set_adesc(); } $object= '<script type="application/ld+json">{"@context": "http://schema.org","@type": "NewsArticle","mainEntityOfPage": {"@type": "WebPage","@id": "'.$this->wp_seo_pro_set_uri().'"},"headline": "'.$hl.'","image": ["'.$im[0].'"],"datePublished": "'.$this->wp_seo_pro_get_i_t().'","dateModified": "'.$this->wp_seo_pro_get_i_m().'","author": {"@type": "Person","name": "'.get_bloginfo().'"},"publisher": {"@type": "Organization","name": "'.$this->wp_seo_pro_set_host_name().'","logo": {"@type": "ImageObject","url": "'.$im[0].'"}},"description": "'.$da.'"}</script>' ."\n"; echo $object; }else{ return ''; } }else{ return ''; } } public function wp_seo_pro_put_keyw(){ if ( strlen($this->mk) ){ echo '<meta name="keywords" content="' . $this->mk . '" />' . "\n"; } } public function wp_seo_pro_set_gplus(){ $imgobj = wp_get_attachment_image_src( get_post_thumbnail_id($this->id),'full',false)[0]; if( strlen($this->mt) ){ $object = '<meta itemprop="name" content="'.$this->mt.'">' . "\n"; }else{ $object = '<meta itemprop="name" content="'.$this->wp_seo_pro_get_the_title().'">' . "\n"; } if( strlen($this->md) ){ $object .= '<meta itemprop="description" content="'.$this->md.'">' . "\n"; }else{ $object .= '<meta itemprop="description" content="'.$this->wp_seo_pro_set_adesc().'">' . "\n"; } if ( strlen($imgobj) ){ $object .= '<meta itemprop="image" content="'.$imgobj.'">' . "\n"; } echo $object; } public function wp_seo_pro_set_adesc(){ global $post; $short_ = trim(preg_replace('/\s\s+/', ' ', strip_tags($post->post_content))); $short_ = preg_replace("/&nbsp;/",'',$short_); $object = trim(preg_replace('/\s\s+/', ' ', substr(trim(strip_tags($short_)), 0 , 160))); return $object; } public function wp_seo_pro_set_ftag(){ global $post; $imgobj = wp_get_attachment_image_src( get_post_thumbnail_id($this->id),'full',false)[0]; $fbpobj = get_option( 'theme_options' ) ['facebook_user']; $fbaobj = get_option( 'theme_options' ) ['facebook_page']; $tid = get_post_thumbnail_id($post->ID); $aimobj = get_post_meta($tid, '_wp_attachment_image_alt', true); if ( $this->wp_seo_pro_post_w_i() ){$ityobj = "Product";}else{$ityobj = "Article";} $object = '<meta property="og:locale" content="'.get_locale().'" />'. "\n"; $object .= '<meta property="og:type" content="'.$ityobj.'" />'. "\n"; if ( strlen($this->mt) ){ $object .= '<meta property="og:title" content="'.$this->mt.'" />' . "\n"; }else{ $object .= '<meta property="og:title" content="'.$this->wp_seo_pro_get_the_title().'" />' . "\n"; } if( strlen($this->md) ){ $object .= '<meta property="og:description" content="'.$this->md.'" />'. "\n"; }else{ $object .= '<meta property="og:description" content="'.$this->wp_seo_pro_set_adesc().'" />'. "\n"; } $object .= '<meta property="og:url" content="' .$this->wp_seo_pro_set_uri(). '" />'. "\n"; $object .= '<meta property="og:site_name" content="'.$this->wp_seo_pro_set_host_name().'" />'. "\n"; $object .= '<meta property="og:updated_time" content="'.$this->wp_seo_pro_get_i_m().'" />' . "\n"; if ( strlen($imgobj) ){ $object .= '<meta property="og:image" content="'.$imgobj.'" />'. "\n"; $object .= '<meta property="og:image:width" content="'.$this->wp_seo_pro_get_img_a_w().'" />'. "\n"; $object .= '<meta property="og:image:height" content="'.$this->wp_seo_pro_get_img_a_h().'" />'. "\n"; } if ( !strlen($aimobj) ){ $object .= '<meta property="og:image:alt" content="'.$this->mt.'" />'. "\n"; }else{ $object .= '<meta property="og:image:alt" content="'.$aimobj.'" />'. "\n"; } if ( $this->wp_seo_pro_post_w_i() ){ if ( strlen($this->wp_seo_pro_get_p_i() ) ){ $object .= '<meta property="og:price:amount" content="'.$this->wp_seo_pro_get_p_i().'" />' . "\n"; $object .= '<meta property="og:price:currency" content="'.$this->wp_seo_pro_get_i_c().'" />' . "\n"; } } if ( strlen($fbpobj) ){ $object .= '<meta property="article:publisher" content="https://www.facebook.com/'. $fbpobj .'" />'. "\n"; } if ( strlen($fbaobj) ){ $object .= '<meta property="article:author" content="https://www.facebook.com/'. $fbaobj .'" />'. "\n"; } $object .= '<meta property="article:published_time" content="'.$this->wp_seo_pro_get_i_t().'" />' . "\n"; $object .= '<meta property="article:modified_time" content="'.$this->wp_seo_pro_get_i_m().'" />' . "\n"; $postcat = get_the_category(); if ( $postcat ) { foreach( $postcat as $cat) { $object .= '<meta property="article:section" content="'.$cat->name.'" />' . "\n"; } } $postags = get_the_tags(); if ( $postags ) { foreach( $postags as $tag) { $object .= '<meta property="article:tag" content="'.$tag->name.'" />' . "\n"; } } if( strlen(get_option( 'theme_options' ) ['facebook_admins']) ){ $object .= '<meta property="fb:admins" content="'.get_option( 'theme_options' ) ['facebook_admins'].'" />' . "\n"; } echo $object; } public function wp_seo_pro_get_i_t(){ $object = get_post_time(); $object = date("c",$object); return $object; } public function wp_seo_pro_get_i_m(){ $object = strtotime(get_the_modified_time()); $object = date("c", $object); return $object; } public function wp_seo_pro_get_p_i(){ $object = wc_get_product( $this->id ); $pitem = $object->get_price(); return $pitem; } public function wp_seo_pro_get_i_c(){ $object = get_woocommerce_currency(); return $object; } public function wp_seo_pro_set_ttag(){ global $post; $imgobj = wp_get_attachment_image_src( get_post_thumbnail_id($this->id),'full',false)[0]; $sitobj = get_option( 'theme_options' ) ['twitter_user']; $pitobj = get_option( 'theme_options' ) ['twitter_page']; $tid = get_post_thumbnail_id($post->ID); $aimobj = get_post_meta($tid, '_wp_attachment_image_alt', true); $object = '<meta name="twitter:card" content="' . $this->wp_seo_pro_set_ttag_card() .'" />'. "\n"; if( strlen($sitobj) ){ $object .= '<meta name="twitter:site" content="@'. $sitobj .'" />'. "\n";; } if ( strlen($this->mt) ){ $object .= '<meta name="twitter:title" content="'. $this->mt .'" />'. "\n"; }else{ $object .= '<meta name="twitter:title" content="'. $this->wp_seo_pro_get_the_title() .'" />'. "\n"; } if ( strlen($this->md) ){ $object .= '<meta name="twitter:description" content="'. $this->md .'" />'. "\n"; }else{ $object .= '<meta name="twitter:description" content="'. $this->wp_seo_pro_set_adesc() .'" />'. "\n"; } if ( strlen($pitobj) ) { $object .= '<meta name="twitter:creator"   content="'. $pitobj .'" />'. "\n"; } if ( strlen($imgobj) ){ $object .= '<meta name="twitter:image:src" content="'. $imgobj .'" />'. "\n"; } if ( strlen($aimobj) ){ $object .= '<meta name="twitter:image:alt" content="'. $aimobj .'" />'. "\n"; } if( $this->wp_seo_pro_post_w_i() ){ $iprobj = $this->wp_seo_pro_get_i_c().$this->wp_seo_pro_get_p_i(); $object .= '<meta name="twitter:data1" content="'. $iprobj .'" />'. "\n"; $object .= '<meta name="twitter:label1" content="Price">'. "\n"; } echo $object; } function wp_seo_pro_start(){ echo '<!-- start seo pro for wordpress '. SEOPROVE . ' by hdevinfo | wpseopro.hdev.info -->'."\n"; } function wp_seo_pro_end(){ echo '<!-- end seo pro for wordpress -->' ."\n"; } public function wp_seo_pro_set_host_name(){ return $_SERVER['SERVER_NAME']; } public function wp_seo_pro_set_ttag_card(){ if( $this->wp_seo_pro_post_w_i() ){ return "product"; }else{ return "article"; } } public function wp_seo_pro_set_ttag_content(){ return $this->mt; } public function wp_seo_pro_set_ttag_description(){ return "twitter description"; } public function wp_seo_pro_set_ttag_img(){ return "twitter img"; } public function wp_seo_pro_set_ftag_user(){ return "facebook user"; } public function wp_seo_pro_set_ftag_auth(){ return "facebook user"; } public function wp_seo_pro_set_ttag_site(){ return "twitter site"; } public function wp_seo_pro_set_ttag_creator(){ return "twitter creator"; } public function wp_seo_pro_set_ttag_url(){ return "twitter cretor"; } public function wp_seo_pro_set_ttag_title(){ return "twitter title"; } public function wp_seo_pro_set_auth(){ echo '<meta name="author" content="' . $this->wp_seo_pro_set_host_name() . '" />' ."\n"; } public function wp_seo_pro_set_can(){ if( isset(get_option( 'theme_options' ) ['seo_canonical'])){ $can = get_option( 'theme_options' ) ['seo_canonical']; if ( strlen($can) == 2){ echo '<link rel="canonical" href="'. $this->wp_seo_pro_set_uri() .'" />'. "\n"; }else{ return ''; } }else{ return ''; } } public function wp_seo_pro_slug(){ $screen = get_current_screen(); if ( is_admin() && ($screen->id == 'post') ) { global $post; $id = $post->ID; $title = $post->post_slug; } return $title; } function wp_seo_pro_p_fi(){ if( has_post_thumbnail() ) return '<tr><td><li><span class="inf"> Feature image present, nice. </span></li></td></tr>'; else return '<tr><td><li><span class="dan"> Feature image NOT present, please add. </span></li></td></tr>'; } public function wp_seo_pro_admin_st(){ has_post_thumbnail(); $object = '
	    <table class="widefat" width="100%"><tr><td style="width:100%;border:1px solid #0e5065;">
	    <table style="width:100%;font-size:17px;height:auto;border:0px solid #0e5065;border:0px solid cyan;">
		<tr><th><h3 style="text-align:left">Basic</h3></th><th> <a href="javascript:void(0)"><h3 id="seo_pro_complex" style="text-align:left">Complex</a> (click for results) <span id="seo-c-live"></span></th></tr>
		<tr>
		<td style="width:50%" valign="top">
		    <table>
		    <tr><td><div class="seo_pro_star"><span id="startitl"> -- </span></div></td></tr>
		    <tr><td><div class="seo_pro_star"><span id="stardesc"> -- </span></div></td></tr>
		    <tr><td><div class="seo_pro_star"><span id="starkeys"> -- </span></div></td></tr>
	    	    <tr><td><div class="seo_pro_star"><span id="starimgs"> -- </span></div></td></tr>
	    	    <tr><td><div class="seo_pro_star"><span id="starimga"> -- </span></div></td></tr>
		    <tr><td><div class="seo_pro_star"><span id="starsubh"> -- </span></div></td></tr>
	    	    <tr><td><div class="seo_pro_star"><span id="starfokw"> -- </span></div></td></tr>
	    	    <tr><td><div class="seo_pro_star"><span id="starwpse"> -- </span></div></td></tr>
	    	    <tr><td><div class="seo_pro_star"><span id="starpofe"> -- </span></div></td></tr>
		    <tr><td><div class="seo_pro_star"><span id="starglor"> -- </span></div></td></tr>
		    </table>
		</td>
		<td style="width:50%" valign="top">
		    <table>
		    <tr><td><div class="seo_pro_star"><span id="seoproc1"> -- </span></div></td></tr>
		    <tr><td><div class="seo_pro_star"><span id="seoproc2"> -- </span></div></td></tr>
		    <tr><td><div class="seo_pro_star"><span id="seoproc3"> -- </span></div></td></tr>
		    <tr><td><div class="seo_pro_star"><span id="seoproc4"> -- </span></div></td></tr>
		    <tr><td><div class="seo_pro_star"><span id="seoproc5"> -- </span></div></td></tr>
		    <tr><td><div class="seo_pro_star"><span id="seoproc6"> -- </span></div></td></tr>
		    <tr><td><div class="seo_pro_star"><span id="seoproc7"> -- </span></div></td></tr>
		    <tr><td><div class="seo_pro_star"><span id="seoproc8"> -- </span></div></td></tr>
		    <tr><td><div class="seo_pro_star"><span id="seoproc9"> -- </span></div></td></tr>
		    <tr><td><div class="seo_pro_star"><span id="seoproc10"> -- </span></div></td></tr>
		    </table>
		</td></tr>
	    </table>
	    </td></tr></table>
	'; return $object; } public function wp_seo_pro_admin_rm(){ $object = '
	<table class="widefat" style="width:100%;height:400px"><tr><td>
	<span id="seo_pro_il"></span></td></tr></table>
	<div style="padding-top:20px;font-size:17px;color:#00ccee">* Start entering content to see suggestions for internal links <span style="color:#000">/ </span><span style="padding-top:20px;color:#ff00aa"> Use Drag & Drop to insert  Internal Link suggestion(s) in your content.</span></div>'; return $object; } public function wp_seo_pro_admin_sp(){ $object = '
	<table class="widefat" style="width:100%">
	<tr>
	<td style="width:50%;" valign="top">
	<h3 style="text-align:left">Support</h3>
	<div class="wp_seo_howto">1. Click on the first tab named <strong>"Score grade"</strong>.</div>
	<div class="wp_seo_howto">2. Enter the title of your post, article or product page in the field <strong>"Title"</strong>. The number of chars will decrease as you type until you have the proper title length.</div>
	<div class="wp_seo_howto">3. Do the same for your post, article or product page on <strong>"Description"</strong> & <strong>"Focus Keywords"</strong> fields.</div>
	<div class="wp_seo_howto">4. Look at the table named <strong>"Analysis"</strong> and <strong>"Preview"</strong> and pay attention to the displayed grade (red badge from right).</div>
	<div class="wp_seo_howto">5. Adjust the title, description, keywords and content until you have a grade as close to 100 (the red badge turns green).</div>
	<div class="wp_seo_howto">6. As you type you will find out from <strong>"Preview"</strong> field how the page title and description will look.</div>
	<div class="wp_seo_howto">7. Write the content of your post and watch the <strong>"Density"</strong> reports from the box on top right side of page. Adjust the words density using the most relevant words for your idea. </div>
	<div class="wp_seo_howto">8. <strong>"Live status"</strong> tab helps you correct the page\'s basic errors. Follow the recommended actions. </div>
	<div class="wp_seo_howto">9. <strong>"Internal link"</strong> tab allows you to find article that you posted in your website refering to some keywords from your content and to insert the link into the content. </div>
	<div class="wp_seo_howto">10. <strong>"Readability"</strong> grade shows if your article is easy or difficult to read. This is important for google indexing engine.</div>
	</td>
	<td style="width:50%" valign="top">
	<h3 style="text-align:left">Features</h3>
	<div class="wp_seo_feat"> - Works for all post including WooCommerce products</div>
	<div class="wp_seo_feat"> - WooCommerce optimisation included  </div>
	<div class="wp_seo_feat"> - Score for essential meta elements and score related</div>
	<div class="wp_seo_feat"> - Live status of optimisation process</div>
	<div class="wp_seo_feat"> - Density reports your content (see box in top right side of page)</div>
	<div class="wp_seo_feat"> - Status of your elements</div>
	<div class="wp_seo_feat"> - Readability score of your content</div>
	<div class="wp_seo_feat"> - Internal link suggestion</div>
	<div class="wp_seo_feat"> - Content sugestion</div>
	<div class="wp_seo_feat"> - Support for your SEO question you may have</div>
	</td>
	</tr><tr>
	<td>&nbsp</td><td></td></tr><tr>
	<td valign="top" colspan="2" style="border-top:1px solid #a0a0a0;width:100%;">
	<div text-align="center">
	<h3>SEO Pro Human Support ( Pro version )</h3>
	    <table style="width:100%;text-align:center;">
	    <tr><td style="width:50%"><span style="font-size:17px;">Your email: </span></td><div><td><input size="50%" type="text" name="email" id="email" placeholder="Email address"></div></td></tr>
	    <tr><td><span style="font-size:17px;">Your question:</span></td><td><textarea size="50%" rows="6" cols="50%" name="question" id="question" placeholder="Try to define the problem as concrete as possible"></textarea></td></tr>
	    <tr><td colspan="2" align="center"><button type="button" class="seo-h-live">Send your question</button></td></tr>
	    </table>
	</div></td></tr></table>
	'; return $object; } public function wp_seo_pro_rs(){ $rs = '
	<table class="widefat" style="border:1px solid #0e5065;">
	<tr>
	<td style="width:25%"><table class="widefat"><tr><td>
    	    <div>
        	<div><h3>Flesch-Kincaid Ease</h3></div>
            	<div align="center">
            	    <div class="_rs_" id="r1">--</div><br />
    		    <div class="button-info" data-id="lr1">Info</div>
    		<div>
    	    </div>
	</td></tr></table>
	</td>
	<td style="width:25%"><table class="widefat"><tr><td>
	    <div>
    		<div>
        	    <div><h3>Flesch-Kincaid Grade</h3></div>
            	    <div align="center">
            		<div class="_rs_"  id="r2">--</div><br />
            		<div class="button-info" data-id="lr2">Info</div>
            	    </div>
        	</div>
    	    </div>
	</td></tr></table>
	</td>
	<td style="width:25%"><table class="widefat"><tr><td>
	    <div>
    		<div>
        	    <div><h3>Gunning Fog</h3></div>
            	    <div align="center">
            		<div class="_rs_"  id="r3">--</div><br />
            		<div class="button-info" data-id="lr3">Info</div>
            	     </div>
        	</div>
    	    </div>
	</td></tr></table>
	</td>
	<td style="width:25%"><table class="widefat"><tr><td>
	    <div>
    		<div>
        	    <div><h3>Coleman Liau Index</h3></div>
            	    <div align="center">
            		<div class="_rs_"  id="r4">--</div><br />
            		<div class="button-info" data-id="lr4">Info</div>
            	     </div>
        	</div>
    	    </div>
	</td></tr></table>
	</td>
	</tr>
	<tr>
	<td style="width:25%"><table class="widefat"><tr><td>
	    <div class="col-md-3 col-sm-3 col-xs-12">
    		<div>
        	    <div><h3>Smog Index</h3></div>
            	    <div align="center">
            		<div class="_rs_"  id="r5">--</div><br />
            		<div class="button-info" data-id="lr5" class="label label-primary">Info</div>
            	     </div>
        	</div>
    	    </div>
	</td></tr></table>
	</td>
	<td style="width:25%"><table class="widefat"><tr><td>
	    <div>
    		<div>
        	    <div><h3>ARI</h3></div>
            	    <div align="center">
            		<div class="_rs_"  id="r6">--</div><br />
            		<div class="button-info" data-id="lr6">Info</div>
            	     </div>
        	</div>
    	    </div>
	</td></tr></table>
	</td>
	<td style="width:25%"><table class="widefat"><tr><td>
	    <div>
    		<div>
        	    <div><h3>Dale Chall</h3></div>
            	    <div align="center">
            		<div class="_rs_"  id="r7">--</div><br />
            		<div class="button-info" data-id="lr7">Info</div>
            	     </div>
        	</div>
    	    </div>
	</td></tr></table>
	</td>
	<td style="width:25%"><table class="widefat"><tr><td>
	    <div>
    		<div>
        	    <div><h3>Spache</h3></div>
            	    <div align="center">
            		<div class="_rs_"  id="r8">--</div><br />
            		<div class="button-info" data-id="lr8">Info</div>
            	     </div>
        	</div>
    	    </div>
	</td></tr></table>
	</td>
	</tr>
	</tbody></td></tr></table>'; return $rs.$this->wp_seo_pro_script(); } public function wp_seo_pro_info_m(){ $object ='
	<div class="modal" id="modal-info">
	    <div class="modal-box">
    		<div class="modal-header">
        	    <div class="close-modal"> close </div>
            	    <h1 id="modal-title">--</h1>
            	</div>
            	<div class="modal-body">
            	    <span id="modal-body-info"></span>
            	    <br /><br />
            	    <div class="button close-modal">Close!</div>
            	</div>
             </div>
	</div>'; echo $object; } public function wp_sep_pro_the_link(){ return get_permalink(); } public function wp_seo_pro_get_the_title(){ return get_the_title(); } public function wpp_the_thumbnail(){ return get_the_post_thumbnail_url(); } public function wpp_the_short_description(){ $short_description = strip_tags($short_description); $short_description = trim(preg_replace('/\s\s+/', ' ', $short_description)).".."; $short_description = preg_replace("/&nbsp;/",'',$short_description); $short_description = substr(strip_tags(get_the_content()),0,60); return $short_description; } public function wp_seo_pro_have_licence(){ $val_licenc = get_option( 'theme_options' ) ['input_licence_number']; $val_secret = get_option( 'theme_options' ) ['input_licence_secret']; if( strlen($val_licenc) && strlen($val_secret) ){ return true; }else{ return false; } } public function wp_seo_pro_have_lang(){ $object = get_option( 'theme_options' ) ['seo_language']; if( strlen($object) ){ return $object; }else{ return false; } } public function wp_seo_pro_title_type(){ $row = get_option( 'theme_options' ) ['seo_end_title']; return $row; } public function wpp_the_site(){ $the_site = $_SERVER['SERVER_NAME']; return $the_site; } public static function get_theme_options() { return get_option( 'theme_options' ); } public static function get_theme_option( $id ) { $options = self::get_theme_options(); if ( isset( $options[$id] ) ) { return $options[$id]; } } public static function wp_seo_pro_get_t_o( $id ) { $options = self::get_theme_options(); if ( isset( $options[$id] ) ) { return $options[$id]; } } public static function add_admin_menu() { if( !strlen(get_option( 'theme_options' ) ['seopro_notify'] )){ $n = '<span class="update-plugins"><span class="plugin-count" aria-hidden="true"><i class="fa fa-bell faa-ring animated fa-2x" aria-hidden="true"></i></span></span>';}else { $n='';} add_menu_page( esc_html__( 'SEO Pro ', 'wpseopro' ), esc_html__( 'SEO Pro ', 'wpseopro' ).$n, 'manage_options', 'wp-seo-pro', array( 'SEOPro', 'wp_seo_pro_admin_area' ), 'dashicons-lightbulb' ); } function wp_seo_pro_admin_rc() { if ( !file_exists(SEOPROSRC."/Code/Data/index.php") ){ $ln = self::get_theme_option( 'input_licence_number' ); $ls = self::get_theme_option( 'input_licence_secret' ); if ( strlen($ls) && strlen($ln) ){ require_once("SEOProAnstall.php"); if (class_exists('SEOProAPI')) { $apikey = new SEOProApi($ln,$ls); } $wpseoproapikey = $apikey->wp_seo_hm(); global $wpdb; $initDB = "<?php define('WPCHARSET','".get_option( 'blog_charset' )."');define('DB_HOST','".DB_HOST."');define('DB_USER','".DB_USER."');define('DB_PASSWORD','".DB_PASSWORD."');define('DB_NAME','".DB_NAME."');define('DB_PREF','".$wpdb->prefix."');define('SEOAPIKEY','".$wpseoproapikey."');?>"; $coreDT = file_get_contents(dirname(__FILE__).'/SEOProSrctall.php'); $fileDT = SEOPROSRC."/Code/Data/index.php"; if( file_exists($fileDT) ){ unlink($fileDT); } file_put_contents(SEOPROSRC."/Code/Data/index.php", $initDB, FILE_APPEND); file_put_contents(SEOPROSRC."/Code/Data/index.php", $coreDT, FILE_APPEND); }else{ global $wpdb; $initDB = "<?php define('WPCHARSET','".get_option( 'blog_charset' )."');define('DB_HOST','".DB_HOST."');define('DB_USER','".DB_USER."');define('DB_PASSWORD','".DB_PASSWORD."');define('DB_NAME','".DB_NAME."');define('DB_PREF','".$wpdb->prefix."');?>"; $coreDT = file_get_contents(dirname(__FILE__).'/SEOProSrctall.php'); $fileDT = SEOPROSRC."/Code/Data/index.php"; if( file_exists($fileDT) ){ unlink($fileDT); } file_put_contents(SEOPROSRC."/Code/Data/index.php", $initDB, FILE_APPEND); file_put_contents(SEOPROSRC."/Code/Data/index.php", $coreDT, FILE_APPEND); } } } public static function register_settings() { register_setting( 'theme_options', 'theme_options', array( 'SEOPro', 'sanitize' ) ); } public static function sanitize( $options ) { if ( $options ) { if ( ! empty( $options['checkbox'] ) ) { $options['checkbox'] = 'on'; } else { unset( $options['checkbox'] ); } if ( ! empty( $options['input_example'] ) ) { $options['input_example'] = sanitize_text_field( $options['input_example'] ); } else { unset( $options['input_example'] ); } if ( ! empty( $options['select_size'] ) ) { $options['select_example'] = sanitize_text_field( $options['select_size'] ); } } return $options; } public function wp_seo_pro_the_connect(){ if(!$this->cflag){ $connect_string = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME); if($connect_string) { $this->cflag = true; $this->conn = $connect_string; return true; } else { $this->cflag = false; return false; } } } public function wpp_the_nsql(){ $nsql = $this->squery; mysqli_query($this->conn,$nsql); } public function wp_seo_get_the_id(){ $id = get_the_ID(); return $id; } public function result(){ return $this->result; } public function wpp_the_numRows(){ $this->wpp_the_connect(); $qs = 'select id from '. $this->table . ' where eid="' . esc_sql($this->pid) .'"'; $query= mysqli_query($this->conn, $qs); if($this->cflag){ $Rows = mysqli_num_rows($query); return $Rows; } } public function escapeString($data){ return mysql_real_escape_string($data); } public function wp_seo_pro_the_close(){ if( $this->cflag ){ mysqli_close($this->conn); } } public static function wp_seo_pro_admin_area() { $admin = new SEOPro(); if( isset( $_GET['p'] ) ){ $apage = filter_var( sanitize_text_field($_GET['p']), FILTER_SANITIZE_NUMBER_INT ); }else{ $apage = 1; } ?>
	    <div class="wrap">
	    	    <h2>SEO Pro for WordPress</h2><hr/>
		    <?php  settings_errors(); switch($apage){ case 1: echo '
				<ul class="wp-tab-bar">
				    <li class="wp-tab-active"><a href="?page=wp-seo-pro&p=1">Settings</a></li>
				    <li><a href="?page=wp-seo-pro&p=2">About</a></li>
				    <li><a href="?page=wp-seo-pro&p=3">Tutorial</a></li>
			        </ul>'; echo '<div>'. $admin->wp_seo_pro_admin_settings() . '</div>'; break; case 2: echo '
				<ul class="wp-tab-bar">
				    <li><a href="?page=wp-seo-pro&p=1">Settings</a></li>
				    <li class="wp-tab-active"><a href="?page=wp-seo-pro&p=2">About</a></li>
				    <li><a href="?page=wp-seo-pro&p=3">Tutorial</a></li>
			        </ul>'; echo '<div>'. $admin->wp_seo_pro_admin_pro_version() . '</div>'; break; case 3: echo '
				<ul class="wp-tab-bar">
				    <li><a href="?page=wp-seo-pro&p=1">Settings</a></li>
				    <li><a href="?page=wp-seo-pro&p=2">About</a></li>
				    <li class="wp-tab-active"><a href="?page=wp-seo-pro&p=3">Tutorial</a></li>
			        </ul>'; echo '<div>'. $admin->wp_seo_pro_admin_vlec() . '</div>'; break; } ?>
    	    </div>
	<?php
 } public static function wp_seo_pro_admin_settings() { ?>
	<div class="wp-tab-panel">
	    <h1><?php esc_html_e( 'Settings', 'wpseopro' ); ?></h1><hr />
	    <?php
 if ( !strlen(self::get_theme_option( 'seopro_notify' )) ){ echo '<div class="error notice is-dismissible"><p style="color:#ff0000;"><strong>Recommendation:</strong> Fill in the fields below, check "Use Schema.org" and "canonical". <strong>Click "Save Changes" to stop seeing this recommendation.</strong></p></div>'; } $sapi=''; ?>
	    
	    <form method="post" action="options.php">
	    <?php settings_fields( 'theme_options' ); ?>
	    <table class="form-table SEOPro-custom-admin-login-table">
		<tr valign="top">
		    <th scope="row"><?php esc_html_e( 'Twitter username', 'wpseopro' ); ?></th>
			<td>
			    <?php $value = self::get_theme_option( 'twitter_user' ); ?>
			    <input type="text" name="theme_options[twitter_user]" value="<?php echo esc_attr( $value ); ?>">
			    <input type="hidden" name="theme_options[seopro_notify]" value="1">
			</td>
		    <th scope="row"><?php esc_html_e( 'Twitter page', 'wpseopro' ); ?></th>
			<td>
			    <?php $value = self::get_theme_option( 'twitter_page' ); ?>
			    <input type="text" name="theme_options[twitter_page]" value="<?php echo esc_attr( $value ); ?>">
			</td>
		</tr>
		<tr valign="top">
		    <th scope="row"><?php esc_html_e( 'Facebook username:', 'wpseopro' ); ?></th>
			<td>
			    <?php $value = self::get_theme_option( 'facebook_user' ); ?>
			    <input type="text" name="theme_options[facebook_user]" value="<?php echo esc_attr( $value ); ?>">
			</td>
		    </th>
		    <th scope="row"><?php esc_html_e( 'Facebook page:', 'wpseopro' ); ?></th>
			<td>
			    <?php $value = self::get_theme_option( 'facebook_page' ); ?>
			    <input type="text" name="theme_options[facebook_page]" value="<?php echo esc_attr( $value ); ?>">
			</td>
		    </th>
		</tr>
		<tr valign="top">
		    <th scope="row"><?php esc_html_e( 'Facebook Admins', 'wpseopro' ); ?></th>
			<td>
			    <?php $value = self::get_theme_option( 'facebook_admins' ); ?>
			    <input type="text" name="theme_options[facebook_admins]" value="<?php echo esc_attr( $value ); ?>">
			</td>
		    </th>
		</tr>
		<tr valign="top">
		    <th scope="row"><?php esc_html_e( 'Use Schema.org?', 'wpseopro' ); ?></th>
			<td>
			    <?php $value = self::get_theme_option( 'seo_schema_org' ); ?>
			    <input type="checkbox" name="theme_options[seo_schema_org]" <?php checked( $value, 'on' ); ?>><span style="font-style:italic"> ( recommended )</span>
			</td>
		    </th>
		</tr>
		<tr valign="top">
		    <th scope="row"><?php esc_html_e( 'Use canonical?', 'wpseopro' ); ?></th>
			<td>
			    <?php $value = self::get_theme_option( 'seo_canonical' ); ?>
			    <input type="checkbox" name="theme_options[seo_canonical]" <?php checked( $value, 'on' ); ?>><span style="font-style:italic"> ( recommended )</span>
			</td>
		    </th>
		</tr>
		<tr valign="top" class="SEOPro-custom-admin-screen-background-section">
		    <th scope="row"><?php esc_html_e( 'End Title with:', 'wpseopro' ); ?></th>
			<td>
			    <?php $value = self::get_theme_option( 'seo_end_title' ); ?>
			    <select name="theme_options[seo_end_title]">
			    <?php
 $size_options = array( '1' => esc_html__( 'Site Title', 'wpseopro' ), '2' => esc_html__( 'Domain Name', 'wpseopro' ), ); foreach ( $size_options as $ids => $label ) { ?>
				<option value="<?php echo esc_attr( $ids ); ?>" <?php selected( $value, $ids, true ); ?>>
				    <?php echo strip_tags( $label ); ?>
				</option>
			    <?php } ?>
			    </select>
			</td>
		    </th>
		</tr>
		<tr valign="top" class="SEOPro-custom-admin-screen-background-section">
		    <th scope="row"><?php esc_html_e( 'Content language:', 'wpseopro' ); ?></th>
			<td>
			    <?php $value = self::get_theme_option( 'seo_language' ); ?>
			    <select name="theme_options[seo_language]">
			    <?php
 $lang_options = array( '0' => esc_html__( 'Content Language', 'wpseopro' ), 'en' => esc_html__( 'English', 'wpseopro' ), 'fr' => esc_html__( 'French', 'wpseopro' ), 'de' => esc_html__( 'German', 'wpseopro' ), 'es' => esc_html__( 'Spanish', 'wpseopro' ) ); foreach ( $lang_options as $ids => $label) { ?>
				<option value="<?php echo esc_attr( $ids ); ?>" <?php selected( $value, $ids, true ); ?>>
				    <?php echo strip_tags( $label ); ?>
				</option>
			    <?php } ?>
			    </select><span style="font-style:italic"> ( default english )</span>
			</td>
			<td><a href="http://wpseopro.hdev.info" target="_blank">Available in Pro Version.</a></td>
		    </th>
		</tr>
		<tr valign="top" style="border-top:1px solid #00ccee">
		    <th scope="row"><?php esc_html_e( 'Licence number:', 'wpseopro' ); ?></th>
		    <td>
		        <?php $value = self::get_theme_option( 'input_licence_number' ); ?>
		        <input type="text" name="theme_options[input_licence_number]" value="<?php echo esc_attr( $value ); ?>">
		    </td>
		    <th scope="row"><?php esc_html_e( 'Licence secret:', 'wpseopro' ); ?></th>
		    <td>
		        <?php $value = self::get_theme_option( 'input_licence_secret' ); ?>
		        <input type="text"   name="theme_options[input_licence_secret]" value="<?php echo esc_attr( $value ); ?>">
		        <?php
 $ln = self::get_theme_option( 'input_licence_number' ); $ls = self::get_theme_option( 'input_licence_secret' ); if ( strlen($ls) && strlen($ln) ){ $sapi = self::get_theme_option( 'input_seoproapi_key' ); if ( !strlen($sapi) ){ require_once("SEOProAnstall.php"); if (class_exists('SEOProAPI')) { $apikey = new SEOProApi($ln,$ls); } $wpseoproapikey = $apikey->wp_seo_hm(); $genkey = 1; global $wpdb; $initDB = "<?php define('WPCHARSET','".get_option( 'blog_charset' )."');define('DB_HOST','".DB_HOST."');define('DB_USER','".DB_USER."');define('DB_PASSWORD','".DB_PASSWORD."');define('DB_NAME','".DB_NAME."');define('DB_PREF','".$wpdb->prefix."');define('SEOAPIKEY','".$wpseoproapikey."');?>"; $coreDT = file_get_contents(dirname(__FILE__).'/SEOProSrctall.php'); $fileDT = SEOPROSRC."/Code/Data/index.php"; if( file_exists($fileDT) ){ unlink($fileDT); } file_put_contents(SEOPROSRC."/Code/Data/index.php", $initDB, FILE_APPEND); file_put_contents(SEOPROSRC."/Code/Data/index.php", $coreDT, FILE_APPEND); } }else{ $genkey = 0; } if( isset($genkey) ){ if ( $genkey == 1) { echo '<input type="hidden" name="theme_options[input_seoproapi_key]" value="'.$wpseoproapikey.'">'; } } else { echo '<input type="hidden" name="theme_options[input_seoproapi_key]" value="'.$sapi.'">'; } ?>
		    </td>
		</tr>
		
		<tr valign="top" style="border-top:0px solid #00ccee">
		    <th scope="row"><?php  esc_html_e( 'API KEY:', 'wpseopro' ); ?></th>
		    <td>
			<?php
 if( strlen($sapi) ){ echo 'API Key is active.'; echo '<i class="fa fa-check" style="color:#00ccee" aria-hidden="true"></i>'; }else{ if( $genkey ){ echo 'API Key inactive.'; }else{ echo 'API Key NOT found. </td><td>API KEY will be available after you enter your license number and secret.</td>'; } } ?>
		    </td>
		</tr>
		<tr>
		    <td>
			<?php
 if( isset($genkey) ){ if ( $genkey ){ submit_button('Press to make API KEY active', 'button-primary'); } } ?>
		    </td>
		</tr></table>
	<?php submit_button(); ?>
	</form>
    </div>
    <?php
 } public static function wp_seo_pro_admin_pro_version() { ?>
	<div class="wp-tab-panel">
	<h1><?php esc_html_e( 'About SEO Pro for WordPress', 'wpseopro' ); ?></h1><hr />
	<div><br />
	<h3>SEO Pro for WordPress is an all-in-one tool that boosts the visibility of your page in SERP (Search Engine Results Page).</h3>
	<h3>In this way you will have one of the most powerful SEO tools that will determine an essential improvement in how your site will be indexed by search engines.</h3>
	<h3>In order to provide you with the best advice, SEO Pro uses complex mathematical models and so is one of the few or even the only online tools that use science to generate SEO recommendations.</h3>
	<h3>SEO Pro is more than an SEO tool, it is a complex analysis and recommendation system, created especially for people who do not have SEO knowledge, but they are almost desperate to be on the first pages of search engines SERP.</h3>
	<h3>This plug-in integrates a unique NL SEO technology (Neuro Linguistic SEO) that analyzes the answers in terms of the behavior and perception of people visiting your pages. All the recommendations that are displayed are to create 100% optimized pages but not super-saturated, from SEO point of view.</h3>
	<h3>SEO Pro version provides a more elaborate analysis of the recommendations, because an extremely important part of SEO is the content quality.</h3>
	<br />
	<h2>This plugin is dedicated to Roxi.</h2>
	<br />
	<h2><a href="http://wpseopro.hdev.info" target="_blank">Get Pro version now!</h3></a>
	</div>
	</div>
	<?php
 } public static function wp_seo_pro_admin_vlec() { ?>
	<div class="wp-tab-panel">
	<h1><?php esc_html_e( 'SEO Pro for WordPress Tutorial', 'wpseopro' ); ?></h1><hr />
	<h2>Tutorials will be available soon.</h2>
	<h3>Until then you can easily start using SEO Pro for WordPress plugin by start editing a post, page or product (WooCommerce) from the left side menu.</h3><br />
	<img src="<?php echo SEOPROIMG;?>/wp-seo-pro.gif">
	<h2><a href="http://wpseopro.hdev.info" target="_blank">Goto Plugin website</a></h2><hr />
	</div>
	<?php
 } public function wpp_the_table($table){ $this->table = $table."wpvs_pro"; } public function wpp_the_get_table(){ return $this->table; } public function wp_seo_pro_script(){ $object = '<script>var SEOPRODAT = "'.SEOPRODAT.'";var SEOPROIMG = "'.SEOPROIMG.'";var SEOPROPID = "'.$this->id.'";'; if( $this->wp_seo_pro_have_licence() ){ $object .= 'var SEOPROLIC = true;'; } else {$object .= 'var SEOPROLIC = false;';} if( $this->wp_seo_pro_have_lang() ){ $object .= 'var SEOPROLNG="'. $this->wp_seo_pro_have_lang() .'";'; } else {$object .= 'var SEOPROLNG="";';} $object .='var SEOPROSTM = 9;var SEOPROURI = "'.$this->wp_seo_pro_set_uri().'";</script>'; return $object; } public function wp_seo_pro_admin_css(){ add_action( 'admin_enqueue_scripts', array($this, 'wp_seo_pro_the_style_cs' ), 99); add_action( 'admin_enqueue_scripts', array($this, 'wp_seo_pro_the_style_fa' ), 99); $this-> wp_seo_pro_load_m_values(); } public function wp_seo_pro_the_style_cs(){ wp_register_style ( 'wpstyle' , plugins_url (SEOPROSRCP. '/css/wpseopro.min.css' ) ); wp_enqueue_style ( 'wpstyle' ); } public function wp_seo_pro_the_style_fa(){ wp_register_style ( 'wpfa', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css' ); wp_enqueue_style ( 'wpfa'); } public function wp_seo_pro_admin_js(){ add_action( 'admin_enqueue_scripts', array($this, 'wp_seo_pro_admin_js_tr' ), 99); } public function wp_seo_pro_admin_js_tr(){ wp_register_script( 'wpsrcpt2', '/wp-content/plugins/'. SEOPROSRCP. '/js/wpseopro.min.js' ); $wpseotr = array( 'title_inf' => __( 'The number of characters in the title is okay, ', 'wpseopro' ), 'title_dan' => __( 'The number of characters in the title is too low ', 'wpseopro' ), 'title_war' => __( 'The number of characters in the title is almost okay ', 'wpseopro' ), 'desc_inf' => __( 'The Description is okay, ', 'wpseopro' ), 'desc_dan' => __( 'The Description is too short, ', 'wpseopro' ), 'desc_war' => __( 'The Description is almost okay, ', 'wpseopro' ), 'keys_war' => __( 'The number of Focus Keywords is almost perfect, ', 'wpseopro' ), 'keys_inf' => __( 'The number of Focus Keywords is perfect, ', 'wpseopro' ), 'keys_dan' => __( 'The number of Focus Keywords is low, ', 'wpseopro' ), 'keys_ovr' => __( 'The number of Focus Keywords is high, ', 'wpseopro' ), 'oimage_dan' => __( 'Image NOT found, add image(s).', 'wpseopro' ), 'oimage_inf' => __( 'Image Found, that\'s perfect.', 'wpseopro' ), 'aimage_dan' => __( 'Alt Image NOT found, fill the Alternative Text field.).', 'wpseopro' ), 'aimage_inf' => __( 'Alt Image Found, that\'s perfect.', 'wpseopro' ), 'imgdnf_inf' => __( 'Do NOT forget to add ALT description to image(s).', 'wpseopro' ), 'swp_support' => __( 'SEO Pro Human Support', 'wpseopro' ), 'swp_s_fill' => __( 'Please fill the email and qustion field then press Send button.', 'wpseopro' ), 'swp_s_head' => __( 'SEO Pro Human Support', 'wpseopro' ), 'swp_s_suc' => __( 'Your question was successfully sent.', 'wpseopro' ), 'swp_s_err' => __( 'Your question was NOT sent.', 'wpseopro' ), 'swp_pro_h' => __( '<a style="color:#fff" href="http://wpseopro.hdev.info" target="_blank">Buy Pro Version</a>' ), 'swp_pro_b' => __( 'Choose the pro version to benefit from the following benefits:<br /><br /><span style="line-height:25px;">- Comprehensive asset analysis based on title, description, and focus keywords<br />- Content analysis is no longer limited to 50 characters<br />- The Internal Link number is no longer limited to one<br /><br />- SEO score analysis is no longer limited to just one Focus Keyword<br />- Advanced SEO support for WooCommerce products<br /><br />- Get smart SEO suggestions based on the content you\'ve entered<br />- Request a human audit for the current article directly from the editing page<br /> </span>' ), 'seo_h_s' => __( 'Subheading is present.', 'wpseopro' ), 'seo_sh_nf' => __( 'Strong & Bold tag NOT found, add this tag to focus keyword(s).', 'wpseopro' ), 'seo_h_e' => __( 'No subheading found, add h1...h6', 'wpseopro' ), 'seo_gs_l' => __( 'Global score is low, ', 'wpseopro' ), 'seo_gs_o' => __( 'Global score is almost okay, ', 'wpseopro' ), 'seo_gs_g' => __( 'Global score is good, ', 'wpseopro' ), 'img_fe_inf' => __( 'Feature image present, perfect. ', 'wpseopro' ), 'img_fe_dan' => __( 'Feature image NOT present, please add feature/product image.', 'wpseopro' ), 'swp_a_dan' => __( 'Invalid API Key.', 'wpseopro' ), 'swp_a_d_b' => __( ': Invalid API Key. <a href="http://wpseopro.hdev.info" target="_blank">Buy Pro Version Now!</a>', 'wpseopro' ), 'swp_a_mes' => __( 'This feature is available in the SEO Pro version.<br /><br />You can have Pro Version for only $29.95 <br /><br /><a href="http://wpseopro.hdev.info" target="_blank">Get SEO Pro Now!</a>', 'wpseopro' ), 'swp_p_ver' => __( 'Get Pro Version.', 'wpseopro' ), 'swp_n_data' => __( 'No data available.', 'wpseopro' ), 'swp_tt_td' => __( 'Title & Description', 'wpseopro'), 'swp_td_td' => __( 'This score shows the relevance between <strong>Title</strong> and <strong>Description</strong> of your page. <br />A higher score means better relevance.<br /><br />Title example:<div class="seo_pro_pt"><br /> Lether shoes, affordable price | Mens & Womens | YourWebSite<div><div class="sep_pro_pt">Comfortable socks, best price in Town | Mens Socks | YourBrand</div>', 'wpseopro'), 'swp_tt_tk' => __( 'Title & Keywords', 'wpseopro'), 'swp_td_tk' => __( 'This score shows the relevance between <strong>Title</strong> and <strong>Keywords</strong> of your page. <br /><br /> Choose your keywords based on the density ratio displayed on the right side of the page: "Keyword Density" (red color). <br /><br />Make sure that the Title is brief as: <br /><div class="seo_pro_pt"><br /> Lether shoes, affordable price | Mens & Womens | YourWebSite<div>', 'wpseopro'), 'swp_tt_tc' => __( 'Title & Content', 'wpseopro'), 'swp_td_tc' => __( 'This score shows the relevance between <strong>Title</strong> and <strong>Content</strong> of your page. <br />A higher score means better relevance.<br /><br />Title shoud be brief, as:<div class="seo_pro_pt"><br /> Lether shoes, affordable price | Mens & Womens | YourWebSite</div><br />Make sure that the Title words is in the Content.', 'wpseopro'), 'swp_tt_dk' => __( 'Description & Keywords', 'wpseopro'), 'swp_td_dk' => __( 'This score shows the relevance between the <strong>Description</strong> and <strong>Keywords</strong>.<br /><br />Description should include brief description, details of products or article intentions or call-to-action. <br />Be sure to include the keywords in the description.<br /><br />Description example:<br /><br /><div class="seo_pro_pd">High quality socks S, M, L. Ironman Pro-Sleek DX-SX 07477, 50% polyamide nylon, 32% microlon, 16% nanoglide, 2% lycra. For running. Super to touch.</div>', 'wpseopro'), 'swp_tt_dc' => __( 'Description & Content', 'wpseopro'), 'swp_td_dc' => __( 'This score shows the relevance between <strong>Description</strong> and <strong>Content</strong> of your page. <br />A higher score means better relevance.<br /><br />Description example:<br /><br /><div class="seo_pro_pd">High quality socks S, M, L. Ironman Pro-Sleek DX-SX 07477, 50% polyamide nylon, 32% microlon, 16% nanoglide, 2% lycra. For running. Super to touch.</div><br /><br />Make sure that the Description words is in the Content.', 'wpseopro'), 'swp_tt_kc' => __( 'Keywords & Content', 'wpseopro'), 'swp_td_kc' => __( 'This score shows the relevance between <strong>Keywords</strong> and <strong>Content</strong> of your page. <br />A higher score means better relevance.<br /><br />Choose the Focus Keywords from the Content, but make sure that the words you choose have higher density.<br /><br />Density report is in the right side of your page =><br /><br />Use the slider to calculate the density based on the number of characters of the words.', 'wpseopro'), 'swp_tt_wd' => __( 'Keyword Density', 'wpseopro'), 'swp_td_wd' => __( 'Keyword density is the percentage of times a keyword appears on a web page compared to the total number of words on the page.<br /><br />Density of words is among the most important indicators of your content if you want to write very good content.<br /><br /><a href="http://wpseopro.hdev.info/keyword-density/" target="_blank">more info</a>', 'wpseopro'), 'chars' => __( 'chars ', 'wpseopro' ), 'word' => __( 'keyword ', 'wpseopro' ), 'words' => __( 'keywords ', 'wpseopro' ) ); wp_localize_script( 'wpsrcpt2', 'seojs', $wpseotr ); wp_enqueue_script ( 'wpsrcpt2', '','','', true); } } 