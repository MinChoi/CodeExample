<?php $current = $this->Paginator->counter(array('format' => '%page% ')); $Next = $current + 1; $Prev = $current - 1; ?>
<?php $url = isset($url) ? array('url' => $url) : array(); ?>
<?php $numbers = $this->Paginator->numbers(array('separator' => '', 'tag'=>'li') + $url);?>
<?php if ($numbers): ?>
	<div class="row">
		<div class="large-12 column">
			<ul class="pagination">

				<!-- prev -->
				<?php if($this->Paginator->hasPrev()) : ?>
					<li><?php echo $this->Paginator->link('&laquo;', array("page" => $Prev), array('escape' => false) + $url); ?></li>
				<?php else: ?>
					<li class="arrow unavailable"><a href="#">&laquo;</a></li>
				<?php endif;?>

				<!-- numbers -->
				<?php $numbers = preg_replace('/<li class="current">(\d+)<\/li>/', '<li class="current"><a href="#">$1</a></li>', $numbers); ?>
				<?php echo $numbers; ?>

				<!-- next -->
				<?php if($this->Paginator->hasNext()) : ?>
					<li><?php echo $this->Paginator->link('&raquo;', array("page" => $Next), array('escape' => false) + $url); ?></li>
				<?php else: ?>
					<li class="arrow unavailable"><a href="#">&raquo;</a></li>
				<?php endif;?>
			</ul>
		</div>
	</div>
<?php endif; ?>
