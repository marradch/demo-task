<h1>Task Management</h1>
<hr>
<p>
<a href="/task/create" class="btn btn-lg btn-success">Create new</a>
<p>

<table class="table table-hover">
<thead>
<tr>
<th>id</th>
<th>
<?php 
$orderTypeParam = 'asc';
if($order == 'name' && $orderType == 'asc'){
	$orderTypeParam = 'desc';
}
?>
<a href="/task/index/order/name/order-type/<?=$orderTypeParam?>">name<span class="glyphicon <?php echo ($orderTypeParam=='desc')?'glyphicon-chevron-up':'glyphicon-chevron-down'?>"></span></a>
</th>
<th>
<?php 
$orderTypeParam = 'asc';
if($order == 'email' && $orderType == 'asc'){
	$orderTypeParam = 'desc';
}
?>
<a href="/task/index/order/email/order-type/<?=$orderTypeParam?>">email<span class="glyphicon <?php echo ($orderTypeParam=='desc')?'glyphicon-chevron-up':'glyphicon-chevron-down'?>"></span></a>
</th>
<th>content</th>
<th>
<?php 
$orderTypeParam = 'asc';
if($order == 'status' && $orderType == 'asc'){
	$orderTypeParam = 'desc';
}
?>
<a href="/task/index/order/status/order-type/<?=$orderTypeParam?>">status<span class="glyphicon <?php echo ($orderTypeParam=='desc')?'glyphicon-chevron-up':'glyphicon-chevron-down'?>"></span></a>
</th>
<?php if(!empty($_SESSION['user'])):?>
<th></th>
<?php endif;?>
</tr>
</thead>
<tbody>
<?php foreach($tasks as $task):?>
 <tr>
 <td><?=$task['id'];?></td>
 <td><?=$task['name'];?></td>
 <td><?=$task['email'];?></td>
 <td><?=$task['content'];?></td>
 <td>
 <?php if(!empty($task['status'])): ?>
 <span class="glyphicon glyphicon-ok"></span>
 <?php endif;?>
 </td>
 <?php if(!empty($_SESSION['user'])):?>
<td>
<a href="/task/edit/id/<?=$task['id'];?>"><span class="glyphicon glyphicon-edit"></span></a>
</td>
<?php endif;?>
 </tr>
<?php endforeach; ?> 
</tbody>
</table>
<ul class="pagination">
	<?php foreach($pagination as $page_item):?>
		<li <?php echo (empty($page_item['url'])?'class="active"':'')?>><a href="<?php echo empty($page_item['url'])?'#':$page_item['url']; ?>"><?php echo $page_item['presentation'];?></a></li>
	<?php endforeach; ?>
</ul>