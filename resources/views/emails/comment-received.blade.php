
<!-- izgled maila koji saljemo preko comment-submit  -->
<p>Zdravo, {{$post->user->name}}</p>



<p>Imate novi komentar na postu
           <!--Lar helper za apsolut adresu -->
<a href="{{url('posts/'.$post->id)}}">{{$post->title}}</a>
</p>