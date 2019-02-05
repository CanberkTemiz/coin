
<script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>

<div class="container">
<ul>

    <img id="logo" src="" alt="">
    @foreach($content as $data)
        <li data-id={{$data['id']}}>{{$data['name']}} - {{$data['symbol']}}</li>
    @endforeach
    </ul>
</div>

<script>

    $(document).ready(function(){
        
    });

    $('li').on('click',function(){

        var info = $(this).html();
        var id = $(this).data('id');
    
        $.ajax({
         url: "/logos",
         data: { id: id },
         type: "GET",
         success: function(data) { 
             //display logo in somewhere
             $('#logo').attr('src',data);

             
             
        }
      });

    });


    

</script>

<style>
    li{
        margin: 2.5em;
    }
</style>