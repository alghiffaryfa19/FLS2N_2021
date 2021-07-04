@extends('layouts.frontend')
@section('title','Video')
@section('content')
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <h1 class="title-section">Video</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 ">
                <div class="berita">
                    <div class="col-lg-12">
                        {{ csrf_field() }}
                        <div class="row" id="post_data">
                            
                            

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('script')
<script>
    $(document).ready(function(){
        var _token = $('input[name="_token"]').val();
        load_data('', _token);
        function load_data(id="", _token)
        {
            $.ajax({
                url:"{{ route('loadmore.load_video') }}",
                method:"POST",
                data:{id:id, _token:_token},
                success:function(data)
                {
                    $('#load_more_button').remove();
                    $('#post_data').append(data);
                }
            })
        }
        
        $(document).on('click', '#load_more_button', function(){
            var id = $(this).data('id');
            $('#load_more_button').html('<b>Loading...</b>');
            load_data(id, _token);
        });
    });
</script>
@endsection