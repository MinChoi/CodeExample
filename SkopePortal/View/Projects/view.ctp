<header>
	<div class="row">
		<div class="large-12 column clearfix">
			<?php
				if ($_USER['type'] != $USER_USER || count($_USER_CLIENTS) > 1):
					$this->Html->addCrumb('Home', '/clients/');
				endif;
				$this->Html->addCrumb($project['Client']['name'], '/clients/view/'.$project['Client']['id']);
				$this->Html->addCrumb($project['Project']['name'], '/clients/'.$project['Client']['id'].'/projects/view/'.$project['Project']['id']);
				echo $this->Html->getCrumbList(array('class' => 'breadcrumbs'));
			?>
		</div>
	</div>
	<div class="row">
		<div class="large-12 column project-head">
			<h2><?php echo $project['Project']['name']; ?></h2>
			<div>
				<a class="button button-success" href="/clients/<?php echo $project['Project']['client_id']; ?>/projects/<?php echo $project['Project']['id']; ?>/files/add/<?php echo @$file_type_id; ?>">
					<i class="upload"></i><span>Upload</span>
				</a>
				<?php if ($_USER['type'] != $USER_USER): ?>
					<a class="button button-secondary" href="/clients/<?php echo $project['Project']['client_id']; ?>/projects/edit/<?php echo $project['Project']['id']; ?>">
						<i class="edit"></i><span>Edit project</span>
					</a>
					<a class="button button-alert action-delete-project" href="javascript:void(0)" data-clientid="<?php echo $project['Project']['client_id']; ?>" data-projectid="<?php echo $project['Project']['id']; ?>">
						<i class="delete"></i><span>Delete</span>
					</a>
				<?php endif; ?>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="small-0 large-12 column">
			<div class="file-types">
				<?php foreach ($file_types as $f_k=>$f) : ?>
					<div class="file-type <?php echo (@$file_type_id == $f_k?'current':''); ?>" link="/clients/<?php echo $project['Project']['client_id']; ?>/projects/view/<?php echo $project['Project']['id']; ?>/<?php echo $f_k; ?>">
						<div>
							<?php
								if ( @$file_type_id == $f_k )
									$file = '/client_themes/'.Company::ASSETS.'/img/file_types/type'.$f_k.'_current.png';
								else
									$file = '/client_themes/'.Company::ASSETS.'/img/file_types/type'.$f_k.'.png';
							?>
							<?php echo $this->Html->image($file, array('class' => '')); ?>
							<?php echo '<h3>'.$f.'</h3>'; ?>
						</div>
					</div><div class="space">&nbsp;</div>
				<?php endforeach; ?>
			</div>
			<div class="file-count">
				<?php
					$file_counts = $this->Paginator->counter('{:count}');
					echo $file_counts=='1' ? '1 file' : $file_counts . ' files';
				?>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="small-12 large-0 column">
			<?php echo $this->Form->input('file_type_options', array(
					'options' => $file_types, 'label' => false, 'value' => @$file_type_id,
					'link' => "/clients/".$project['Project']['client_id']."/projects/view/".$project['Project']['id']."/",
					'after' => $file_counts=='1' ? '1 file' : $file_counts . ' files'
				)); ?>
		</div>
	</div>
</header>
<div class="row">

	<div class="large-12 columns">
		<?php if (count($files) > 0) : ?>
			<table class="file-list" width="100%">
				<thead>
					<tr>
						<th class="row1">File</th>
						<th class="row2">Date</th>
						<th class="row3">Updated by</th>
						<th class="row4">Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php echo $this->Form->input('file_type_id', array('type' => 'hidden', 'value' => @$this->request->params['file_type_id'])); ?>
					<?php foreach($files as $file): ?>
						<tr>
							<td>
								<div class="file-detail" file-link="/clients/<?php echo $project['Project']['client_id']; ?>/projects/<?php echo $project['Project']['id']; ?>/files/view/<?php echo $file['File']['id']; ?>">
									<?php
									// If image, display thumbnail
									if (is_image($file['File']['file_path'])) :
										$this->Thumbnail->show( $thumbnail_format + array( 'src' => '/app/webroot/'.$file['File']['file_path']), array('class' => 'file-thumbnail'));		
									else :
										echo '<i class="file-'.strtolower($file['File']['extension']).'"></i>';
									endif;
									?> 
									<span class="file-detail-name"><?php echo $file['File']['name']; ?></span>
									<span class="file-detail-file"><?php echo $file['File']['file']; ?></span>
								</div>
							</td>
							<td class="file-times">
								<?php echo relativeTime(strtotime($file['File']['created'])); ?>
							</td>
							<td><?php echo $file['CreatedBy']['firstname'].' '.$file['CreatedBy']['lastname']; ?></td>
							<td>
								<a class="button button-success button-small-download" href="/clients/<?php echo $project['Project']['client_id']; ?>/projects/<?php echo $project['Project']['id']; ?>/files/view/<?php echo $file['File']['id']; ?>" target="_blank">Download</a>&nbsp;&nbsp;
								<a class="button button-alert button-small-delete action-delete-file" href="javascript:void(0)" class="action-delete-file" data-clientid="<?php echo $project['Project']['client_id']; ?>" data-projectid="<?php echo $project['Project']['id']; ?>" data-fileid="<?php echo $file["File"]["id"]; ?>">&nbsp;</a>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>

			<?php echo $this->element('cake_pagination', array('url' => array($project['Project']['client_id'], $project['Project']['id']))); ?>
		<?php endif; ?>
	</div>
</div>
