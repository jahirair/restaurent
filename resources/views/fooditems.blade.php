<section class="section" id="menu">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="section-heading">
                    <h6>Our Menu</h6>
                    <h2>Our selection of cakes with quality taste</h2>
                    @if (\Session::has('message'))
                        <div class="alert alert-success">

                            {{ \Session::get('message') }}

                            <button type="button" class="close" data-dismiss="alert" aria-label="close"
                                style="float:right;">x</button>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="menu-item-carousel">
        <div class="col-lg-12">
            <div class="owl-menu-item owl-carousel">

                @foreach ($food_items as $food_item)
                    <div class="item">

                        <div style="background-image:url('{{ url('Public/home/assets/images/FoodImages/' . $food_item->image) }}')"
                            class='card'>
                            <div class="price">
                                <h6>${{ $food_item->price }}</h6>
                            </div>
                            <div class='info'>
                                <h1 class='title'>{{ $food_item->name }}</h1>
                                <p class='description'>{{ $food_item->description }}</p>
                                <div class="main-text-button">
                                    <div class="scroll-to-section"><a href="#reservation">Make eservation <i
                                                class="fa fa-angle-down"></i></a></div>

                                </div>
                            </div>
                        </div>
                        <div>
                            <form action="{{ route('addcart', $food_item->id) }}" method="post">
                                @csrf
                                <input type="hidden" name="name" value="{{ $food_item->name }}">
                                <input type="hidden" name="description" value="{{ $food_item->description }}">
                                <input type="hidden" name="price" value="{{ $food_item->price }}">
                                <input type="hidden" name="image" value="{{ $food_item->image }}">
                                <input type="number" name="quantity" id=""min="1"
                                    style="width: 50%;border:1px solid #FB5849;" placeholder="Quantity">
                                <input type="submit" name="" Value="Add to Cart">
                            </form>
                        </div>

                    </div>
                @endforeach


            </div>
        </div>
    </div>
</section>
