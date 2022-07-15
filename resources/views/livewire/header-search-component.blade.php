<form action="{{ route('produit.search') }}" class="">
    <div class="input-group">
        <input type="search" name="search" class="form-control" value="{{ $search }}" style="width:55%"
            placeholder="Search">
        <input type="hidden" name="product_cat" id="product_cat" value="{{ $product_cat }}">
        <input type="hidden" name="product_cat_id" id="product_cat_id" value="{{ $product_cat_id }}">
        <select class="form-select search-category" onchange="changeCategory()">
            <option value="" class="truncate">Catégories</option>
            @foreach ($categories as $category)
                <option class="truncate" value="" data-id="{{ $category->id }}"
                    @if ($category->id == $product_cat_id) selected @endif>{{ $category->name }}</option>
            @endforeach
        </select>
        <button class="btn btn-primary" type="submit">
            <i class="fa fa-search"></i>
        </button>
    </div> <!-- input-group end.// -->
</form>
