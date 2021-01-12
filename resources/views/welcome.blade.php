@extends('layout')

@section('title', 'Client Registration')

@section('form')
<!-- form start -->
<form class="form-horizontal" id="form">
    @csrf
    <div class="box-body">
        <div class="form-group">
            <label class="col-sm-4 control-label">API Url * </label>

            <div class="col-sm-8">
                <input type="url" class="form-control" name="endpoint" id="endpoint" placeholder="https://api.robonegotiator.com" value="https://api.robonegotiator.com">
                <!-- <select class="form-control" name="endpoint">
                    <option value="https://dev6.robonegotiator.com">https://dev6.robonegotiator.com</option>
                    <option value="https://api.robonegotiator.com">https://api.robonegotiator.com</option>
                </select> -->
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-4 control-label">First Name *</label>

            <div class="col-sm-8">
            <input type="text" class="form-control" name="first_name" placeholder="First Name" required>
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-4 control-label">Last Name *</label>

            <div class="col-sm-8">
            <input type="text" class="form-control" name="last_name" placeholder="Last Name" required>
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-4 control-label">Organization *</label>

            <div class="col-sm-8">
            <input type="text" class="form-control" name="organization" placeholder="Organization">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-4 control-label">Email *</label>

            <div class="col-sm-8">
            <input type="email" class="form-control" name="email_id" placeholder="Email">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-4 control-label">Password *</label>

            <div class="col-sm-8">
                <input type="password" class="form-control" name='password' id="inputPassword3" placeholder="Password">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-4 control-label">Subscription *</label>

            <div class="col-sm-8">
                <select class="form-control" name="subscription">
                    <option value="free">Free</option>
                    <option value="pro">Pro</option>
                    <option value="premium">Premium</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-4 control-label">Contact Number *</label>

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
    function isUrlValid(url) {
        return /^(https?|s?ftp):\/\/(((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:)*@)?(((\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5]))|((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?)(:\d*)?)(\/((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)+(\/(([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)*)*)?)?(\?((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|[\uE000-\uF8FF]|\/|\?)*)?(#((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|\/|\?)*)?$/i.test(url);
    }

    jQuery("#submit").click(function(e){
        e.preventDefault();
        if(!isUrlValid($('#endpoint').val())){
            alert('Invalid API Url !!!')
            return
        }
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
                if(res.errors.first_name){
                    alert(res.errors.first_name) 
                }
                if(res.errors.last_name){
                    alert(res.errors.last_name) 
                }
                if(res.errors.organization){
                    alert(res.errors.organization) 
                }
                if(res.errors.email_id){
                    alert(res.errors.email_id) 
                }
                if(res.errors.contact_number){
                    alert(res.errors.contact_number) 
                }
                if(res.errors.password){
                    alert(res.errors.password) 
                }
            }
        })
    })
</script>
@endsection