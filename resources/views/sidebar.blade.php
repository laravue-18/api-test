<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="{{ Request::is('/') ? 'active' : '' }}">
          <a href="{{url('/')}}">
            <span>Client Registration</span>
          </a>
        </li>
        <li class="{{ Request::is('addSeller') ? 'active' : '' }}">
          <a href="{{url('addSeller')}}">
            <span>Seller Registration</span>
          </a>
        </li>
        <li class="{{ Request::is('addSellerDeal') ? 'active' : '' }}">
          <a href="{{url('addSellerDeal')}}">
            <span>Upload A Deal</span>
          </a>
        </li>
        <li class="{{ Request::is('product/discount') ? 'active' : '' }}">
          <a href="{{url('product/discount')}}">
            <span>Add Discounts/Rebates</span>
          </a>
        </li>
        <li class="{{ Request::is('product/purchase') ? 'active' : '' }}">
          <a href="{{url('product/purchase')}}">
            <span>Add Purchase Options</span>
          </a>
        </li>
        <li class="{{ Request::is('addDealNegotiationParameters') ? 'active' : '' }}">
          <a href="{{url('addDealNegotiationParameters')}}">
            <span>Set up Negotiation Rules</span>
          </a>
        </li>
        <li class="{{ Request::is('seller-lease-parameters/store') ? 'active' : '' }}">
          <a href="{{url('seller-lease-parameters/store')}}">
            <span>Setup Lease Options</span>
          </a>
        </li>
        
        
        <li class="{{ Request::is('seller-finance-parameters/store') ? 'active' : '' }}">
          <a href="{{url('seller-finance-parameters/store')}}">
            <span>Set-up Loan Options</span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->