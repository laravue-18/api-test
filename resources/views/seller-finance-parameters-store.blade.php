@extends('layout')

@section('title', 'Set Product Discount for Seller')
@section('form')

<!-- form start -->
<form class="form-horizontal" id="form">
    @csrf
    <div class="box-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-sm-4 control-label">Seller *</label>
                    <div class="col-sm-8">
                        <select name="seller_id" id="seller_id" class="form-control">
                            @foreach($sellers as $seller)
                                <option value="{{$seller->id}}">{{$seller->email_id}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Product *</label>
                    <div class="col-sm-8">
                        <select name="product_id" id="product_id" class="form-control">
                            @foreach($products as $product)
                                <option value="{{$product->id}}">{{$product->upc_product_code}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Security Deposit</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" name="security_deposit" placeholder="100" required>
                    </div>
                </div>
            </div>
            <div class="col-md-6" id="parameters">
                <div class="form-group">
                    <label class="col-sm-4 control-label">Interest Rate</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" name="finance_sub_parameter[0][interest_rate]" placeholder="5" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Duration in Month</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" name="finance_sub_parameter[0][duration_in_month]" placeholder="36" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Credit Score</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="finance_sub_parameter[0][credit_score]" placeholder="Excellent, Good" required>
                    </div>
                </div>
                <button id="addParameter">Add</button>
                
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
    var i = 1;
    jQuery('#seller_id').change(function(e){
        jQuery.ajax({
            method:'post',
            url: '/getProducts',
            data: {
                'seller_id': jQuery('#seller_id').val()
            }
        }).done(function(res){
            jQuery('#product_id').html('')
            res.forEach(product => jQuery('#product_id').append(
                '<option value="' + product.id + '">' + product.upc_product_code + '</option>'
            ))
        })
    })
    jQuery('#addParameter').click(function(e){
        e.preventDefault();
        
        jQuery('#addParameter').before(`
            <hr>
            <div class="form-group">
                <label class="col-sm-4 control-label">Interest Rate</label>
                <div class="col-sm-8">
                    <input type="number" class="form-control" name="finance_sub_parameter[${i}][interest_rate]" placeholder="5" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label">Duration in Month</label>
                <div class="col-sm-8">
                    <input type="number" class="form-control" name="finance_sub_parameter[${i}][duration_in_month]" placeholder="36" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label">Credit Score</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="finance_sub_parameter[${i}][credit_score]" placeholder="Excellent, Good" required>
                </div>
            </div>
        `);
        i++;
        if(i == 10) {
            jQuery('#addParameter').hide()
        }
    })
    jQuery("#submit").click(function(e){
        e.preventDefault();
        data = jQuery("#form").serialize();
        jQuery.ajax({
            method: "post",
            url: "",
            data: data
        }).done(function(res){
            if(res.success){
                alert(res.message)
            }else{
                alert(res.message)
            }
        })
    })
</script>
@endsection