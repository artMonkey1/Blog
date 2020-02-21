<div>
    <a href={{ route('categories.index') }}><h3>Categories</h3></a>
   @foreach($sidebarCategories as $category)
         <p><a href={{ route('categories.show', $category->id) }}> {{ $category->title }}</a> (posts:<span>{{$category->posts->count()}}</span>)</p>
   @endforeach
</div>
