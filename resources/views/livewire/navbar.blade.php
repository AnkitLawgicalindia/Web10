@foreach ($product as $products)
<li><a href="{{route('show_product',['id'=>$products->id])}}">{{$products->title}}</a></li>
@endforeach