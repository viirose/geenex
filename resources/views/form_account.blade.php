@extends('nav')

@section('content')

<div class="row top-pad"></div>
<section>
    <div class="container">
        <div class="col-sm-6 cent">
          <div class="row text-left">
            <div class="card card-light form-card col-12">
            <h4><i class="fa fa-{{ $icon }}" aria-hidden="true"></i> {!! $title !!}</h4>
            <p>Already have an account? <a href="/login">Log In</a></p>
              {!! form_start($form) !!}
              <div class="alert alert-info">By creating an account with our website, you will be able to view our spare part database by material groups, search your target parts by keywords or part numbers and send inquiries online.</div>
              <p><span class="badge badge-info"><i class="fa fa-address-card-o" aria-hidden="true"></i> Personal Information</span></p>
              {!! form_row($form->c_1_salutation) !!}
              {!! form_row($form->c_2_first_name) !!}
              {!! form_row($form->c_3_last_name) !!}
              {!! form_row($form->email) !!}
              {!! form_row($form->confirm_email) !!}
              <div class="alert alert-success">This address will be used for your delivery and invoice address, you can edit or alter this after account creation in your address book.</div>
              <p><span class="badge badge-success"><i class="fa fa-map-marker" aria-hidden="true"></i> Address Information</span></p>
              {!! form_row($form->c_4_company) !!}
              {!! form_row($form->c_5_phone) !!}
              {!! form_row($form->c_6_street) !!}
              {!! form_row($form->c_7_city) !!}
              {!! form_row($form->c_8_post_code) !!}
              {!! form_row($form->c_9_country) !!}
              {!! form_row($form->c_url) !!}
              <p><span class="badge badge-warning"><i class="fa fa-key" aria-hidden="true"></i> Login Information</span></p>
              {!! form_row($form->password) !!}
              {!! form_row($form->confirm_password) !!}
              {!! form_rest($form) !!}
            </div>
          </div>
        </div>
    </div>
</section>

@endsection
