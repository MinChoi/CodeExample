<div id="left-col">
<?
	if(isset($site_search))
	{
		echo '<ul id="left-nav"><li class="active"><a href="/site-search"> Site search</a></li></ul>';
	}
	if(($this->here == '/members-area.html' || (isset($this->request->data['parent_url']) && $this->request->data['parent_url'] == '/members-area.html')) && $this->Session->check('Member.id')){
?>
	<ul id="left-nav">
		<?
		if($this->Session->read('Member.member_group_id')=='1'){
			if($this->Session->read('Member.keycontact')=='1'){
				$ma_fixed_menus = array(
					'Member news'=>'/memberarea-news',
					'Audio / Video gallery'=>'/memberarea-av',
					'Polls'=>'/memberarea-polls',
					'Edit account details'=>'/memberarea-editacc',
					'Manage organisation details'=>'/memberarea-mod',
					'Manage organisation accounts'=>'/memberarea-moa',
					'Registered events'=>'/memberarea-regevents'
				);		
			}else{			
				$ma_fixed_menus = array(
					'Member news'=>'/memberarea-news',
					'Audio / Video gallery'=>'/memberarea-av',
					'Polls'=>'/memberarea-polls',
					'Edit account details'=>'/memberarea-editacc',
					'Registered events'=>'/memberarea-regevents'						
				);
			}
		}else{
			$ma_fixed_menus = array(
			//	'Member news'=>'/memberarea-news',
				'Edit account details'=>'/memberarea-editacc',
				'Registered events'=>'/memberarea-regevents'						
			);
		}
		
			foreach($ma_fixed_menus as $ma_fmenu_label=>$ma_fmenu){
				if($this->here == $ma_fmenu){
					echo '<li class="active"><a href="'.$ma_fmenu.'">'.$ma_fmenu_label.'</a></li>';
				}else{
					echo '<li class=""><a href="'.$ma_fmenu.'">'.$ma_fmenu_label.'</a></li>';
				}
			}
		?>
	</li>
<?	
	}else if(!isset($site_search)){
	$pageclass = ClassRegistry::init('Page');
	$fixedmenuclass = ClassRegistry::init('FixedMenu');
	

	
	function NgetProcessedMenu($csession,$sitemap,$page_id,$pageclass,$fixedmenuclass){
		$nodes = array();
		$fixed_nodes = array();
		$nodes = $pageclass->getnav($sitemap,$page_id); //$this->requestAction('/pages/getnav/1/0');
		$fixed_nodes = $fixedmenuclass->getfixednav($sitemap,$page_id); // $this->requestAction('/fixed_menus/getfixednav/1/0');

		$total_count = count($nodes) + count($fixed_nodes);

		$menus = array();
		for($sorti=0;$sorti<$total_count;$sorti++){
			$added = false;
			foreach($fixed_nodes as $key=>$fixed_node){
				if($fixed_node['FixedMenu']['porder']==$sorti){
					$fixed_node['FixedMenu']['menu_name'] = ucwords($fixed_node['FixedMenu']['menu_name']);
					$fixed_node['FixedMenu']['url'] = $fixed_node['FixedMenu']['add_url'];
					$fixed_node['FixedMenu']['fixed'] = true;
					if($fixed_node['FixedMenu']['id']==1){
						$fixed_node['FixedMenu']['pages'] = getEventMenus();//$fixed_node['FixedMenu'];
					}else{
						$fixed_node['FixedMenu']['pages'] = getNewsMenus($csession);//$fixed_node['FixedMenu'];
					}					
					$menus[$sorti]['Page'] = $fixed_node['FixedMenu'];
					
					$fixed_nodes[$key]['FixedMenu']['used'] = true;
					$added = true;
					break;
				}
			}
			if($added == true){continue;}
			foreach($nodes as $key=>$node){
				if($node['Page']['porder']==$sorti){
					if($node['Page']['islink']==0){
						$node['Page']['url'] = strtolower(urlencode(str_replace(array('&','/',' ','+'),array('and','or','-','and'),$node['Page']['menu_name']))).'.html';
					}else{
						$node['Page']['url'] = $node['Page']['link'];
						$node['Page']['islink'] = $node['Page']['islink'];
					}
						
					$menus[$sorti]['Page'] = $node['Page'];
					$nodes[$key]['Page']['used'] = true;
					$added = true;
					break;
				}
			}	
		}

		if(count($menus)!=$total_count){
			foreach($nodes as $key=>$node){
				if(!isset($node['Page']['used'])){
					if($node['Page']['islink']==0){
						$node['Page']['url'] = strtolower(urlencode(str_replace(array('&','/',' ','+'),array('and','or','-','and'),$node['Page']['menu_name']))).'.html';
					}else{
						$node['Page']['url'] = $node['Page']['link'];
						$node['Page']['islink'] = $node['Page']['islink'];
					}
					$menus[]['Page'] = $node['Page'];
				}
			}
			foreach($fixed_nodes as $key=>$fixed_node){
				if(!isset($fixed_node['FixedMenu']['used'])){
					if($fixed_node['FixedMenu']['id']==1){
						$fixed_node['FixedMenu']['pages'] = getEventMenus();//$fixed_node['FixedMenu'];
					}else{
						$fixed_node['FixedMenu']['pages'] = getNewsMenus();//$fixed_node['FixedMenu'];
					}
					$fixed_node['FixedMenu']['menu_name'] = ucwords($fixed_node['FixedMenu']['menu_name']);
					$fixed_node['FixedMenu']['url'] = $fixed_node['FixedMenu']['add_url'];
					$fixed_node['FixedMenu']['fixed'] = true;
					$menus[]['Page'] = $fixed_node['FixedMenu'];
				}
			}
		}

		//final sort
		$final_menu = array();
		foreach($menus as $menu_i){
			if(isset($menu_i['Page']['pages'])){
				foreach($menu_i['Page']['pages'] as $cpage){
					$final_menu[]['Page'] = $cpage;
				}
			}else{
				$final_menu[] = $menu_i;
			}
		}
		
		
		return  $final_menu; //$menus
	}
	/*
	function process_level2menu($menus_level_2,$thishere,$urlencode_current_url,$sub_selected){
		$lnclass="";
		$leftmenu = '';
		$lactive = false;
		foreach($menus as $key => $menu){
			if($total_count-1==$key){
				$lnclass="last";
			}
			if(isset($menu['Page']['islink']) && $menu['Page']['islink']==1){
				$leftmenu .= '<li class="'.$lnclass.'"><a href="/'.$menu['Page']['url'].'">'.$menu['Page']['menu_name'].'</a></li>';
			}else{
				if($this->here == '/'.urldecode($menu['Page']['url']) || $this->here == '/'.urldecode($current_url)){
					$leftmenu .= '<li class="active '.$lnclass.'"><a href="/'.$menu['Page']['url'].'">'.$menu['Page']['menu_name'].'</a></li>';
				}else{
					$leftmenu .= '<li class="'.$lnclass.'"><a href="/'.$menu['Page']['url'].'">'.$menu['Page']['menu_name'].'</a></li>';
				}
			}
		}
		return $leftmenu;
	}*/
	
	
	function getLeftSubMenu($csession,$thishere,$current_url='',$parentids,$pageclass,$fixedmenuclass,$page_id,$section){
		$section = str_replace('.html','',$section);
		if(isset($page_id)){
			$menus = NgetProcessedMenu($csession,1,$page_id,&$pageclass,&$fixedmenuclass);

			$lnclass="";
			$leftmenu = '<ul>';
			$lactive = false;
			$total_count = count($menus);
			foreach($menus as $key => $menu){
				if($total_count-1==$key){
					$lnclass="last";
				}
				if(isset($menu['Page']['islink']) && $menu['Page']['islink']==1){
					$target = '_blank';if($menu['Page']['linktype']=='2'){$target = '';}
					if($thishere == urldecode($menu['Page']['url'])){
						$leftmenu .= '<li class="active '.$lnclass.'"><a class="active"  target="'.$target.'" href="'.$menu['Page']['url'].'">'.$menu['Page']['menu_name'].'</a></li>';
					}else{
						$leftmenu .= '<li class="'.$lnclass.'"><a target="'.$target.'" href="'.$menu['Page']['url'].'">'.$menu['Page']['menu_name'].'</a></li>';
					}
				}else{
					
					if(isset($menu['Page']['fixed'])){
						if($thishere == '/'.urldecode($menu['Page']['url']) || $thishere == '/'.urldecode($current_url) || (isset($parentids[3]) && $parentids[3]==$menu['Page']['id'])){
							$leftmenu .= '<li class="active '.$lnclass.'"><a class="active"  href="/'.$menu['Page']['url'].'">'.$menu['Page']['menu_name'].'</a></li>';
						}else{
							$leftmenu .= '<li class="'.$lnclass.'"><a href="/'.$menu['Page']['url'].'">'.$menu['Page']['menu_name'].'</a></li>';
						}

					
					}else{
						if($thishere == '/'.$section.'/'.urldecode($menu['Page']['url']) || $thishere == '/'.urldecode($current_url) || (isset($parentids[3]) && $parentids[3]==$menu['Page']['id'])){
							$leftmenu .= '<li class="active '.$lnclass.'"><a class="active" href="/'.$section.'/'.$menu['Page']['url'].'">'.$menu['Page']['menu_name'].'</a></li>';
						}else{
							$leftmenu .= '<li class="'.$lnclass.'"><a href="/'.$section.'/'.$menu['Page']['url'].'">'.$menu['Page']['menu_name'].'</a></li>';
						}
					}
					
				}
			}
			$leftmenu .='</ul>';
			
			return $leftmenu;
		}else{
			return '';
		}
	}
?>

	<ul id="left-nav">
		<?
		if(empty($current_url))
		{
			$current_url = "";
		}
			$menus = NgetProcessedMenu($session,1,$parentids[1],&$pageclass,&$fixedmenuclass);
			
			$top_menu = $pageclass->read(null,$parentids[1]);
			$section_name = $top_menu['Page']['menu_name'];
			$section_url = strtolower(urlencode(str_replace(array('&','/',' ','+'),array('and','or','-','and'),$top_menu['Page']['menu_name'])));
			
			$newpids = $parentids;
			unset($newpids[0]);unset($newpids[1]);
		
			$lnclass="";
			$leftmenu = '';
			$lactive = false;
			$total_count = count($menus);
			foreach($menus as $key => $menu){
				if($total_count-1==$key){
					$lnclass="last";
				}
				if(isset($menu['Page']['islink']) && $menu['Page']['islink']==1)
				{
					$target = '_blank';if($menu['Page']['linktype']=='2'){$target = '';}
					if($this->here == urldecode($menu['Page']['url'])){
						$lactive = true;
						$leftmenu .= '<li class="active '.$lnclass.'"><a target="'.$target.'" href="'.$menu['Page']['url'].'">'.$menu['Page']['menu_name'].'</a></li>';
					}else
					{
						$leftmenu .= '<li class="'.$lnclass.'"><a target="'.$target.'" href="'.$menu['Page']['url'].'">'.$menu['Page']['menu_name'].'</a></li>';
					}
				}else{
					if(isset($menu['Page']['fixed']))
					{
						if($this->here == '/'.urldecode($menu['Page']['url']) || $this->here == '/'.urldecode($current_url) || in_array($menu['Page']['id'],$newpids))
						{
							$lactive = true;
							$leftmenu .= '<li class="active '.$lnclass.'"><a href="/'.$menu['Page']['url'].'">'.$menu['Page']['menu_name'].'</a>
							'.getLeftSubMenu($session,$this->here,$current_url,$parentids,&$pageclass,&$fixedmenuclass,$menu['Page']['id'],$menu['Page']['url']).'</li>';
						}else
						{
							$leftmenu .= '<li class="'.$lnclass.'"><a href="/'.$menu['Page']['url'].'">'.$menu['Page']['menu_name'].'</a></li>';
						}
					}else
					{
						if($this->here == '/'.$section_url.'/'.urldecode($menu['Page']['url']) || $this->here == '/'.urldecode($current_url) || in_array($menu['Page']['id'],$newpids))
						{
							$lactive = true;
 							//$leftmenu .= '<li class="active '.$lnclass.'"><a href="/'.$section_url.'/'.$menu['Page']['url'].'">'.$menu['Page']['menu_name'].'</a>';
							//$leftmenu .='<li class="active '.$lnclass.'">';
							$leftmenu .= getLeftSubMenu($session,$this->here,$current_url,$parentids,&$pageclass,&$fixedmenuclass,$menu['Page']['id'],$menu['Page']['url']).'</li>';
						}else
						{
//  							$leftmenu .= '<li class="'.$lnclass.'"><a href="/'.$section_url.'/'.$menu['Page']['url'].'">'.$menu['Page']['menu_name'].'</a></li>';
						}
					
					}
					
				}
			}
			//$current_page = urldecode($current_page);
			//if($current_page=='.html')
			//	$current_page = str_replace(array('&','/',' '),array('and','or','-'),substr($this->here,1,strlen($this->here)));
			//else
			//	$current_page = str_replace(array('&','/',' '),array('and','or','-'),$current_page);
			
			//$current_name = str_replace('.html','',str_replace(array('-and-','-or-','-'),array(' &amp; ',' / ',' '),$current_page));
			if($this->here!='/site-search'){
				if($lactive){
					
					//echo '<li><a href="/'.$section_url.'.html">'.$section_name.'</a></li>'.$leftmenu;
					//echo '<li><a href="/'.strtolower(urlencode($current_page)).'">'.ucwords($current_name).'</a></li>'.$leftmenu;
				}else{
					//echo '<li class="active"><a href="/'.$section_url.'.html">'.$section_name.'</a></li>'.$leftmenu;
					//echo '<li class="active"><a href="/'.strtolower(urlencode($current_page)).'">'.ucwords($current_name).'</a></li>'.$leftmenu;
				}
			}else{
				echo $leftmenu;
			}
			echo $leftmenu;
		?>
		<!--<ul id="left-nav">
				<li><a href="#">Benefits</a></li>
				<li class="active"><a href="#">Become a DCA member</a></li>
				<li><a href="#">Current DCA members</a></li>
				<li><a href="#">Create an individual member account</a></li>
			</ul>-->
	</ul>
	<?
	}
	?>
</div>
<?
if($this->name=='News' || $this->here =='/News-and-Publications.html'){
	echo $this->element('frontend/widgets/news');
	//echo $this->element('frontend/widgets/newscategory');
}
if($this->name=='Events' || $this->here=='/Events.html'){
	echo $this->element('frontend/widgets/events');
	//echo $this->element('frontend/widgets/eventscategory');
}
?>