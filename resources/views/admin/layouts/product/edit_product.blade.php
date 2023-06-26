@extends('admin.master')
@section('contents')
<div class="myform">
    <form action="{{ route('admin.update.product',$product->id) }}" method="post">
        @csrf
        <div class="form-group">
            <label for="m1">Model</label>
            <input type="text" name="model" value="{{ $product->model }}" class="form-control" id="m1" placeholder="Enter product model" required>
        </div>
        <div class="form-group">
            <label for="pn1">Product Name</label>
            <input type="text" name="product_name" value="{{ $product->product_name }}" class="form-control" id="pn1" placeholder="Enter product name" required>
        </div>
        <div class="form-group">
            <label for="rp1"> Regular Price</label>
            <input type="number" name="regular_price" value="{{ $product->regular_price }}" class="form-control" id="rp1" placeholder="Enter product price" required>
        </div>
        <div class="form-group">
            <label for="o1">Offer</label>
            <input type="number" name="product_offer" value="{{ $product->product_offer }}" class="form-control" id="o1" placeholder="Enter product offer(if don't enter 0)" required>
        </div>
        <div class="form-group">
            <label for="pd1">Product Description</label>
            <textarea name="product_description" class="form-control" id="pd1" rows="3" required>{{ $product->product_description }}</textarea>
        </div>
        <!-- specificaitons -->
        <h2 class="text-danger mt-3">Specifications</h2>
        <div class="form-group">
            <label for="processor">processor</label>
            <input type="text" name="processor" value="{{ $product->processor }}" class="form-control" id="processor" required>
        </div>
        <div class="form-group">
            <label for="display">display</label>
            <input type="text" name="display" value="{{ $product->display }}" class="form-control" id="display" required>
        </div>
        <div class="form-group">
            <label for="memory"> memory</label>
            <input type="text" name="memory" value="{{ $product->memory }}" class="form-control" id="memory" required>
        </div>
        <div class="form-group">
            <label for="storage">storage</label>
            <input type="text" name="storage" value="{{ $product->storage }}" class="form-control" id="storage" required>
        </div>
        <div class="form-group">
            <label for="graphics">graphics</label>
            <input type="text" name="graphics" value="{{ $product->graphics }}" class="form-control" id="graphics" required>
        </div>
        <div class="form-group">
            <label for="operating_system">operating system</label>
            <input type="text" name="operating_system" value="{{ $product->operating_system }}" class="form-control" id="operating_system" required>
        </div>
        <div class="form-group">
            <label for="battery">battery</label>
            <input type="text" name="battery" value="{{ $product->battery }}" class="form-control" id="battery" required>
        </div>
        <div class="form-group">
            <label for="adapter"> adapter</label>
            <input type="text" name="adapter" value="{{ $product->adapter }}" class="form-control" id="adapter" required>
        </div>
        <div class="form-group">
            <label for="audio">audio</label>
            <input type="text" name="audio" value="{{ $product->audio }}" class="form-control" id="audio" required>
        </div>
        <!-- Input device -->
        <h2 class="text-danger mt-3">Input device</h2>
        <div class="form-group">
            <label for="keyboard">keyboard</label>
            <input type="text" name="keyboard" value="{{ $product->keyboard }}" class="form-control" id="keyboard" required>
        </div>
        <div class="form-group">
            <label for="optical_drive"> optical drive</label>
            <input type="text" name="optical_drive" value="{{ $product->optical_drive }}" class="form-control" id="optical_drive" required>
        </div>
        <div class="form-group">
            <label for="webcam">webcam</label>
            <input type="text" name="webcam" value="{{ $product->webcam }}" class="form-control" id="webcam" required>
        </div>

        <!-- Network and wireless connectivity -->
        <h2 class="text-danger mt-3">Network and wireless connectivity</h2>
        <div class="form-group">
            <label for="wifi">wifi</label>
            <input type="text" name="wifi" value="{{ $product->wifi }}" class="form-control" id="wifi" required>
        </div>
        <div class="form-group">
            <label for="bluetooth"> bluetooth </label>
            <input type="text" name="bluetooth" value="{{ $product->bluetooth }}" class="form-control" id="bluetooth" required>
        </div>
        <!-- Port connector and slot -->
        <h2 class="text-danger mt-3">Port connector and slot</h2>
        <div class="form-group">
            <label for="USB">USB</label>
            <input type="text" name="USB" value="{{ $product->USB }}" class="form-control" id="USB" required>
        </div>
        <div class="form-group">
            <label for="HDMI"> HDMI </label>
            <input type="text" name="HDMI" value="{{ $product->HDMI }}" class="form-control" id="HDMI" required>
        </div>
        <div class="form-group">
            <label for="VGA">VGA</label>
            <input type="text" name="VGA" value="{{ $product->VGA }}" class="form-control" id="VGA" required>
        </div>
        <div class="form-group">
            <label for="audio_jack_combo"> audio jack combo </label>
            <input type="text" name="audio_jack_combo" value="{{ $product->audio_jack_combo }}" class="form-control" id="audio_jack_combo" required>
        </div>

        <!-- Physical specification -->
        <h2 class="text-danger mt-3">Physical specification</h2>
        <div class="form-group">
            <label for="dimensions">dimensions</label>
            <input type="text" name="dimensions" value="{{ $product->dimensions }}" class="form-control" id="dimensions" required>
        </div>
        <div class="form-group">
            <label for="weight"> weight </label>
            <input type="text" name="weight" value="{{ $product->weight }}" class="form-control" id="weight" required>
        </div>
        <div class="form-group">
            <label for="colors"> colors </label>
            <input type="text" name="colors" value="{{ $product->colors }}" class="form-control" id="colors" required>
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
            <input type="text" name="manufacturing_warranty" value="{{ $product->manufacturing_warranty }}" class="form-control" id="manufacturing_warranty" required>
        </div>



        <button type="submit" class="btn btn-primary">Submit Now</button>
    </form>
</div>
@endsection
