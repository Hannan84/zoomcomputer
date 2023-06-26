@extends('website.master')
@section('contents')
    <div class="compare_product_table m-auto text-center">
        <table class="table table-bordered table-hover">
            <thead class="">
                <tr>
                    <th> Product Comparison </th>
                    <th>Product-1</th>
                    <th>Product-2</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($search_c1 as $product1)
                    @foreach ($search_c2 as $product2)
                        <tr>
                            <td>Image</td>

                            <td><img src="{{ asset('/uploads/products/' . $product1->product_image) }}"
                                    style="width:90px;height:90px;" srcset=""></td>
                            <td><img src="{{ asset('/uploads/products/' . $product2->product_image) }}"
                                    style="width:90px;height:90px;" alt="" srcset=""></td>
                        </tr>
                        <tr>
                            <td>Name</td>
                            <td>{{ $product1->product_name }}</td>
                            <td>{{ $product2->product_name }}</td>
                        </tr>
                        <!-- Basic Informations -->
                        <tr>
                            <td class="text-danger">
                                <h3>Basic Informations</h3>
                            </td>
                        </tr>
                        <tr>
                            <td>Processor</td>
                            <td>{{ $product1->processor }}</td>
                            <td>{{ $product2->processor }}</td>
                        </tr>
                        <tr>
                            <td>Display</td>
                            <td>{{ $product1->display }}</td>
                            <td>{{ $product2->display }}</td>

                        </tr>
                        <tr>
                            <td>Memory</td>
                            <td>{{ $product1->memory }}</td>
                            <td>{{ $product2->memory }}</td>
                        </tr>
                        <tr>
                            <td>Storage</td>
                            <td>{{ $product1->storage }}</td>
                            <td>{{ $product2->storage }}</td>
                        </tr>
                        <tr>
                            <td>Graphics</td>
                            <td>{{ $product1->graphics }}</td>
                            <td>{{ $product2->graphics }}</td>
                        </tr>
                        <tr>
                            <td>Operating System</td>
                            <td>{{ $product1->operating_system }}</td>
                            <td>{{ $product2->operating_system }}</td>
                        </tr>
                        <tr>
                            <td>Battery</td>
                            <td>{{ $product1->battery }}</td>
                            <td>{{ $product2->battery }}</td>
                        </tr>
                        <tr>
                            <td>Adapter</td>
                            <td>{{ $product1->adapter }}</td>
                            <td>{{ $product2->adapter }}</td>
                        </tr>
                        <tr>
                            <td>Audio</td>
                            <td>{{ $product1->audio }}</td>
                            <td>{{ $product2->audio }}</td>
                        </tr>
                        <!-- input device -->
                        <tr>
                            <td class="text-danger">
                                <h3>input device</h3>
                            </td>
                        </tr>
                        <tr>
                            <td>Keyboard</td>
                            <td>{{ $product1->keyboard }}</td>
                            <td>{{ $product2->keyboard }}</td>
                        </tr>
                        <tr>
                            <td>Optical drive</td>
                            <td>{{ $product1->optical_drive }}</td>
                            <td>{{ $product2->optical_drive }}</td>
                        </tr>
                        <tr>
                            <td>WebCam</td>
                            <td>{{ $product1->webcam }}</td>
                            <td>{{ $product2->webcam }}</td>
                        </tr>
                        <!-- Network & Wireless Connectivity -->
                        <tr>
                            <td class="text-danger">
                                <h3>Network & Wireless Connectivity</h3>
                            </td>
                        </tr>
                        <tr>
                            <td>Wi-fi</td>
                            <td>{{ $product1->wifi }}</td>
                            <td>{{ $product2->wifi }}</td>
                        </tr>
                        <tr>
                            <td>Bluetooth</td>
                            <td>{{ $product1->bluetooth }}</td>
                            <td>{{ $product2->bluetooth }}</td>
                        </tr>
                        <!-- Ports, Connectors & Slots -->
                        <tr>
                            <td class="text-danger">
                                <h3>Ports, Connectors & Slots</h3>
                            </td>
                        </tr>
                        <tr>
                            <td>USB</td>
                            <td>{{ $product1->USB }}</td>
                            <td>{{ $product2->USB }}</td>
                        </tr>
                        <tr>
                            <td>HDMI</td>
                            <td>{{ $product1->HDMI }}</td>
                            <td>{{ $product2->HDMI }}</td>
                        </tr>
                        <tr>
                            <td>VGA</td>
                            <td>{{ $product1->VGA }}</td>
                            <td>{{ $product2->VGA }}</td>
                        </tr>
                        <tr>
                            <td>Audio Jack Combo</td>
                            <td>{{ $product1->audio_jack_combo }}</td>
                            <td>{{ $product2->audio_jack_combo }}</td>
                        </tr>
                        <!-- Physical Specification -->
                        <tr>
                            <td class="text-danger">
                                <h3>Physical Specification </h3>
                            </td>
                        </tr>
                        <tr>
                            <td>Dimensions (W x D x H)</td>
                            <td>{{ $product1->dimensions }}</td>
                            <td>{{ $product2->dimensions }}</td>
                        </tr>
                        <tr>
                            <td>weights</td>
                            <td>{{ $product1->weight }}</td>
                            <td>{{ $product2->weight }}</td>
                        </tr>
                        <tr>
                            <td>color</td>
                            <td>{{ $product1->colors }}</td>
                            <td>{{ $product2->colors }}</td>
                        </tr>
                        <!--  Warranty -->
                        <tr>
                            <td class="text-danger">
                                <h3>Warranty </h3>
                            </td>
                        </tr>
                        <tr>
                            <td>Manufacturing Warranty</td>
                            <td>{{ $product1->manufacturing_warranty }}</td>
                            <td>{{ $product2->manufacturing_warranty }}</td>
                        </tr>
                    @endforeach
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
