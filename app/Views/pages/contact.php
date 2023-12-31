<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col">
                <h2>Contact Us</h2>
                <?php foreach($alamat as $value) : ?>
                    <ul>
                        <li><?= $value['tipe']; ?></li>
                        <li><?= $value['alamat']; ?></li>
                        <li><?= $value['kota']; ?></li>
                    </ul>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
<?= $this->endSection(); ?>