<h1><?= esc($page['title']) ?></h1>
<div class="content">
    <?= $page['content'] ?>

    <?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success">
        <?= esc(session()->getFlashdata('success')) ?>
    </div>
    <?php endif; ?>

    <form method="post" action="<?= base_url('contact') ?>">
        <?= csrf_field() ?>

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text"
                class="form-control <?= isset($validation) && $validation->hasError('name') ? 'is-invalid' : '' ?>"
                id="name" name="name" value="<?= old('name', '', true) ?>">
            <?php if (isset($validation) && $validation->hasError('name')): ?>
            <div class="invalid-feedback">
                <?= esc($validation->getError('name')) ?>
            </div>
            <?php endif; ?>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email"
                class="form-control <?= isset($validation) && $validation->hasError('email') ? 'is-invalid' : '' ?>"
                id="email" name="email" value="<?= old('email', '', true) ?>">
            <?php if (isset($validation) && $validation->hasError('email')): ?>
            <div class="invalid-feedback">
                <?= esc($validation->getError('email')) ?>
            </div>
            <?php endif; ?>
        </div>

        <div class="mb-3">
            <label for="message" class="form-label">Message</label>
            <textarea
                class="form-control <?= isset($validation) && $validation->hasError('message') ? 'is-invalid' : '' ?>"
                id="message" name="message" rows="5"><?= old('message', '', true) ?></textarea>
            <?php if (isset($validation) && $validation->hasError('message')): ?>
            <div class="invalid-feedback">
                <?= esc($validation->getError('message')) ?>
            </div>
            <?php endif; ?>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>