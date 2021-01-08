@extends('layout')

@section('title', 'Seller Register')
@section('form')

<!-- form start -->
<form class="form-horizontal" id="form">
    @csrf
    <div class="box-body">
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
        <label  class="col-sm-4 control-label">Industry</label>

        <div class="col-sm-8">
        <input type="text" class="form-control" name="industry" placeholder="Industry">
        </div>
    </div>
    <div class="form-group">
        <label  class="col-sm-4 control-label">Category</label>

        <div class="col-sm-8">
        <input type="text" class="form-control" name="category" placeholder="Category">
        </div>
    </div>
    <div class="form-group">
        <label  class="col-sm-4 control-label">Street Address</label>

        <div class="col-sm-8">
        <input type="text" class="form-control" name="street_address" placeholder="Street Address">
        </div>
    </div>
    <div class="form-group">
        <label  class="col-sm-4 control-label">City</label>

        <div class="col-sm-8">
        <input type="text" class="form-control" name="city" placeholder="City">
        </div>
    </div>
    <div class="form-group">
        <label  class="col-sm-4 control-label">State</label>

        <div class="col-sm-8">
        <input type="text" class="form-control" name="state" placeholder="State">
        </div>
    </div>
    <div class="form-group">
        <label  class="col-sm-4 control-label">Country</label>

        <div class="col-sm-8">
        <input type="text" class="form-control" name="country" placeholder="Country">
        </div>
    </div>
    <div class="form-group">
        <label  class="col-sm-4 control-label">Zip Code</label>

        <div class="col-sm-8">
        <input type="text" class="form-control" name="zip" placeholder="Zip Code">
        </div>
    </div>
    <div class="form-group">
        <label for="inputEmail3" class="col-sm-4 control-label">Currency</label>

        <div class="col-sm-8">
            <select class="form-control" name="currency">
                <option value="USD">USD</option>
                <option value="EUR">EUR</option>
                <option value="JPY">JPY</option>
                <option value="CAD">CAD</option>
                <option value="INR">INR</option>
                <option value="GBP">GBP</option>
                <option value="CHF">CHF</option>
                <option value="AUD">AUD</option>
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
            url: "addSeller",
            data: data
        }).done(function(res){
            if(res.success){
                alert(res.message)
                // if(confirm('Do you want to register seller?')){
                //     window.location.href = "addSeller";
                // }
            }else{
                alert(res)
            }
        })
    })
</script>
@endsection