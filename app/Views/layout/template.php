<!-- header -->
<?= $this->include('layout/header'); ?>
<!-- aside sidebar -->
<?= $this->include('layout/sidebar'); ?>
<!-- Navbar -->
<?= $this->include('layout/navbar'); ?>

<!-- content -->
<?= $this->renderSection('main'); ?>
<!-- modal logout -->
<?= $this->include('layout/modal/modal-logout'); ?>

<!-- Navbar -->
<?= $this->include('layout/footer'); ?>