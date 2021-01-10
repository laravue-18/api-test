@extends('layout')

@section('title', 'Add Seller Lease Parameters')
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
                <label class="col-sm-4 control-label">Title</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="discount_types[0][title]" value="" placeholder="Seller Purchase Option 1">
                </div>
            </div>
            <!-- <div class="form-group">
                <label class="col-sm-4 control-label">Type</label>
                <div class="col-sm-8">
                </div>
            </div> -->
                    <input type="hidden" class="form-control" name="discount_types[0][type]" value="seller" placeholder="buyer" hidden>
            <div class="form-group">
                <label class="col-sm-4 control-label">Applicability</label>
                <div class="col-sm-8">
                    <select name="discount_types[0][applicability]">
                        <option value="all">All</option>
                        <option value="specific">Specific</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label">Quantity</label>
                <div class="col-sm-8">
                    <input type="number" class="form-control" name="discount_types[0][qty]" placeholder="">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label">Value Type</label>
                <div class="col-sm-8">
                    <select name="discount_types[0][value_type]">
                        <option value="fixed">fixed</option>
                        <option value="percentage">percentage</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label">Amount</label>
                <div class="col-sm-8">
                    <input type="number" class="form-control" name="discount_types[0][amount]" placeholder="">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label">Expiry Date</label>
                <div class="col-sm-8">
                    <input type="date" class="form-control" name="discount_types[0][expiry_date]">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label">Additional Info</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="discount_types[0][additional_info]">
                </div>
            </div>
            </div>
            <div class="col-md-6" id="parameters">
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
    var i = 0;
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
    
    jQuery("#submit").click(function(e){
        e.preventDefault();
        data = jQuery("#form").serialize();
        jQuery.ajax({
            method: "post",
            url: "",
            data: data
        }).done(function(res){
            if(res.success){
                alert("Success!!!")
            }else{
                alert("Error!!!")
            }
        })
    })
</script>
@endsection