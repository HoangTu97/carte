@section('customStyle')
<style>
img {
  max-width: 100%; }

.preview {
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -webkit-flex-direction: column;
      -ms-flex-direction: column;
          flex-direction: column; }
  @media screen and (max-width: 996px) {
    .preview {
      margin-bottom: 20px; } }

.preview-pic {
  -webkit-box-flex: 1;
  -webkit-flex-grow: 1;
      -ms-flex-positive: 1;
          flex-grow: 1; }

.preview-thumbnail.nav-tabs {
  border: none;
  margin-top: 15px; }
  .preview-thumbnail.nav-tabs li {
    width: 18%;
    margin-right: 2.5%; }
    .preview-thumbnail.nav-tabs li img {
      max-width: 100%;
      display: block; }
    .preview-thumbnail.nav-tabs li a {
      padding: 0;
      margin: 0; }
    .preview-thumbnail.nav-tabs li:last-of-type {
      margin-right: 0; }

.tab-content {
  overflow: hidden; }
  .tab-content img {
    width: 100%;
    -webkit-animation-name: opacity;
            animation-name: opacity;
    -webkit-animation-duration: .3s;
            animation-duration: .3s; }

.details {
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -webkit-flex-direction: column;
      -ms-flex-direction: column;
          flex-direction: column; }

.colors {
  -webkit-box-flex: 1;
  -webkit-flex-grow: 1;
      -ms-flex-positive: 1;
          flex-grow: 1; }

.product-title, .price, .sizes, .colors {
  text-transform: UPPERCASE;
  font-weight: bold; }

.checked, .price span {
  color: #ff9f1a; }

.product-title, .rating, .product-description, .price, .vote, .sizes {
  margin-bottom: 15px; }

.product-title {
  margin-top: 0; }

.badge {
    font-size: 0.5em !important;
    margin-left: 10px !important;
}
</style>
@endsection

<div class="row">
    <div class="col-md-12">
        <div class="bgc-white bd bdrs-3 p-20 mB-20 row">
            <div class="preview col-md-6">
                <div class="preview-pic tab-content">
                    <div class="tab-pane active" id="pic-1">
                        <img src="http://www.imgworlds.com/wp-content/uploads/2015/12/18-CONTACTUS-HEADER.jpg" />
                    </div>
                    <div class="tab-pane" id="pic-2">
                        <img src="http://www.imgworlds.com/wp-content/uploads/2015/12/18-CONTACTUS-HEADER.jpg" />
                    </div>
                    <div class="tab-pane" id="pic-3">
                        <img src="http://www.imgworlds.com/wp-content/uploads/2015/12/18-CONTACTUS-HEADER.jpg" />
                    </div>
                    <div class="tab-pane" id="pic-4">
                        <img src="http://www.imgworlds.com/wp-content/uploads/2015/12/18-CONTACTUS-HEADER.jpg" />
                    </div>
                    <div class="tab-pane" id="pic-5">
                        <img src="http://www.imgworlds.com/wp-content/uploads/2015/12/18-CONTACTUS-HEADER.jpg" />
                    </div>
                </div>
                <ul class="preview-thumbnail nav nav-tabs">
                    <li>
                        <a data-target="#pic-1" data-toggle="tab">
                            <img src="http://www.imgworlds.com/wp-content/uploads/2015/12/18-CONTACTUS-HEADER.jpg" />
                        </a>
                    </li>
                    <li  class="active">
                        <a data-target="#pic-2" data-toggle="tab">
                            <img src="http://placekitten.com/200/126" />
                        </a>
                    </li>
                    <li>
                        <a data-target="#pic-3" data-toggle="tab">
                            <img src="http://placekitten.com/200/126" />
                        </a>
                    </li>
                    <li>
                        <a data-target="#pic-4" data-toggle="tab">
                            <img src="http://placekitten.com/200/126" />
                        </a>
                    </li>
                    <li>
                        <a data-target="#pic-5" data-toggle="tab">
                            <img src="http://placekitten.com/200/126" />
                        </a>
                    </li>
                </ul>
            </div>
            <div class="details col-md-6">
                <h4 class="c-grey-900 mB-20 product-title">{{ $viewdetailData['username'] }} 
                    <a href="{{ route($viewdetailRouteNameControl.'.edit',['id'=>$viewdetailData['id']]) }}" class="badge badge-pill badge-primary">Edit</a>
                    <a href="{{ route($viewdetailRouteNameControl.'.delete',['id'=>$viewdetailData['id']]) }}" class="badge badge-pill badge-danger">Delete</a>
                </h4>
                <dl class="row">
                    @foreach($viewdetailData as $k => $v)
                        @if($k!='nom' && $k!='id' && $k!='classement' && $v)
                        <dt class="col-sm-3 text-truncate" 
                            data-toggle="tooltip" data-placement="left" title="{{ $k }}"
                            >{{ $k }}</dt>
                        <dd class="col-sm-9">{!! $v !!}</dd>
                        @endif
                    @endforeach
                </dl>
            </div>
        </div>
    </div>
</div>