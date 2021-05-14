<img src="{{ asset('images/thumbnail_1617281260.jpg') }}" alt="">


<form method="post" action="/signup" enctype="multipart/form-data" >
  @csrf
  
   <input type="text" name="first_name" />
  <input type="file" name="thumbnail">
   <input type="submit" />

</form>
