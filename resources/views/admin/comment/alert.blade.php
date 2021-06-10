@if($comment->rate == App\Models\Comment::STATUS[1])
    <div class="btn btn-outline-primary" rate="alert">  &#9733; </div>
@elseif($comment->rate == App\Models\Comment::STATUS[2])
    <div class="btn btn-outline-primary" rate="alert">&#9733; &#9733;</div>
@elseif($comment->rate == App\Models\Comment::STATUS[3])
    <div class="btn btn-outline-primary" rate="alert">&#9733; &#9733; &#9733;</div>
@elseif($comment->rate == App\Models\Comment::STATUS[4])
    <div class="btn btn-outline-primary" rate="alert">&#9733; &#9733; &#9733; &#9733;</div>
@elseif($comment->rate == App\Models\Comment::STATUS[5])
    <div class="btn btn-outline-primary" rate="alert">&#9733; &#9733; &#9733; &#9733; &#9733;</div>
@endif