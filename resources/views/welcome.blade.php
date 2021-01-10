@extends('layout')

@section('title', 'Client Registration')

@section('form')
<!-- form start -->
<form class="form-horizontal" id="form">
    @csrf
    <div class="box-body">
        <div class="form-group">
            <label class="col-sm-4 control-label">API Url</label>

            <div class="col-sm-8">
                <select class="form-control" name="endpoint">
                    <option value="https://dev6.robonegotiator.com">https://dev6.robonegotiator.com</option>
                    <option value="https://api.robonegotiator.com">https://api.robonegotiator.com</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-4 control-label">First Name</label>

            <div class="col-sm-8">
            <input type="text" class="form-control" name="first_name" placeholder="First Name">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-4 control-label">Last Name</label>

            <div class="col-sm-8">
            <input type="text" class="form-control" name="last_name" placeholder="Last Name">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-4 control-label">Organization</label>

            <div class="col-sm-8">
            <input type="text" class="form-control" name="organization" placeholder="Organization">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-4 control-label">Email</label>

            <div class="col-sm-8">
            <input type="email" class="form-control" name="email_id" placeholder="Email">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-4 control-label">Password</label>

            <div class="col-sm-8">
                <input type="password" class="form-control" name='password' id="inputPassword3" placeholder="Password">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-4 control-label">Subscription</label>

            <div class="col-sm-8">
                <select class="form-control" name="subscription">
                    <option value="free">Free</option>
                    <option value="pro">Pro</option>
                    <option value="premium">Premium</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-4 control-label">Contact Number</label>

            <div class="col-sm-8">
                <input type="text" class="form-control" name="contact_number" placeholder="Contact Number">
            </div>
        </div>
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
    <!-- <button type="submit" class="btn btn-default">Cancel</button> -->
    <button type="submit" id="submit" class="btn btn-info pull-right">Submit</button>
    </div>
    <!-- /.box-footer -->
</form>


@endsection

@section('script')
<script>
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
</script>
@endsection