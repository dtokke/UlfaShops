<?php  $this->Html->addCrumb('Toko', array('controller' => 'Tokos', 'action' => 'index')); ?>
<?php  $this->Html->addCrumb('Daftar Retur','/returs'); ?>
<?php  $this->Html->addCrumb('Edit Retur','#'); ?>
<div class="row">
	<div class="col-md-12">
		<h2>Edit Retur</h2>
		<p>
		<?php
		//echo $this->Html->link('Kembali', array('action'=>'index'));
		?>
		</p>
		<?php
		echo $this->Form->create('Retur', array('action'=>'edit', 'enctype' => 'multipart/form-data'));

		echo $this->Form->input('id', array('type' => 'hidden'));
		echo $this->Form->input('notajual_id', array('label' => 'No Notajual : ','type'=>'text'));
		echo $this->Form->input('kodebarang', array('label' => 'Kode Barang : '));
		echo $this->Form->input('jumlah', array('label' => 'Jumlah : '));
							
		echo $this->Form->end('Simpan');
		?>
	</div>
</div>