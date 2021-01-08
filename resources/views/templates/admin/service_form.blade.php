@extends('templates.partials.default')<!-- <link href="{{asset('public/assets/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet" />   
<link rel="stylesheet" href="{{asset('public/assets/plugins/jquery-datatable/dataTables.bootstrap4.min.css')}}"> -->
 <style type="text/css">
     .border-class {
        border: 1px solid black !important;
     }
     .input_type{
        width: 100px !important;
     }
 </style>
@section('content')  

@php $name_tooltip = 'Name Should be Unique and doesnot contain spaces e.g (first_name)';
     $id_tooltip = 'ID Should be Unique and doesnot contain spaces e.g (first_name)';
     $date_tooltip = 'Date Format e.g for Default Value (2019-01-01)';
@endphp
<section class="content home">
    <div class="container-fluid">
        <div class="row clearfix">
            
        <div class="col-lg-12 col-md-12 col-sm-12">
          <div class="card widget-stat">
            <div class="card-body">
              <h4>Surveys</h4>
                        <i class="icon-plus add-new-row" style="margin-left: : 15px;cursor: pointer;" data-val='{{$form->count()}}'>Plus</i>

                        <i class="icon-minus remove-new-row" style="margin-left: : 15px;cursor: pointer;">Minus</i>                        

            </div>
            @if($form->count() > 0)
            <form method="post" action="{{route('admin.surveys.update_details')}}">
            @else
            <form method="post" action="{{route('admin.surveys.save_details')}}">                
            @endif    
                {{csrf_field()}}

        <div class="col-md-12">
            <button type="submit" class="btn btn-primary">
                Save
            </button>
        </div>                


        <div class="col-md-12">

            <label>Choose Setting Type</label>
            <select class="form-control" name="service_id" required>

                <option value="{{NULL}}">Choose</option>
                @foreach($types as $t)
                    <option <?php if($id==$t->id) echo "selected='selected'"; ?> value="{{$t->id}}">{{$t->name}}</option>
                @endforeach
                
            </select>
        </div>
        <div class="table-responsive">
                            <table class="table table-borderless table-condensed font-10" style="height: 0px;">
                    <thead>
                        <tr>
                            <th>Type</th>
                            <th>Name <span class="info_icon" data-toggle="tooltip" title="{{$name_tooltip}}!"><i class="fa fa-info-circle"></i></span></th>
                            <th>Label</th>                                                        
                            <th>ID <span class="info_icon" data-toggle="tooltip" title="{{$id_tooltip}}!"><i class="fa fa-info-circle"></i></span></th> 
                            <th>Default Value <span class="info_icon" data-toggle="tooltip" title="{{$date_tooltip}}!"><i class="fa fa-info-circle"></i></span></th>
                            <th>Placeholder</th>
                            <th>Is Required</th>
                            <th>Is Disable</th>
                            <th>Is ReadOnly</th>
                            <th>Show To User</th>
                            <th><span>Is Filter </span></th>
        @if($form->count() > 0)                            
                            <th><span class="info_icon" data-toggle="tooltip" title="This Field Can be Linked With User Data. Deleting will Results In User Linked Field Data Removal !"><i class="fa fa-info-circle"></i></span></th>
        @endif                                                                                                   
                        </tr>
                    </thead>
                 <tbody id="tbody">
         @php $i = 1; @endphp           
        @if($form->count() > 0)
            @foreach($form as $f)
                <tr>
                        <input type="hidden" name="form_id[]" value="{{$f->id}}">
                         <td>
                             <select name="type[]" data-val='{{$i}}' class="form-control border-class input_type input_type font-10 selectpicker" id="input_type" required="required" value='{{$f->type}}'>
                                @if($f->type=='text')
                                 <option value="text" selected="selected">Text</option>
                                @else
                                 <option value="text">Text</option>
                                @endif

                                @if($f->type=='checkbox')
                                 <option value="checkbox" selected="selected">Checkbox</option>
                                @else
                                 <option value="checkbox">Checkbox</option>
                                @endif

                                @if($f->type=='date')
                                 <option value="date" selected="selected">Date</option>
                                @else
                                 <option value="date">Date</option>
                                @endif

                                @if($f->type=='date')
                                 <option value="year" selected="selected">Year</option>
                                @else
                                 <option value="year">Year</option>
                                @endif                                

                                @if($f->type=='select')
                                 <option value="select" selected="selected">SelectBox</option>
                                @else
                                 <option value="select">SelectBox</option>
                                @endif

                                @if($f->type=='email')
                                 <option value="email" selected="selected">Email</option>
                                @else
                                 <option value="email">Email</option>
                                @endif


                                @if($f->type=='file')
                                  <option value="file" selected="selected">File</option>
                                @else
                                 <option value="file">File</option>
                                @endif

                                @if($f->type=='number')
                                 <option value="number" selected="selected">Number</option>
                                @else
                                 <option value="number">Number</option>
                                @endif                                

                                @if($f->type=='password')
                                 <option value="password" selected="selected">Password</option>
                                @else
                                 <option value="password">Password</option>
                                @endif                                



                                @if($f->type=='listitem')
                                 <option value="listitem" selected="selected">List Item</option>
                                @else
                                 <option value="listitem">List Item</option>
                                @endif                                



                                @if($f->type=='radio')
                                 <option value="radio" selected="selected">Radio</option>
                                @else
                                 <option value="radio">Radio</option>
                                @endif                                                                
                             </select>

                                @if($f->type=='radio')
                                   @php $radio = 'block';
                                        $select = 'none';
                                        $checkbox = 'none';
                                    $values = $f->radio_values;    
                                    $values = unserialize($values);
                                   @endphp                                 
                            @elseif($f->type=='select')
                                   @php $radio = 'none';
                                        $select = 'block';
                                        $checkbox = 'none';
                                    $values = $f->selectbox_values; 
                                    $values = unserialize($values);   

                                   @endphp          
                            @elseif($f->type=='checkbox')
                                   @php $radio = 'none';
                                        $select = 'none';
                                        $checkbox = 'block';
                                    $values = $f->checkbox_values;   
                                    $values = unserialize($values); 
                                   @endphp          
                            @else

                                 @php $radio = 'none';
                                        $select = 'none';
                                        $checkbox = 'none';
                                        $values = array();
                                   @endphp
                                   
                            @endif 
                            <div id="radio_selection{{$i}}" style="margin-top: 10px;display: {{$radio}};">
                                <label>Values </label>

                                <i style="margin-left: : 5px;cursor: pointer;" class="zmdi zmdi-plus-circle add-radio-values" data-val='{{$i}}'></i>
                                <i style="margin-left: : 15px;cursor: pointer;" class="zmdi zmdi-minus-circle remove-radio-values" data-val='{{$i}}'></i>
                               @if($f->type=='radio') 
                                @foreach($values as $val)
                                <input type="text" name="radio{{$i}}[]" class="form-control border-class input_type font-10 new-radio-value{{$i}}" required="required" value="{{$val}}" style="margin-top: 10px;">
                                 @endforeach 
                               @else
                                <input type="text" name="radio{{$i}}[]" class="form-control border-class input_type font-10">
                                <input type="text" name="radio{{$i}}[]" class="form-control border-class input_type font-10" style="margin-top: 10px;">                               
                               @endif  



                            </div> 
                          
                          <div id="select_selection{{$i}}" style="margin-top: 10px;display: {{$select}};">
                                <label>Values </label>

                                <i style="margin-left: : 5px;cursor: pointer;" class="zmdi zmdi-plus-circle add-select-values" data-val='{{$i}}'>Plus</i>
                                <i style="margin-left: : 15px;cursor: pointer;" class="zmdi zmdi-minus-circle remove-select-values" data-val='{{$i}}'>Minus</i>

                               @if($f->type=='select') 
                                @foreach($values as $val)
                                    <input type="text" style="margin-top: 5px;" name="select_option{{$i}}[]" class="form-control border-class input_type font-10 new-select-value{{$i}}" value="{{$val}}">
                                 @endforeach 
                               @else
                                    <input type="text" name="select_option{{$i}}[]" class="form-control border-class input_type font-10">                               
                               @endif    
                            </div> 

                          <div id="checkbox_selection{{$i}}" style="margin-top: 10px;display: {{$checkbox}};">
                                <label>Values </label>

                                <i style="margin-left: : 5px;cursor: pointer;" class="zmdi zmdi-plus-circle add-checkbox-values" data-val='{{$i}}'>Plus</i>
                                <i style="margin-left: : 15px;cursor: pointer;" class="zmdi zmdi-minus-circle remove-checkbox-values" data-val='{{$i}}'>Minus</i>

                               @if($f->type=='checkbox') 
                                @foreach($values as $val)
                                <input type="text" name="checkbox_option{{$i}}[]" class="form-control border-class input_type font-10 new-checkbox-value{{$i}}" value="{{$val}}" style="margin-top: 10px;">
                                 @endforeach 
                               @else
                                <input type="text" name="checkbox_option{{$i}}[]" class="form-control border-class input_type font-10">                               
                               @endif  


                            </div> 
                         </td>

                         <td>
                             <input type="text" name="name[]" value="{{$f->name}}" class="form-control border-class input_type font-10 name" required="required">
                         </td>

                          <td>
                             <input type="text" name="label[]" value="{{$f->label}}" class="form-control border-class input_type font-10 name" required="required">

                         </td>

                        <td>
                             <input type="text" name="id[]" class="form-control border-class input_type font-10 id"  value="{{$f->input_id}}">
                         </td>

                        <td>
                             <input type="text" id="date{{$i}}" name="value[]" value="{{$f->default_value}}" class="form-control border-class input_type font-10">
                         </td>  

                        <td>
                             <input type="text" name="placeholder[]" value="{{$f->placeholder}}" class="form-control border-class input_type font-10">
                         </td>                         

                        <td>
                            <select name="required[]" class="form-control border-class input_type font-10 selectpicker" required="required">
                                @if($f->is_required=='true')
                                 <option selected="selected" value="true">True</option>
                                @else
                                 <option value="true">True</option>
                                @endif


                                @if($f->is_required=='false')
                                 <option value="false" selected="selected">False</option>
                                @else
                                 <option value="false">False</option>
                                @endif                                

                             </select>
                         </td> 

                        <td>
                            <select name="disable[]" class="form-control border-class input_type font-10 selectpicker" required="required">
                                @if($f->is_disable=='true')
                                 <option selected="selected" value="true">True</option>
                                @else
                                 <option value="true">True</option>
                                @endif


                                @if($f->is_disable=='false')
                                 <option value="false" selected="selected">False</option>
                                @else
                                 <option value="false">False</option>
                                @endif                                

                              </select>
                         </td>    

                         <td>
                            <select name="readonly[]" class="form-control border-class input_type font-10 selectpicker" required="required">
                                @if($f->is_readonly=='true')
                                 <option selected="selected" value="true">True</option>
                                @else
                                 <option value="true">True</option>
                                @endif


                                @if($f->is_readonly=='false')
                                 <option value="false" selected="selected">False</option>
                                @else
                                 <option value="false">False</option>
                                @endif                                

                             </select>
                         </td>    

                         <td>
                            <select name="show_to_user[]" class="form-control border-class input_type font-10 selectpicker">

                                @if($f->show_to_user=='true')
                                 <option selected="selected" value="true">True</option>
                                @else
                                 <option value="true">True</option>
                                @endif


                                @if($f->show_to_user=='false')
                                 <option value="false" selected="selected">False</option>
                                @else
                                 <option value="false">False</option>
                                @endif                                

                             </select>
                         </td>                              

                         <td>
                            <select name="is_filter[]" class="form-control border-class input_type font-10 selectpicker">

                                @if($f->as_filter=='true')
                                 <option selected="selected" value="true">True</option>
                                @else
                                 <option value="true">True</option>
                                @endif


                                @if($f->as_filter=='false')
                                 <option value="false" selected="selected">False</option>
                                @else
                                 <option value="false">False</option>
                                @endif                                

                             </select>
                         </td>                              




            <td><a class="delete-field" style="cursor: pointer;color: red" data-id='{{$f->id}}'><i class="fa fa-trash"></a></td>                         

                </tr>
                @php $i++; @endphp
            @endforeach
        @else
                     <tr>
                         <td>
                             <select name="type[]" data-val='0' class="form-control border-class input_type font-10 input_type selectpicker" id="input_type" required="required">
                                 <option value="text">Text</option>
                                 <option value="checkbox">Checkbox</option>
                                 <option value="date">Date</option>
                                 <option value="year">Year</option>
                                 <option value="select">SelectBox</option>
                                 <option value="email">Email</option>
                                 <option value="file">File</option>
                                 <option value="listitem">List Item</option>                                                                  
                                 <option value="number">Number</option>
                                 <option value="password">Password</option>
                                 <option value="radio">Radio</option>
                                 <option value="textarea">Textarea</option>
                             </select>

                            <div id="radio_selection0" style="margin-top: 10px;display: none;">
                                <label>Values </label>

                                <i style="margin-left: : 5px;cursor: pointer;" class="zmdi zmdi-plus-circle add-radio-values" data-val='0'></i>
                                <i style="margin-left: : 15px;cursor: pointer;" class="zmdi zmdi-minus-circle remove-radio-values" data-val='0'></i>

                                <input type="text" name="radio0[]" class="form-control border-class input_type font-10">
                                <input type="text" name="radio0[]" class="form-control border-class input_type font-10" style="margin-top: 10px;">
                            </div> 
                          
                          <div id="select_selection0" style="margin-top: 10px;display: none;">
                                <label>Values </label>

                                <i style="margin-left: : 5px;cursor: pointer;" class="zmdi zmdi-plus-circle add-select-values" data-val='0'>Plus</i>
                                <i style="margin-left: : 15px;cursor: pointer;" class="zmdi zmdi-minus-circle remove-select-values" data-val='0'>Minus</i>

                                <input type="text" name="select_option0[]" class="form-control border-class input_type font-10">
                            </div> 

                          <div id="checkbox_selection0" style="margin-top: 10px;display: none;">
                                <label>Values </label>

                                <i style="margin-left: : 5px;cursor: pointer;" class="zmdi zmdi-plus-circle add-checkbox-values" data-val='0'>Plus</i>
                                <i style="margin-left: : 15px;cursor: pointer;" class="zmdi zmdi-minus-circle remove-checkbox-values" data-val='0'>Minus</i>

                                <input type="text" name="checkbox_option0[]" class="form-control border-class input_type font-10">
                            </div> 


                         </td>

                         <td>
                             <input type="text" name="name[]" class="form-control border-class input_type name font-10" required="required">
                         </td>

                          <td>

                             <input type="text" name="label[]" class="form-control border-class input_type name font-10" required="required">

                         </td>

                        <td>
                             <input type="text" name="id[]" class="form-control border-class input_type id font-10" >
                         </td>

                        <td>
                             <input type="text" name="value[]" class="form-control border-class input_type font-10">
                         </td>  

                        <td>
                             <input type="text" name="placeholder[]" class="form-control border-class input_type font-10">
                         </td>                         

                        <td>
                            <select name="required[]" class="selectpicker font-10 form-control border-class input_type" required="required">
                                 <option selected="selected" value="true">True</option>
                                 <option value="false">False</option>
                             </select>
                         </td> 

                        <td>
                            <select name="disable[]" class="selectpicker font-10 form-control border-class input_type" required="required">
                                 <option value="true">True</option>
                                 <option  selected="selected" value="false">false</option>
                             </select>
                         </td>    

                         <td>
                            <select name="readonly[]" class="selectpicker font-10 form-control border-class input_type" required="required">
                                 <option value="true">True</option>
                                 <option  selected="selected" value="false">false</option>
                             </select>
                         </td>    

                         <td>
                            <select name="show_to_user[]" class="selectpicker form-control border-class input_type font-10">
                                 <option selected="selected"  value="true">True</option>
                                 <option value="false">false</option>
                             </select>
                         </td>                              
                        
                        <td>
                            <select name="is_filter[]" class="selectpicker font-10 form-control border-class input_type">
                                 <option value="true">True</option>
                                 <option selected="selected"  value="false">false</option>
                             </select>
                         </td>    

                     </tr>

            @endif                     
                 </tbody>   
                </table>
                        </div>
                   </form>     
          </div>  
        </div>

        </div>               
    </div>
</section>


@endsection()
@section('jsOutside')
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.7.3/js/bootstrap-select.min.js"></script>

  <script src="https://cdn.ckeditor.com/4.13.0/full/ckeditor.js"  charset="utf-8"></script>
    
<script type="text/javascript">
    
     $(document).ready(function() {
    $('.selectpicker').selectpicker({
        style: 'btn-default',
        size: false
    }); 

    $('.selectpicker').selectpicker('hide');
});

</script>
<script type="text/javascript">
  $.ajaxSetup({
    headers:{
        'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
   }
  });

$('.input_type').change(function(){
    val = $(this).attr('data-val');

    if($(this).val()=='radio'){
        $('#radio_selection'+val).show();
        $('#radio_selection'+val+' input').attr('required','required');     
    }else{
        $('#radio_selection'+val).hide();
        $('#radio_selection'+val+' input').removeAttr('required');      
    }

    if($(this).val()=='select'){
        $('#select_selection'+val).show();
        $('#select_selection'+val+' input').attr('required','required');        
    }else{
        $('#select_selection'+val).hide();
        $('#select_selection'+val+' input').removeAttr('required');     
    }

    if($(this).val()=='checkbox'){
        $('#checkbox_selection'+val).show();
        $('#checkbox_selection'+val+' input').attr('required','required');      
    }else{
        $('#checkbox_selection'+val).hide();
        $('#checkbox_selection'+val+' input').removeAttr('required');       
    }

});

$('.add-radio-values').click(function() {
    val = $(this).attr('data-val'); 
    x = '<input type="text" name="radio'+val+'[]" class="form-control border-class font-10  new-radio-value'+val+'" required style="margin-top: 10px;">';
    $('#radio_selection'+val).append(x);
})

$('.remove-radio-values').click(function() {
        val = $(this).attr('data-val');     
    $(".new-radio-value"+val+":last-child").remove();
})



$('.add-select-values').click(function() {
    val = $(this).attr('data-val');     
    x = '<input type="text" name="select_option'+val+'[]" class="form-control border-class font-10  new-select-value'+val+'" required style="margin-top: 10px;">';
    $('#select_selection'+val).append(x);
})

$('.remove-select-values').click(function() {
        val = $(this).attr('data-val');     
    $(".new-select-value"+val+":last-child").remove();
})


$('.add-checkbox-values').click(function() {
    val = $(this).attr('data-val');     
    x = '<input type="text" name="checkbox_option'+val+'[]" class="form-control border-class font-10  new-checkbox-value'+val+'" required style="margin-top: 10px;">';
    $('#checkbox_selection'+val).append(x);
})

$('.remove-checkbox-values').click(function() {
        val = $(this).attr('data-val');
    $(".new-checkbox-value"+val+":last-child").remove();
})


$('.add-new-row').click(function(){
    val = $(this).attr('data-val');
      data = {'val':val,'_token':"{!! csrf_token() !!}"};

            val= Number(val);
            val++;
            $(this).attr('data-val',val);

      jQuery.ajax({
      url: "{{  route('admin.surveys.new_row') }}",
      data: data,
      type: 'POST',
      dataType : 'html',
      success: function (response) {
                $('#tbody').append(response);
      }
      });

  
});

$('.remove-new-row').click(function(){
    $(".new_row_data:last-child").remove();
    val = $('.add-new-row').attr('data-val');
    val = Number(val)-1;
    $('.add-new-row').attr('data-val',val);
});


function load_editor(th){
/*        CKEDITOR.replace(th);*/
}
</script>
<script type="text/javascript">
    function typeSel(th) {

    val = $(th).attr('data-val');

    if($(th).val()=='radio'){
        $('#radio_selection'+val).show();
        $('#radio_selection'+val+' input').attr('required','required');     
    }else{
        $('#radio_selection'+val).hide();
        $('#radio_selection'+val+' input').removeAttr('required');      
    }

    if($(th).val()=='select'){
        $('#select_selection'+val).show();
        $('#select_selection'+val+' input').attr('required','required');        
    }else{
        $('#select_selection'+val).hide();
        $('#select_selection'+val+' input').removeAttr('required');     
    }

    if($(th).val()=='checkbox'){
        $('#checkbox_selection'+val).show();
        $('#checkbox_selection'+val+' input').attr('required','required');      
    }else{
        $('#checkbox_selection'+val).hide();
        $('#checkbox_selection'+val+' input').removeAttr('required');       
    }

}

function addRowradio(th) {

    val = $(th).attr('data-val');   
    x = '<input type="text" name="radio'+val+'[]" class="form-control font-10  new-radio-value'+val+'" required style="margin-top: 10px;">';
    $('#radio_selection'+val).append(x);

}

function removeRowradio(th) {

    val = $(th).attr('data-val');   
    $(".new-radio-value"+val+":last-child").remove();

}

function addRowselect(th) {
    val = $(th).attr('data-val');       
    x = '<input type="text" name="select_option'+val+'[]" class="form-control font-10  new-select-value'+val+'" required style="margin-top: 10px;">';
    $('#select_selection'+val).append(x);

}

function removeRowselect(th) {

        val = $(th).attr('data-val');       
    $(".new-select-value"+val+":last-child").remove();
}


function addRowcheckbox(th) {
    val = $(th).attr('data-val');       
    x = '<input type="text" name="checkbox_option'+val+'[]" class="form-control font-10  new-checkbox-value'+val+'" required style="margin-top: 10px;">';
    $('#checkbox_selection'+val).append(x);

}

function removeRowcheckbox(th) {

    val = $(th).attr('data-val');       
    $(".new-checkbox-value"+val+":last-child").remove();
}

</script>

<script>
$(document).ready(function() {
    $('.label_input').click();
});
</script>
@endsection()
