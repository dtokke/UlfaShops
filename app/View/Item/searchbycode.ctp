<?php $this->Html->addCrumb('search by code', 'Item/searchbycode'); ?>
<table>	
<thead>	
	 <tr>	
	 <th	style="width:	250px;">nama</th>	
	 <th	style="width:	300px;">Sub kategori</th>	
	  <th	style="width:	200px;">kode barang</th>	
	 
	 </tr>	
	 </thead>	
<tbody>	
<?php	
	
	foreach($list	as	$data)	{?>	
	 <tr>
	 	
	 <td><?php echo $this->html->link(
	 	$data['Item']['nama'],
	 	array('controller'=>'Item',
	 		  'action'=>'detil',
	 		  $data['Item']['id'])) ?>
		<td><?php	echo	$data['Kategori']['nama'];	?></td>	
	 	<td><?php	echo	$data['Item']['kodebarang'];	?></td>	
	 	<td>
					<?php
					echo $this->HTML->link('ubah',array('controller'=>'Item','action'=>'ubah',$data['Item']['id']));
					echo $this->Form->postlink('hapus',array('controller'=>'Item','action'=>'hapus',$data['Item']['id']),array('confirm'=>'anda yakin ingin menghapus'));
					?>
		</td>
	 
	 </tr>	
<?php		
}		
unset($datas);	
?>	
</tbody>	
</table>
<div	class="paging">	
<?php	
	 echo	$this->Paginator->prev('	<<	',	array('escape'	=>	false),	
																	 null,	array('escape'	=>	false,	'class'=>'prev	disabled'))	.	
	 					$this->Paginator->numbers(array('before'	=>	false,	
																	 'after'	=>	false,	'separator'	=>	false))	.	
	 					$this->Paginator->next('	>>	',	array('escape'	=>	false),	
																	 null,	array('escape'	=>	false,	'class'	=>	'next	disabled'))		
?>	
</div>