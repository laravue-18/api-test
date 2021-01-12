@extends('layout')

@section('title', 'Set up Negotiation Rules')
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
                    <label class="col-sm-4 control-label">Buyer Repeat Customer</label>
                    <div class="col-sm-8">
                        <select name="buyer_repeat_customer">
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Buyer Repeat Customer Percent</label>
                    <div class="col-sm-8">
                        <select name="buyer_repeat_customer_percent">
                            <option value="1">percentage</option>
                            <option value="0">fixed</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Buyer Repeat Customer Unit</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" name="buyer_repeat_customer_unit" placeholder="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Buyer Aggressive Selling</label>
                    <div class="col-sm-8">
                        <select name="buyer_aggressive_selling">
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Buyer Aggressive Selling Percent</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" name="buyer_aggressive_selling_percent" placeholder="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Buyer Aggressive Selling Unit</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" name="buyer_aggressive_selling_unit" placeholder="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Buyer More Quantity</label>
                    <div class="col-sm-8">
                        <select name="buyer_more_quantity">
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Buyer More Quantity Percent</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" name="buyer_more_quantity_percent" placeholder="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Buyer More Quantity Unit</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" name="buyer_more_quantity_unit" placeholder="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Buyer Low Demand</label>
                    <div class="col-sm-8">
                        <select name="buyer_low_demand">
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Buyer Low Demand Percent</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" name="buyer_low_demand_percent" placeholder="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Buyer Low Demand Unit</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" name="buyer_low_demand_unit" placeholder="">
                    </div>
                </div>
                
            </div>
            <div class="col-md-6" id="parameters">
                <div class="form-group">
                    <label class="col-sm-4 control-label">Seller Hot Item</label>
                    <div class="col-sm-8">
                        <select name="seller_hot_item">
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Seller Hot Item Percent</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" name="seller_hot_item_percent" placeholder="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Seller Hot Item Unit</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" name="seller_hot_item_unit" placeholder="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Seller Motivated Buyer</label>
                    <div class="col-sm-8">
                        <select name="seller_motivated_buyer">
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Seller Motivated Buyer Percent</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" name="seller_motivated_buyer_percent" placeholder="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Seller Motivated Buyer Unit</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" name="seller_motivated_buyer_unit" placeholder="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Seller Shipping Cost</label>
                    <div class="col-sm-8">
                        <select name="seller_shipping_cost">
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Seller Shipping Cost Percent</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" name="seller_shipping_cost_percent" placeholder="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Seller Shipping Cost Unit</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" name="seller_shipping_cost_unit" placeholder="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Buyer Demographic</label>
                    <div class="col-sm-8">
                        <select name="buyer_demographic">
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Buyer Demographic Percent</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" name="buyer_demographic_percent" placeholder="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Buyer Demographic Unit</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" name="buyer_demographic_unit" placeholder="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Seller Historical Data</label>
                    <div class="col-sm-8">
                        <select name="seller_historical_data">
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Seller Historical Data Percent</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" name="seller_historical_data_percent" placeholder="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Seller Historical Data Unit</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" name="seller_historical_data_unit" placeholder="">
                    </div>
                </div>
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