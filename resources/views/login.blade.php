@extends('layout')

@section('title', 'Client Login')

@section('form')
<!-- form start -->
<form class="form-horizontal" id="form" action="{{url('login')}}" method="post">
    @csrf
    <div class="box-body">
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-4 control-label">Email</label>

            <div class="col-sm-8">
            <input type="email" class="form-control" name="email" placeholder="Email">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-4 control-label">Password</label>

            <div class="col-sm-8">
                <input type="password" class="form-control" name='password' id="inputPassword3" placeholder="Password">
            </div>
        </div>
        
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
    <!-- <button type="submit" class="btn btn-default">Cancel</button> -->
    <button type="submit" id="submit" class="btn btn-info pull-right">Login</button>
    </div>
    <!-- /.box-footer -->
</form>


@endsection

@section('script')
<!-- <script>
    jQuery("#submit").click(function(e){
        e.preventDefault();
        data = jQuery("#form").serialize();
        jQuery.ajax({
            method: "post",
            url: "addClient",
            data: data
        }).done(function(res){
            if(res.success){
                alert(res.message)
                if(confirm('Do you want to register seller?')){
                    window.location.href = "addSeller";
                }
            }else{
                alert('Error!!!')
            }
        })
    })
</script> -->
@endsection