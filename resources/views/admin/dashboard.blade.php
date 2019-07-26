
<ul>
@foreach($authors as $author)
<li>{{$author->name}} ({{$author->password}})</li>
@endforeach
</ul>
