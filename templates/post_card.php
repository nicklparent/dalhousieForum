
<div class="container post-card bg-secondary">
    <h2 class="text-center fw-bold">Create a Post</h2>
    <form action="api/post.php" method="post" class="d-flex flex-column">
        <div class="mb-2">
            <label for="title-in" class="form-label">Title Here!</label>
            <input type="text" name="title-in" id="title-in" class="form-control">
        </div>
        <div class="mb-2">
            <label for="content-in" class="form-label">Content Here!</label>
            <textarea name="content-in" id="content-in" class="form-control" style="height: 8rem"></textarea>
        </div>
        <button type="submit" id="new-post-submit" class="btn btn-primary p-3 fw-semibold">Confirm New Post</button>
    </form>
</div>

