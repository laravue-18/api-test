@extends('layout')

@section('title', 'Add Seller Deal')
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
                        <select name="seller_id" id="" class="form-control">
                            @foreach($sellers as $seller)
                                <option value="{{$seller->id}}">{{$seller->email_id}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Seller Original Quantity *</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" name="seller_orignal_quantity" placeholder="Seller Original Quantity">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Seller Catalog Id</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="seller_catalog_id" placeholder="Seller Catalog Id">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Parameter 1 *</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="parameter1" placeholder="Parameter 1">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Parameter 2 *</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="parameter2" placeholder="Parameter 2">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Parameter 3 *</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="parameter3" placeholder="Parameter 3">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Parameter 4</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="parameter4" placeholder="Parameter 4">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Parameter 5</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="parameter5" placeholder="Parameter 5">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Seller Deal Price *</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="seller_deal_price" placeholder="Seller Deal Price">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Seller Negotiation Mode *</label>
                    <div class="col-sm-8">
                        <select name="seller_negotiation_mode" id="" class="form-control">
                            <option value="auto">Auto</option>
                            <option value="classic">Classic</option>
                        </select>
                    </div>
                </div>
                
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-sm-4 control-label">Seller Lowest Deal Price *</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" name="seller_lowest_deal_price" placeholder="Seller Lowest Deal Price" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">UPC Product Code *</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="upc_product_code" placeholder="UPC001">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Title *</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="title" placeholder="Title" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Description</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="description" placeholder="Description">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Category *</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="category" placeholder="Category" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Sub Category</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="sub_category" placeholder="Sub Category">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Bulk or Individual</label>
                    <div class="col-sm-8">
                        <select name="bulk_or_individual" id="" class="form-control">
                            <option value="bulk">bulk</option>
                            <option value="individual">individual</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Catalog Id</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" name="catalog_id" placeholder="Catalog Id" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Catalog Url</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="catalog_url" placeholder="Catalog Url">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Expriy Date</label>
                    <div class="col-sm-8">
                        <input type="date" class="form-control" name="expiry_date" placeholder="Expriy Date">
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
    jQuery("#submit").click(function(e){
        e.preventDefault();
        data = jQuery("#form").serialize();
        jQuery.ajax({
            method: "post",
            url: "addSellerDeal",
            data: data
        }).done(function(res){
            if(res.success){
                alert(res.message)
                // if(confirm('Do you want to register seller?')){
                //     window.location.href = "addSeller";
                // }
            }else{
                alert('Error')
            }
        })
    })
</script>
@endsection