<?= $this->include('templates/header') ?>

<h2>Add Banner</h2>
<form action="/admin/banners/store" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label class="form-label">Banner Image</label>
        <input type="file" name="image" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Target Link</label>
        <input type="text" name="link" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Alt Text</label>
        <input type="text" name="alt_text" class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">Width</label>
        <input type="number" name="width" class="form-control" value="300" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Height</label>
        <input type="number" name="height" class="form-control" value="250" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Position</label>
        <select name="position" class="form-select">
            <option value="top">Top</option>
            <option value="bottom">Bottom</option>
            <option value="left">Left</option>
            <option value="right">Right</option>
        </select>
    </div>
    <button type="submit" class="btn btn-success">Save Banner</button>
</form>

<?= $this->include('templates/footer') ?>
