<?= $this->include('templates/header') ?>

<div class="d-flex justify-content-between align-items-center">
    <h2>Manage Banners</h2>
    <a href="/admin/banners/create" class="btn btn-primary">Add Banner</a>
</div>

<table class="table table-striped mt-3">
    <thead>
        <tr>
            <th>ID</th>
            <th>Image</th>
            <th>Link</th>
            <th>Alt Text</th>
            <th>Size</th>
            <th>Position</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($banners as $banner): ?>
        <tr>
            <td><?= $banner['id'] ?></td>
            <td><img src="<?= base_url('uploads/banners/' . $banner['image']); ?>" width="100"></td>
            <td><a href="<?= $banner['link'] ?>" target="_blank"><?= $banner['link'] ?></a></td>
            <td><?= $banner['alt_text'] ?></td>
            <td><?= $banner['width'] ?>x<?= $banner['height'] ?></td>
            <td><?= ucfirst($banner['position']) ?></td>
            <td>
                <a href="/admin/banners/edit/<?= $banner['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                <a href="/admin/banners/delete/<?= $banner['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?= $this->include('templates/footer') ?>
