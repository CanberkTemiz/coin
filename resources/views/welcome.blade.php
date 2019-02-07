
<script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

<div class="container">
<ul>

    @foreach($content as $data)
        <li data-id={{$data['id']}} data-info={{$data['circulating_supply']}} data-rank={{$data['cmc_rank']}}>{{$data['name']}} - {{$data['symbol']}}</li>
    @endforeach
    </ul>

</div>

<script>

    $(document).ready(function(){

    });

    $('li').on('click',function(){

        var info = $(this).html();
        var id = $(this).data('id');
        var rank = $(this).data('rank');
        var extraInfo = $(this).data('info');

        $.ajax({
         url: "/logos",
         data: { id: id },
         type: "GET",
         success: function(data) {
            var website =  data['urls']['website'][0];
            var html = '<img id="logo" src=' + data['logo'] + '>';
            html += '<h3>CMC RANK:' + rank + '</h3>';
            html += '<p>Circulating Supply:' + extraInfo + '</p>';
            html += '<a href=' + website +'>Go to official website</a>'

             // trigger the alert
             Swal.fire({
                 title: info,
                 html: html,
                 confirmButtonText: 'Close',
                 allowOutsideClick: true
             })

             
             
        }
      });

    });


    

</script>

<style>
    li{      
        margin: 1.5em;
        list-style-type: none;
        margin: 1.5em;
        border-style: solid;
        border-radius: 11px;
        padding: 7px;
        width: 13%;
        text-align: center;
        color: darkmagenta;
        background-color: ghostwhite;
        font-family: Monocrom;
        font-size: 1em;
        font-weight: 700;
        cursor: pointer;
    }

    li:hover{
       background-color: white;
    }
</style>