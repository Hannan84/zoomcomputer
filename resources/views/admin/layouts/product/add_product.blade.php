@extends('admin.master')
@section('contents')
<div class="myform">
    <!-- Validation Error Message -->
    <div class="message">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>

    <form action="{{ route('admin.store.product') }}" method="POST" enctype="multipart/form-data" class="text-capitalize">
        @csrf
        <div class="form-group">
            <label for="sc1">Category</label>
            <select class="form-control" id="sc1" name="category_id">
                @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="m1">Model</label>
            <input type="text" name="model" class="form-control" id="m1" required>
        </div>
        <div class="form-group">
            <label for="pn1">Product Name</label>
            <input type="text" name="product_name" class="form-control" id="pn1" required>
        </div>
        <div class="form-group">
            <label for="rp1"> Regular Price</label>
            <input type="number" name="regular_price" class="form-control" id="rp1" required>
        </div>
        <div class="form-group">
            <label for="img1">Image</label>
            <input type="file" accept="image/*" name="product_image" class="form-control" id="img1" required>
        </div>
        <div class="form-group">
            <label for="o1">Offer</label>
            <input type="number" name="product_offer" class="form-control" id="o1" required>
        </div>
        <div class="form-group">
            <label for="pd1">Product Description</label>
            <textarea name="product_description" class="form-control" id="pd1" rows="3" required></textarea>
        </div>

        <!-- specifications -->
        <h2 class="text-danger mt-3">Specifications</h2>
        <div class="form-group">
            <label for="processor">processor</label>
            <input type="text" name="processor" class="form-control" id="processor" required>
        </div>
        <div class="form-group">
            <label for="display">display</label>
            <input type="text" name="display" class="form-control" id="display" required>
        </div>
        <div class="form-group">
            <label for="memory"> memory</label>
            <input type="text" name="memory" class="form-control" id="memory" required>
        </div>
        <div class="form-group">
            <label for="storage">storage</label>
            <input type="text" name="storage" class="form-control" id="storage" required>
        </div>
        <div class="form-group">
            <label for="graphics">graphics</label>
            <input type="text" name="graphics" class="form-control" id="graphics" required>
        </div>
        <div class="form-group">
            <label for="operating_system">operating system</label>
            <input type="text" name="operating_system" class="form-control" id="operating_system" required>
        </div>
        <div class="form-group">
            <label for="battery">battery</label>
            <input type="text" name="battery" class="form-control" id="battery" required>
        </div>
        <div class="form-group">
            <label for="adapter"> adapter</label>
            <input type="text" name="adapter" class="form-control" id="adapter" required>
        </div>
        <div class="form-group">
            <label for="audio">audio</label>
            <input type="text" name="audio" class="form-control" id="audio" required>
        </div>
        <!-- Input device -->
        <h2 class="text-danger mt-3">Input device</h2>
        <div class="form-group">
            <label for="keyboard">keyboard</label>
            <input type="text" name="keyboard" class="form-control" id="keyboard" required>
        </div>
        <div class="form-group">
            <label for="optical_drive"> optical drive</label>
            <input type="text" name="optical_drive" class="form-control" id="optical_drive" required>
        </div>
        <div class="form-group">
            <label for="webcam">webcam</label>
            <input type="text" name="webcam" class="form-control" id="webcam" required>
        </div>

        <!-- Network and wireless connectivity -->
        <h2 class="text-danger mt-3">Network and wireless connectivity</h2>
        <div class="form-group">
            <label for="wifi">wifi</label>
            <input type="text" name="wifi" class="form-control" id="wifi" required>
        </div>
        <div class="form-group">
            <label for="bluetooth"> bluetooth </label>
            <input type="text" name="bluetooth" class="form-control" id="bluetooth" required>
        </div>
        <!-- Port connector and slot -->
        <h2 class="text-danger mt-3">Port connector and slot</h2>
        <div class="form-group">
            <label for="USB">USB</label>
            <input type="text" name="USB" class="form-control" id="USB" required>
        </div>
        <div class="form-group">
            <label for="HDMI"> HDMI </label>
            <input type="text" name="HDMI" class="form-control" id="HDMI" required>
        </div>
        <div class="form-group">
            <label for="VGA">VGA</label>
            <input type="text" name="VGA" class="form-control" id="VGA" required>
        </div>
        <div class="form-group">
            <label for="audio_jack_combo"> audio jack combo </label>
            <input type="text" name="audio_jack_combo" class="form-control" id="audio_jack_combo" required>
        </div>

        <!-- Physical specification -->
        <h2 class="text-danger mt-3">Physical specification</h2>
        <div class="form-group">
            <label for="dimensions">dimensions</label>
            <input type="text" name="dimensions" class="form-control" id="dimensions" required>
        </div>
        <div class="form-group">
            <label for="weight"> weight </label>
            <input type="text" name="weight" class="form-control" id="weight" required>
        </div>
        <div class="form-group">
            <label for="colors"> colors </label>
            <input type="text" name="colors" class="form-control" id="colors" required>
        </div>
        <!-- video link -->
        <h2 class="text-danger mt-3">Video Link</h2>
        <div class="form-group">
            <label for="video_link">Youtube link</label>
            <input type="text" name="video_link" class="form-control" id="video_link">
        </div>
        <!-- warranty -->
        <h2 class="text-danger mt-3">warranty</h2>
        <div class="form-group">
            <label for="manufacturing_warranty">manufacturing warranty</label>
            <input type="text" name="manufacturing_warranty" class="form-control" id="manufacturing_warranty" required>
        </div>

        <button type="submit" class="btn btn-primary">Submit Now</button>
    </form>
</div>
@endsection
