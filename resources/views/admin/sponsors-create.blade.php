@extends('layouts.admin')
@section('content')
<?php
$disabled='';
   if($action == 'edit'){
    $title = 'Edit Sponsor';
    $readonly="";
}else if($action == 'add') {
    $title = 'Add Sponsor';
    $readonly="";
}else if($action == 'view') {
    $title = 'View Sponsor';
    $readonly='readonly';
    $disabled="disabled";
}else{
    $title = 'Copy Sponsor';
    $readonly="";
}
$path = route('admin.sponsors.index');
?>
<style>

.main_cat .select2-container--default .select2-selection--single {
    background-color: #fff; 
    border: 0px solid #aaa;
     border-radius: 0px;
     width : 100%;
     padding:5px;
}
.main_cat .select2-container--default .select2-selection--single .select2-selection__rendered {
    background: #fff;
    padding: 5px;
    height: 40px;
    border: 1px solid #ccc;
}
</style>
        <div class="card table-card ">
        <div class="col-lg-12">
    <div class="card customers-profile">
                        <h3><?php echo $title;?></h3>
                   
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                    </ul>
                                </div>
                                @endif
                            </div>
                        </div>
                        <?php
                                if($action == 'edit'){?>
                                   <form class="form-horizontal" role="form" action="{{url( config('app.admin_url') .'/sponsors/'.$id)}}" method="post" enctype="multipart/form-data">
                                    {{ method_field('PUT') }}
                                <?php }else {?>
                                    <form class="form-horizontal" role="form" action="{{url( config('app.admin_url') .'/sponsors')}}" method="post" enctype="multipart/form-data">
                                <?php }?>
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12">
                                            
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Heading <span class="requried">*</span></label>
                                                <div class="col-sm-10">
                                                    <?php
                                                    if( old('heading')!='' ){
                                                        $heading = old('heading');
                                                    }
                                                    else if( isset($sponsor->heading) && $sponsor->heading != ''){
                                                        $heading = $sponsor->heading;
                                                    }else{
                                                        $heading = '';
                                                    }
                                                    ?>
                                                    <input type="text" class="form-control" name="heading" value="<?php echo $heading;?>" {{$readonly}}>
                                                </div>
                                            </div> 
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Title <span class="requried">*</span></label>
                                                <div class="col-sm-10">
                                                    <?php
                                                    if( old('title')!='' ){
                                                        $heading = old('title');
                                                    }
                                                    else if( isset($sponsor->title) && $sponsor->title != ''){
                                                        $title = $sponsor->title;
                                                    }else{
                                                        $title = '';
                                                    }
                                                    ?>
                                                    <input type="text" class="form-control" name="title" value="<?php echo $title;?>" {{$readonly}}>
                                                </div>
                                            </div> 
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Url <span class="requried">*</span></label>
                                                <div class="col-sm-10">
                                                    <?php
                                                    if( old('url')!='' ){
                                                        $url = old('url');
                                                    }
                                                    else if( isset($sponsor->url) && $sponsor->url != ''){
                                                        $url = $sponsor->url;
                                                    }else{
                                                        $url = '';
                                                    }
                                                    ?>
                                                    <input type="text" class="form-control" name="url" value="<?php echo $url;?>" {{$readonly}}>
                                                </div>
                                            </div> 
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Image <span class="requried">*</span></label>
                                                <div class="col-sm-10">
                                                    <?php
                                                    if( old('image')!='' ){
                                                        $image = old('image');
                                                    }
                                                    else if( isset($sponsor->image) && $sponsor->image != ''){
                                                        $image = $sponsor->image;
                                            
                                                    }else{
                                                        $image = '';
                                                      
                                                    }
                                                   
                                                    ?>
                                                    <input type="file" class="form-control" name="image" value="<?php echo $image;?>" {{$readonly}}>
                                                    <input type="hidden" name="old_image" value="<?php echo $image; ?>">
                                                   
                                                    <input type="hidden" name="id" value="<?php echo (isset($id)) ? $id : 0; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label"></label>
                                                <div class="col-sm-10">
                                                 
                                                    <?php if($image!=""){ ?>
                                                    <img width="150"src="<?php echo asset(Storage::url('public/sponsors/'.$image)); ?>" >
                                                    <?php } ?>
                                                </div>
                                            </div> 
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Active</label>
                                                <div class="col-sm-10">
                                                    <?php
                                                    if( isset($sponsor->active) && $sponsor->active == 1){
                                                        $status_checked = "checked='checked'";

                                                    }elseif( isset($sponsor->active) && $sponsor->active == 0){
                                                        $status_checked = "";
                                                    }else{
                                                        $status_checked = "checked='checked'";
                                                    }
                                                    ?>
                                                    <input type="checkbox" class="flaged_toggle" {{$status_checked}} data-toggle="toggle" data-on="Enable" data-off="Disable" data-onstyle="success" data-offstyle="danger" name="active" data-size="sm" value=1 <?php echo $disabled; ?>>
                                                </div>
                                            </div>
                                            
                                            
                                        </div>
                                    </div>
                                    <div class="row margin-tp-bt-10">
                                        <div class="col-lg-12 col-md-12" <?php if($action == 'view'){ echo "style='display:none'"; }?>>                                        
                                           <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>    
                                    </div> 
                                </form>
                      </div>
                </div>

<script type="text/javascript">
  $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });
    $(document).ready(function() {

        $(document).on("change","#main_cat_id", function() {          
            var main_cat=$(this).val();
            $.post('<?php echo $path;?>/select_cat','main_cat='+main_cat,function(data){
                $('#cat_id').html(data);
                    //window.location = '<?php //echo $path;?>';
                });
        });
        $('#main_cat_id').select2();
        $('#cat_id').select2();
    });
</script>
@endsection