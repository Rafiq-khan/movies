@extends('templates.partials.default')
@section('content')
<style type="text/css">
    .margin {
        padding: 3px;
    }

    .input {
        border-radius: 5px;
    }
</style>
<div class="row">
    <div class="col-md-12">



        <form method="POST" action="{{route('post.addnewtags')}}">
            @csrf



            <div class="col-md-12 margin">
                <div class="row">

                    <div class="col-lg-4 col-4">
                        <div class="form-group">
                            <label>Name</label>

                            <input type="text" name="name" value="{{old('name')}}" class="form-control input" required="required"></input>
                        </div>
                    </div>

                    <div class="col-lg-4 col-4">

                        <div class="form-group">
                            <label>Type</label>

                            <input type="text" name="type" value="{{old('type')}}" class="form-control input" required="required"></input>
                        </div>

                    </div>

                    <div class="col-lg-4 col-4">
                        <div class="form-group">
                            <label>Display Name</label>

                            <input type="text" name="display_name" value="{{old('display_name')}}" class="form-control input" required="required"></input>
                        </div>
                    </div>



                </div>


            </div>









            <input type="hidden" name="action" id="action">
            <div class="col-md-12">
                <center>
                    <input type="submit" name="submit" value="Save" onclick="checkFunc(this.value)" class="btn btn-success" style="margin-right: 80px;">


                    <a href="" class="btn btn-danger" style="margin-right: 80px;">
                        Ignore & Exit</a>
                </center>
            </div>
        </form>


    </div>
</div>
<script type="text/javascript">
    function checkFunc(x) {
        $('#action').val(x);
    }
</script>


<!-- 
<script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('exercise');
</script>
<script>
    CKEDITOR.replace('sdescription');
</script>

 -->

@endsection