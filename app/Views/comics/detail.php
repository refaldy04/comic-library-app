<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col">
            <h2 class="my-3"><?= $title; ?></h2>
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="/img/<?= $comic['cover']; ?>" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $comic['title']; ?></h5>
                            <p class="card-text"><b>Author : </b><?= $comic['author']; ?></p>
                            <p class="card-text"><small class="text-body-secondary"><b>Publisher : </b><?= $comic['publisher']; ?></small></p>

                            <a href="/comics/edit/<?= $comic['slug']; ?>" class="btn btn-warning">Edit</a>

                            <form action="/comics/<?= $comic['id']; ?>" method="post" class="d-inline">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger" name="delete" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>

                            <br><br>
                            <a href="/comics" class="">Back to comic list</a>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
<?= $this->endSection(); ?>