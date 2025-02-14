<?= $this->include('templates/header') ?>

<h2>Edit Banner</h2>
<form action="/admin/banners/update/<?= $banner['id'] ?>" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label class="form-label">Current Image</label>
        <br>
        <img src="<?= base_url('uploads/banners/' . $banner['image']) ?>" width="150">
    </div>
    <div class="mb-3">
        <label class="form-label">New Banner Image</label>
        <input type="file" name="image" class="form-control" accept="image/*">
    </div>
    <div class="mb-3">
        <label class="form-label">Target Link</label>
        <input type="text" name="link" class="form-control" value="<?= $banner['link'] ?>" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Alt Text</label>
        <input type="text" name="alt_text" class="form-control" value="<?= $banner['alt_text'] ?>">
    </div>
    <div class="mb-3">
        <label class="form-label">Width</label>
        <input type="number" name="width" class="form-control" value="<?= $banner['width'] ?>" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Height</label>
        <input type="number" name="height" class="form-control" value="<?= $banner['height'] ?>" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Position</label>
        <select name="position" class="form-select">
            <option value="top" <?= $banner['position'] == 'top' ? 'selected' : '' ?>>Top</option>
            <option value="bottom" <?= $banner['position'] == 'bottom' ? 'selected' : '' ?>>Bottom</option>
            <option value="left" <?= $banner['position'] == 'left' ? 'selected' : '' ?>>Left</option>
            <option value="right" <?= $banner['position'] == 'right' ? 'selected' : '' ?>>Right</option>
        </select>
    </div>
    <button type="submit" class="btn btn-success">Update Banner</button>
</form>

<?= $this->include('templates/footer') ?>
