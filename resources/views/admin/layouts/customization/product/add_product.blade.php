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

        <form action="{{ route('admin.store.customize.product') }}" method="POST" enctype="multipart/form-data"
            class="text-capitalize">
            @csrf
            <div class="form-group">
                <label for="sc1">Category</label>
                <select class="form-control" id="sc1" name="customization_category_id">
                    @foreach ($products as $product)
                        <option value="{{ $product->id }}">{{ $product->customize_category_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="m1">Model</label>
                <input type="text" name="model" class="form-control" id="m1" required>
            </div>
            <div class="form-group">
                <label for="pn1">Product Name</label>
                <input type="text" name="name" class="form-control" id="pn1" required>
            </div>
            <div class="form-group">
                <label for="rp1"> Regular Price</label>
                <input type="number" name="price" class="form-control" id="rp1" required>
            </div>
            <div class="form-group">
                <label for="img1">Image</label>
                <input type="file" accept="image/*" name="image" class="form-control" id="img1" required>
            </div>
            <div class="form-group">
                <label for="pd1">Product Description</label>
                <textarea name="description" class="form-control" id="pd1" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <label for="clock_speed"> clock_speed</label>
                <input type="number" name="clock_speed" class="form-control" id="clock_speed" required>
            </div>
            <div class="form-group">
                <label for="cache">cache</label>
                <input type="text" name="cache" class="form-control" id="cache" required>
            </div>
            <div class="form-group">
                <label for="cores"> cores</label>
                <input type="text" name="cores" class="form-control" id="cores" required>
            </div>
            <div class="form-group">
                <label for="socket">socket</label>
                <input type="text" name="socket" class="form-control" id="socket" required>
            </div>

            <!-- specifications -->
            <h2 class="text-danger mt-3">Specifications</h2>
             <div class="form-group">
                <label for="base_frequency"> base_frequency</label>
                <input type="number" name="base_frequency" class="form-control" id="base_frequency" required>
            </div>
            <div class="form-group">
                <label for="threads">threads</label>
                <input type="number" name="threads" class="form-control" id="threads" required>
            </div>
            <div class="form-group">
                <label for="default_TDP"> default_TDP</label>
                <input type="number" name="default_TDP" class="form-control" id="default_TDP" required>
            </div>

            <!-- Memory Specification-->
            <h2 class="text-danger mt-3">Memory Specification</h2>
            <div class="form-group">
                <label for="maximum_size"> maximum_size</label>
                <input type="number" name="maximum_size" class="form-control" id="maximum_size" required>
            </div>
            <div class="form-group">
                <label for="maximum_speed">maximum_speed</label>
                <input type="number" name="maximum_speed" class="form-control" id="maximum_speed" required>
            </div>
            <div class="form-group">
                <label for="type"> type</label>
                <input type="string" name="type" class="form-control" id="type" required>
            </div>
            
            <div class="form-group">
                <label for="maximum_number_channels">maximum_number_channels</label>
                <input type="number" name="maximum_number_channels" class="form-control" id="maximum_number_channels" required>
            </div>

            <!-- Graphics specifications -->
            <h2 class="text-danger mt-3">Graphics specifications</h2>
            <div class="form-group">
                <label for="processor_graphics">processor_graphics</label>
                <input type="text" name="processor_graphics" class="form-control" id="processor_graphics" required>
            </div>
            <div class="form-group">
                <label for="maximum_dynamic_frequency"> maximum_dynamic_frequency </label>
                <input type="number" name="maximum_dynamic_frequency" class="form-control" id="maximum_dynamic_frequency" required>
            </div>
            <!-- warranty -->
            <h2 class="text-danger mt-3">warranty</h2>
            <div class="form-group">
                <label for="warranty">warranty</label>
                <input type="text" name="warranty" class="form-control" id="warranty" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit Now</button>
        </form>
    </div>
@endsection
