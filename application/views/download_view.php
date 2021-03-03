<div class="container pt-4">
    <h1 class="mb-4"><a href="<?php echo URL . '/download'; ?>">Галерея</a></h1>

    <?php foreach ($errors as $error): ?>
        <div class="alert alert-danger"><?php echo $error; ?></div>
    <?php endforeach; ?>

    <h2>Файлы: </h2>

    <!-- Вывод галереи -->
    <div class="mb-4">
        <?php if (!empty($files)): ?>
            <div class="row">
                <?php foreach ($files as $file): ?>

                    <div class="col-12 col-sm-3 mb-4">
                        <form method="post">
                            <input type="hidden" name="name" value="<?php echo $file; ?>">
                            <button type="submit" class="close" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </form>
                        <a href="<?php echo URL . '/file.php?name=' . $file; ?>" title="Полное изображение">
                            <img src="<?php echo URL . '/' . UPLOAD_DIR . '/' . $file ?>" class="img-thumbnail"
                                 alt="<?php echo $file; ?>">
                        </a>
                    </div>
 
                <?php endforeach; ?>
            </div><!-- /.row -->
        <?php else: ?>
            <div class="alert alert-secondary">Галерея пуста</div>
        <?php endif; ?>
    </div>

    <!-- Загрузка -->
    <?php if ($_SESSION['auth'] == true): ?>
        <form method="post" enctype="multipart/form-data">
            <div class="custom-file">
                <input type="file" class="custom-file-input" name="files[]" id="customFile" multiple required>
                <label class="custom-file-label" for="customFile" data-browse="Загрузить">Загрузите файлы </label>
                <small class="form-text text-muted">
                    Максимальный размер файла: <?php echo UPLOAD_MAX_SIZE / 1000000; ?>Мб.
                    Допустимые разрешения файлов: <?php echo implode(', ', ALLOWED_TYPES) ?>.
                </small>
            </div>
            <hr>
            <button type="submit" class="btn btn-primary" style="margin-bottom: 20px">Загрузить</button>
        </form>
    <?php endif ?>
</div>