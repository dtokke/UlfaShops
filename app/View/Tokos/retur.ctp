<?php  $this->Html->addCrumb('Toko', array('controller' => 'Tokos', 'action' => 'index')); ?>

<?php  $this->Html->addCrumb('Daftar Toko','/tokos/daftartoko'); ?>

<?php  $this->Html->addCrumb('Retur','#'); ?>

<div class="row">

	<div class="col-md-12">

		<h2>Retur</h2>

		<p>

		<?php

		//echo $this->Html->link('Kembali', array('action'=>'index'));

		?>

		</p>

		<?php

		echo $this->Form->create('Toko', array('action'=>'retur', 'enctype' => 'multipart/form-data'));



		echo $this->Form->input('id', array('type' => 'hidden'));

		echo $this->Form->input('kodebarang', array('label' => 'Nama Toko : '));

		echo $this->Form->input('jumlah', array('label' => 'Alamat : '));

		echo $this->Form->input('kontak', array('label' => 'Kontak : '));

							

		echo $this->Form->end('Simpan');

		?>



	</div>

</div>