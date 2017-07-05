@extends('layouts/master')

@section('content')
<div class="container">    
    <div class="col-md-12">
        <h3 class="section-title text-center">Contact Us</h3>
        <form id="contact-form" method="post">
            <input type="hidden"  name="_token" value="{{ csrf_token() }}"/>
            <div class="form-group">
                <label for="name">Name</label>
                <input placeholder="Name" required type="text" class="form-control" name="name" id="name"/>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input placeholder="Email Address" required type="email" class="form-control" name="email" id="email"/>
            </div>
            <div class="form-group">
                <label for="message">Message</label>
                <textarea placeholder="Your Message" rows="10" name="c_message" id="message" class="form-control"></textarea>
            </div>
            <button type="submit" class="btn btn-danger">Send</button>
        </form>
        <div class="contact-alerts" style="display: none; margin-top: 50px;">
            <div style="display:none;" class="alert alert-success">Successfully sent your contact request</div>
            <div style="display:none;" class="alert alert-danger">Failed to send your message. Please call us at 763 205 2561</div>
        </div>
    </div>
</div>
@endsection
