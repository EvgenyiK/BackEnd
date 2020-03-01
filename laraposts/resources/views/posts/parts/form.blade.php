

<div class="form-group">
    <input type="text"class="form-control" name="title" required value="{{old('title') ?? $post->title ?? ''}}">
</div>
<div class="form-group">
    <textarea name="discr"  rows="10" class="form-control" required>{{old('discr') ?? $post->discr ?? ''}}</textarea>
</div>
<div class="form-group">
    <input type="file"name="img">
</div>
