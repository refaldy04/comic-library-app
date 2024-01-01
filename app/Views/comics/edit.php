<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <h2 class="my-3"><?= $title; ?></h2>
            
            <form action="/comics/update/<?= $comic['id']; ?>" method="post">
                <?= csrf_field(); ?>
                <input type="hidden" name="slug" value="<?= $comic['slug']; ?>">
                <div class="row mb-3">
                    <label for="title" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control <?= (session('validation') && session('validation')->hasError('title')) ? 'is-invalid' : ''; ?>" value="<?= (old('title')) ? old('title') : esc($comic['title']) ?>" id="title" name="title" autofocus>
                    <div id="title" class="invalid-feedback">
                        <?= session('validation') ?session('validation')->getError('title') : '' ?>
                    </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="author" class="col-sm-2 col-form-label">Author</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control  <?= (session('validation') && session('validation')->hasError('author')) ? 'is-invalid' : ''; ?>" value="<?= (old('author')) ? old('author') : esc($comic['author']) ?>" id="author" name="author">
                    <div id="author" class="invalid-feedback">
                        <?= session('validation') ?session('validation')->getError('author') : '' ?>
                    </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="publisher" class="col-sm-2 col-form-label">Publisher</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control <?= (session('validation') && session('validation')->hasError('publisher')) ? 'is-invalid' : ''; ?>" value="<?= (old('publisher')) ? old('publisher') : esc($comic['publisher']) ?>" id="publisher" name="publisher">
                    <div id="publisher" class="invalid-feedback">
                        <?= session('validation') ?session('validation')->getError('publisher') : '' ?>
                    </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="cover" class="col-sm-2 col-form-label">Cover</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?= (old('cover')) ? old('cover') : esc($comic['cover']) ?>" id="cover" name="cover">
                    </div>
                </div>
                
                <button type="submit" class="btn btn-primary">Edit</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>